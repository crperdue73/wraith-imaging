<?php
/**
 * Sub menu hook changer.
 *
 * PHP version 5
 *
 * @category SubMenuData
 * @package  WRAITHProject
 * @author   Peter Gilchrist <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Sub menu hook changer.
 *
 * @category SubMenuData
 * @package  WRAITHProject
 * @author   Peter Gilchrist <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class SubMenuData extends Hook
{
    /**
     * The name of this hook.
     *
     * @var string
     */
    public $name = 'SubMenuData';
    /**
     * The description of this hook.
     *
     * @var string
     */
    public $description = 'Change all SubMenu data for the new gui';
    /**
     * Is this hook active or not.
     *
     * @var bool
     */
    public $active = true;
    /**
     * The node to interact with.
     *
     * @var string
     */
    public $node = '';
    /**
     * Initializes object.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        self::$HookManager
            ->register(
                'SUB_MENULINK_DATA',
                array(
                    $this,
                    'subMenu'
                )
            );
    }
    /**
     * The changer method.
     *
     * @param mixed $arguments The items to change.
     *
     * @return void
     */
    public function subMenu($arguments)
    {
        if (!isset($arguments['node']) || !$arguments['node']) {
            return;
        }
        switch (strtolower($arguments['node'])) {
            case 'home':
                $arguments['menu'] = array();
                break;
            case 'client':
                $arguments['menu'] = array();
                break;
            case 'about':
                $arguments['menu'] = array(
                    'home' => self::$wraithlang['Home'],
                    'license' => self::$wraithlang['License'],
                    'kernelUpdate' => self::$wraithlang['KernelUpdate'],
                    'initrdUpdate' => self::$wraithlang['InitrdUpdate'],
                    'pxemenu' => self::$wraithlang['PXEBootMenu'],
                    'customizepxe' => self::$wraithlang['PXEConfiguration'],
                    'newMenu' => self::$wraithlang['NewMenu'],
                    'clientupdater' => self::$wraithlang['ClientUpdater'],
                    'maclist' => self::$wraithlang['MACAddrList'],
                    'settings' => self::$wraithlang['WRAITHSettings'],
                    'logviewer' => self::$wraithlang['LogViewer'],
                    'config' => self::$wraithlang['ConfigSave'],
            
                );
                break;
            case 'group':
                break;
            case 'host':
                break;
            case 'image':
                $arguments['menu']['multicast'] = sprintf(
                    '%s %s',
                    self::$wraithlang['Multicast'],
                    self::$wraithlang['Image']
                );
                break;
            case 'plugin':
                $arguments['menu'] = array(
                    'home'=>self::$wraithlang['Home'],
                    'activate'=>self::$wraithlang['ActivatePlugins'],
                    'install'=>self::$wraithlang['InstallPlugins'],
                    'installed'=>self::$wraithlang['InstalledPlugins'],
                );
                break;
            case 'printer':
                break;
            case 'report':
                $arguments['menu'] = array();
                break;
            case 'schema':
                $arguments['menu'] = array();
                break;
            case 'service':
                $arguments['menu'] = array();
                break;
            case 'snapin':
                break;
            case 'storage':
                $arguments['menu'] = array(
                    'list' => self::$wraithlang['AllSN'],
                    'addStorageNode' => self::$wraithlang['AddSN'],
                    'storageGroup' => self::$wraithlang['AllSG'],
                    'addStorageGroup' => self::$wraithlang['AddSG'],
                );
                break;
            case 'task':
                $arguments['menu'] = array(
                    'active' => self::$wraithlang['ActiveTasks'],
                    'activemulticast' => self::$wraithlang['ActiveMCTasks'],
                    'activesnapins' => self::$wraithlang['ActiveSnapins'],
                    'activescheduled' => self::$wraithlang['ScheduledTasks'],
                );
                break;
            case 'hwinfo':
                $arguments['menu'] = array();
                break;
            case 'user':
                break;
            default:
                break;
        }
    }
}
