<?php
/**
 * ISO Manager page.
 *
 * Manages bootable ISO files for the WRAITH PXE menu:
 *  - lists ISOs in the custom ISO directory
 *  - uploads new ISOs (stored under /images/custom-isos)
 *  - auto-creates/removes the matching iPXE menu entry
 *
 * @category ISOManager
 * @package  WRAITHProject
 */

/**
 * ISO Manager page class.
 *
 * @category ISOManager
 * @package  WRAITHProject
 */
class ISOManagerPage extends WRAITHPage
{
    /**
     * The node this page enacts for.
     *
     * @var string
     */
    public $node = 'isomanager';

    /**
     * The directory ISOs are stored in.
     *
     * @var string
     */
    private $_isoDir = '/images/custom-isos';

    /**
     * The URL prefix ISOs are served from.
     *
     * @var string
     */
    private $_isoUrl = '/images/custom-isos';

    /**
     * The name of the page.
     *
     * @var string
     */
    public $name = 'ISO Manager';

    /**
     * Initialize object.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = _('ISO Manager');
        parent::__construct($this->name);
        if (!is_dir($this->_isoDir)) {
            @mkdir($this->_isoDir, 0775, true);
        }
        // Expose the ISO directory through the web root (filesystem path).
        $linkPath = '/var/www/html/wraith/custom-isos';
        if (!file_exists($linkPath)) {
            @symlink($this->_isoDir, $linkPath);
        }
    }

    /**
     * Returns the URL prefix for ISOs.
     *
     * @return string
     */
    private function _getWebroot()
    {
        list($docroot) = self::getSubObjectIDs(
            'Service',
            array('name' => 'WRAITH_WEB_ROOT'),
            'value',
            false,
            'AND',
            'name',
            false,
            ''
        );
        if (empty($docroot)) {
            $docroot = '/wraith/';
        }
        $docroot = '/' . trim($docroot, '/') . '/';
        return rtrim($docroot, '/');
    }

    /**
     * Lists ISOs in the custom ISO directory.
     *
     * @return array
     */
    private function _listISOs()
    {
        $isos = array();
        $files = @scandir($this->_isoDir);
        if (!$files) {
            return $isos;
        }
        foreach ($files as $f) {
            if ($f === '.' || $f === '..') {
                continue;
            }
            $full = $this->_isoDir . '/' . $f;
            if (!is_file($full)) {
                continue;
            }
            $isos[] = array(
                'name' => $f,
                'size' => @filesize($full),
                'modified' => @filemtime($full),
            );
        }
        return $isos;
    }

    /**
     * Finds the pxeMenu id for an ISO entry by name.
     *
     * @param string $isoName the ISO file name
     *
     * @return int
     */
    private function _findMenuEntry($isoName)
    {
        $menuName = 'wraith.iso.' . strtolower(preg_replace('/[^A-Za-z0-9]+/', '.', basename($isoName, '.iso')));
        $menuName = trim($menuName, '.');
        $found = self::getSubObjectIDs(
            'PXEMenuOptions',
            array('name' => $menuName),
            'id'
        );
        if (count($found) > 0) {
            return (int)max($found);
        }
        return 0;
    }

    /**
     * Creates or updates the pxeMenu entry for an ISO.
     *
     * @param string $isoName the ISO file name
     *
     * @return int the menu id
     */
    private function _syncMenuEntry($isoName)
    {
        $menuName = 'wraith.iso.' . strtolower(preg_replace('/[^A-Za-z0-9]+/', '.', basename($isoName, '.iso')));
        $menuName = trim($menuName, '.');
        $desc = 'Boot ISO: ' . basename($isoName);
        $isoPath = $this->_isoUrl . '/' . basename($isoName);
        $params = 'imgfetch ' . $isoPath . "\n"
            . 'initrd ' . basename($isoName) . "\n"
            . 'chain http://' . self::getSetting('WRAITH_WEB_HOST')
            . rtrim($this->_getWebroot(), '/')
            . '/service/ipxe/memdisk iso raw || goto MENU';
        $menuID = $this->_findMenuEntry($isoName);
        $Menu = new PXEMenuOptions($menuID);
        $Menu->set('name', $menuName)
            ->set('description', $desc)
            ->set('params', $params)
            ->set('regMenu', 2)
            ->set('default', 0)
            ->set('hotkey', '0')
            ->set('keysequence', '')
            ->save();
        return $Menu->get('id');
    }

    /**
     * Removes the pxeMenu entry for an ISO.
     *
     * @param string $isoName the ISO file name
     *
     * @return void
     */
    private function _removeMenuEntry($isoName)
    {
        $menuID = $this->_findMenuEntry($isoName);
        if ($menuID > 0) {
            $Menu = new PXEMenuOptions($menuID);
            if ($Menu->isValid()) {
                $Menu->destroy();
            }
        }
    }

