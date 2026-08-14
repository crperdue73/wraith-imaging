<?php
/**
 * Pxe menu items manager class.
 *
 * PHP version 5
 *
 * @category PXEMenuOptionsManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Pxe menu items manager class.
 *
 * @category PXEMenuOptionsManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class PXEMenuOptionsManager extends WRAITHManagerController
{
    /**
     * The base table name.
     *
     * @var string
     */
    public $tablename = 'dirCleaner';
    /**
     * Install our table.
     *
     * @return bool
     */
    public function install()
    {
        $this->uninstall();
        $sql = Schema::createTable(
            $this->tablename,
            true,
            array(
                'dcID',
                'dcPath'
            ),
            array(
                'INTEGER',
                'LONGTEXT'
            ),
            array(
                false,
                false
            ),
            array(
                false,
                false
            ),
            array(
                'dcID',
                'dcPath'
            ),
            'InnoDB',
            'utf8',
            'dcID',
            'dcID'
        );
        return self::$DB->query($sql);
    }
    /**
     * The Storage point for the registration items.
     *
     * @var array
     */
    private static $_regVals = array();
    /**
     * Builds the array.
     *
     * @return array
     */
    private static function _regText()
    {
        return self::$_regVals = array(
            0 => self::$wraithlang['NotRegHost'],
            1 => self::$wraithlang['RegHost'],
            2 => self::$wraithlang['AllHosts'],
            3 => self::$wraithlang['DebugOpts'],
            4 => self::$wraithlang['AdvancedOpts'],
            5 => self::$wraithlang['AdvancedLogOpts'],
            6 => self::$wraithlang['PendRegHost'],
            7 => self::$wraithlang['DoNotList'],
        );
    }
    /**
     * The menu select list item.
     *
     * @param string $request Which item is currently selected.
     * @param string $id      Should we send an id.
     *
     * @return string
     */
    public function regSelect($request = '', $id = '')
    {
        self::$selected = $request;
        ob_start();
        $sender = self::_regText();
        array_walk(
            $sender,
            self::$buildSelectBox
        );
        return sprintf(
            '<select name="menu_regmenu" class="form-control"'
            . (
                $id ?
                ' id="'
                . $id
                . '"' :
                ''
            )
            . '>%s</select>',
            ob_get_clean()
        );
    }
}
