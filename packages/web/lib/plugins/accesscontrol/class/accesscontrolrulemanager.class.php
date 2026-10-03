<?php
/**
 * Access Control plugin
 *
 * PHP version 5
 *
 * @category AccessControlRuleManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Access Control plugin
 *
 * @category AccessControlRuleManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class AccessControlRuleManager extends WRAITHManagerController
{
    /**
     * Table name
     *
     * @var string
     */
    public $tablename = 'rules';
    /**
     * Installs the database for the plugin.
     *
     * @return bool
     */
    public function install()
    {
        /**
         * Add the information into the database.
         * This is commented out so we don't actually
         * create anything.
         */
        $this->uninstall();
        $sql = Schema::createTable(
            $this->tablename,
            true,
            array(
                'ruleID',
                'ruleName',
                'ruleType',
                'ruleValue',
                'ruleParent',
                'ruleCreatedBy',
                'ruleCreatedTime',
                'ruleNode'
            ),
            array(
                'INTEGER',
                'VARCHAR(40)',
                'VARCHAR(40)',
                'VARCHAR(40)',
                'VARCHAR(40)',
                'VARCHAR(40)',
                'TIMESTAMP',
                'VARCHAR(40)'
            ),
            array(
                false,
                false,
                false,
                false,
                false,
                false,
                false,
                false
            ),
            array(
                false,
                false,
                false,
                false,
                false,
                false,
                'CURRENT_TIMESTAMP',
                false
            ),
            array(),
            'InnoDB',
            'utf8',
            'ruleID',
            'ruleID'
        );
        if (!self::$DB->query($sql)) {
            return false;
        }
        $sql = 'INSERT INTO '
            . $this->tablename
            . ' VALUES '
            . '(2, "MAIN_MENU-user", "MAIN_MENU", "user", '
            . '"main", "wraith", NOW(), NULL), '
            . '(3, "MAIN_MENU-host", "MAIN_MENU", "host", '
            . '"main", "wraith", NOW(), NULL), '
            . '(4, "MAIN_MENU-group", "MAIN_MENU", "group", '
            . '"main", "wraith", NOW(), NULL), '
            . '(5, "MAIN_MENU-image", "MAIN_MENU", "image", '
            . '"main", "wraith", NOW(), NULL), '
            . '(6, "MAIN_MENU-storage", "MAIN_MENU", "storage", '
            . '"main", "wraith", NOW(), NULL), '
            . '(7, "MAIN_MENU-snapin", "MAIN_MENU", "snapin", '
            . '"main", "wraith", NOW(), NULL), '
            . '(8, "MAIN_MENU-printer", "MAIN_MENU", "printer", '
            . '"main", "wraith", NOW(), NULL), '
            . '(9, "MAIN_MENU-service", "MAIN_MENU", "service", '
            . '"main", "wraith", NOW(), NULL), '
            . '(10, "MAIN_MENU-task", "MAIN_MENU", "task", '
            . '"main", "wraith", NOW(), NULL), '
            . '(11, "MAIN_MENU-report", "MAIN_MENU", "report", '
            . '"main", "wraith", NOW(), NULL), '
            . '(12, "MAIN_MENU-plugin", "MAIN_MENU", "plugin", '
            . '"main", "wraith", NOW(), NULL), '
            . '(13, "MAIN_MENU-about", "MAIN_MENU", "about", '
            . '"main", "wraith", NOW(), NULL), '
            . '(14, "SUB_MENULINK-list", "SUB_MENULINK", "list", '
            . '"menu", "wraith", NOW(), NULL), '
            . '(15, "SUB_MENULINK-search", "SUB_MENULINK", "search", '
            . '"menu", "wraith", NOW(), NULL), '
            . '(16, "SUB_MENULINK-import", "SUB_MENULINK", "import", '
            . '"menu", "wraith", NOW(), NULL), '
            . '(17, "SUB_MENULINK-export", "SUB_MENULINK", "export", '
            . '"menu", "wraith", NOW(), NULL), '
            . '(18, "SUB_MENULINK-add", "SUB_MENULINK", "add", '
            . '"menu", "wraith", NOW(), NULL), '
            . '(19, "SUB_MENULINK-multicast", "SUB_MENULINK", "multicast", '
            . '"menu", "wraith", NOW(), "image"), '
            . '(20, "SUB_MENULINK-storageGroup", "SUB_MENULINK", "storageGroup", '
            . '"menu", "wraith", NOW(), "storage"), '
            . '(21, "SUB_MENULINK-addStorageNode", "SUB_MENULINK", '
            . '"addStorageNode", "menu", "wraith", NOW(), "storage"), '
            . '(22, "SUB_MENULINK-addStorageGroup", "SUB_MENULINK", '
            . '"addStorageGroup", "menu", "wraith", NOW(), "storage"), '
            . '(23, "SUB_MENULINK-actice", "SUB_MENULINK", '
            . '"active", "menu", "wraith", NOW(), "task"), '
            . '(24, "SUB_MENULINK-listhosts", "SUB_MENULINK", "listhosts", '
            . '"menu", "wraith", NOW(), "task"), '
            . '(25, "SUB_MENULINK-listgroups", "SUB_MENULINK", '
            . '"listgroups", "menu", "wraith", NOW(), "task"), '
            . '(26, "SUB_MENULINK-activemulticast", "SUB_MENULINK", '
            . '"activemulticast", "menu", "wraith", NOW(), "task"), '
            . '(27, "SUB_MENULINK-activesnapins", "SUB_MENULINK", '
            . '"activesnapins", "menu", "wraith", NOW(), "task"), '
            . '(28, "SUB_MENULINK-activescheduled", "SUB_MENULINK", '
            . '"activescheduled", "menu", "wraith", NOW(), "task"), '
            . '(29, "SUB_MENULINK-home", "SUB_MENULINK", "home", '
            . '"menu", "wraith", NOW(), "about"), '
            . '(30, "SUB_MENULINK-license", "SUB_MENULINK", '
            . '"license", "menu", "wraith", NOW(), "about"), '
            . '(31, "SUB_MENULINK-kernelUpdate", "SUB_MENULINK", '
            . '"kernelUpdate", "menu", "wraith", NOW(), "about"), '
            . '(32, "SUB_MENULINK-pxemenu", "SUB_MENULINK", '
            . '"pxemenu", "menu", "wraith", NOW(), "about"), '
            . '(33, "SUB_MENULINK-customizepxe", "SUB_MENULINK", '
            . '"customizepxe", "menu", "wraith", NOW(), "about"), '
            . '(34,"SUB_MENULINK-newmenu","SUB_MENULINK", '
            . '"newmenu", "menu", "wraith", NOW(), "about"), '
            . '(35, "SUB_MENULINK-clientupdater", "SUB_MENULINK", '
            . '"clientupdater", "menu", "wraith", NOW(), "about"), '
            . '(36, "SUB_MENULINK-maclist", "SUB_MENULINK", '
            . '"maclist", "menu", "wraith", NOW(), "about"), '
            . '(37, "SUB_MENULINK-settings", "SUB_MENULINK", '
            . '"settings", "menu", "wraith", NOW(), "about"), '
            . '(38, "SUB_MENULINK-logviewer", "SUB_MENULINK", '
            . '"logviewer", "menu", "wraith", NOW(), "about"), '
            . '(39, "SUB_MENULINK-config", "SUB_MENULINK", '
            . '"config", "menu", "wraith", NOW(), "about"), '
            . '(40, "MAIN_MENU-accesscontrol", "MAIN_MENU", "accesscontrol", '
            . '"main", "wraith", NOW(), NULL)';
        if (self::$DB->query($sql)) {
            $sql = "CREATE UNIQUE INDEX `indexmul` "
                    . "`rules` (`ruleValue`, `ruleNode`)";
            self::$DB->query($sql);
            return self::getClass('AccessControlRuleAssociationManager')->install();
        } else {
            return true;
        }
    }
    /**
     * Uninstalls the plugin
     *
     * @return bool
     */
    public function uninstall()
    {
        self::getClass('AccessControlRuleAssociationManager')->uninstall();
        return parent::uninstall();
    }
}