    /**
     * Handles POST (upload/delete) and renders the ISO manager page.
     *
     * Note: for non-search nodes the page manager renders `index()` on POST,
     * so POST handling lives here.
     *
     * @return void
     */
    public function index()
    {
        if (self::$post) {
            CSRF::requireForStateChanging();
            if (isset($_POST['deleteiso']) && isset($_POST['isofile'])) {
                $target = basename($_POST['isofile']);
                $full = $this->_isoDir . '/' . $target;
                if (is_file($full)) {
                    @unlink($full);
                    $this->_removeMenuEntry($target);
                    $this->setMessage(_('ISO removed and menu entry deleted.'));
                }
                $this->redirect('?node=isomanager');
                return;
            }
            if (isset($_FILES['isofile']) && $_FILES['isofile']['error'] === UPLOAD_ERR_OK) {
                $name = basename($_FILES['isofile']['name']);
                if (strtolower(substr($name, -4)) !== '.iso') {
                    $this->setMessage(_('Only .iso files are accepted.'));
                    $this->redirect('?node=isomanager');
                    return;
                }
                $dest = $this->_isoDir . '/' . $name;
                if (@move_uploaded_file($_FILES['isofile']['tmp_name'], $dest)) {
                    $this->_syncMenuEntry($name);
                    $this->setMessage(sprintf(_('ISO %s uploaded and added to the boot menu.'), $name));
                } else {
                    $this->setMessage(_('Failed to move uploaded file. Check permissions on /images/custom-isos.'));
                }
                $this->redirect('?node=isomanager');
                return;
            }
            $this->setMessage(_('No file uploaded or upload failed.'));
            $this->redirect('?node=isomanager');
        }
        $this->title = _('ISO Manager');
        $isos = $this->_listISOs();
        $rows = '';
        if (count($isos) < 1) {
            $rows = '<tr><td colspan="4" class="text-center">'
                . _('No ISOs uploaded yet. Upload one below.')
                . '</td></tr>';
        } else {
            foreach ($isos as $iso) {
                $sizeMB = round($iso['size'] / 1048576, 1);
                $modified = date('Y-m-d H:i', $iso['modified']);
                $menuID = $this->_findMenuEntry($iso['name']);
                $status = $menuID > 0
                    ? '<span class="label label-success">' . _('In menu') . '</span>'
                    : '<span class="label label-warning">' . _('Not in menu') . '</span>';
                $rows .= '<tr>'
                    . '<td>' . htmlspecialchars($iso['name']) . '</td>'
                    . '<td>' . $sizeMB . ' MB</td>'
                    . '<td>' . $modified . '</td>'
                    . '<td>' . $status . '</td>'
                    . '<td>'
                    . '<form method="post" style="display:inline" '
                    . 'onsubmit="return confirm(\''
                    . _('Delete this ISO and its menu entry?')
                    . '\')">'
                    . '<input type="hidden" name="_csrf" value="'
                    . CSRF::token()
                    . '"/>'
                    . '<input type="hidden" name="isofile" value="'
                    . htmlspecialchars($iso['name'])
                    . '"/>'
                    . '<input type="hidden" name="deleteiso" value="1"/>'
                    . '<button type="submit" class="btn btn-danger btn-xs">'
                    . '<i class="fa fa-trash"></i> ' . _('Delete')
                    . '</button>'
                    . '</form>'
                    . '</td>'
                    . '</tr>';
            }
        }
        echo '<div class="col-xs-10 col-xs-offset-1">';
        echo '<div class="panel panel-info">';
        echo '<div class="panel-heading"><h4 class="title">'
            . _('Bootable ISO Files')
            . '</h4></div>';
        echo '<div class="panel-body">';
        echo '<table class="table table-striped table-hover">';
        echo '<thead><tr>'
            . '<th>' . _('File') . '</th>'
            . '<th>' . _('Size') . '</th>'
            . '<th>' . _('Modified') . '</th>'
            . '<th>' . _('Menu') . '</th>'
            . '<th></th>'
            . '</tr></thead><tbody>';
        echo $rows;
        echo '</tbody></table>';
        echo '</div></div>';
        echo '<div class="panel panel-success">';
        echo '<div class="panel-heading"><h4 class="title">'
            . _('Upload New ISO')
            . '</h4></div>';
        echo '<div class="panel-body">';
        echo '<form method="post" enctype="multipart/form-data" '
            . 'action="?node=isomanager">';
        echo '<input type="hidden" name="_csrf" value="'
            . CSRF::token()
            . '"/>';
        echo '<div class="form-group">';
        echo '<label for="isofile">' . _('ISO file') . '</label>';
        echo '<input type="file" name="isofile" id="isofile" '
            . 'accept=".iso" class="form-control" required/>';
        echo '<p class="help-block">' . _('Upload a bootable ISO. A menu entry '
            . 'is created automatically (BIOS via memdisk).')
            . '</p>';
        echo '</div>';
        echo '<button type="submit" class="btn btn-success">'
            . '<i class="fa fa-upload"></i> ' . _('Upload')
            . '</button>';
        echo '</form>';
        echo '</div></div>';
        echo '</div>';
    }
}
