<?php
/**
 * Access Control plugin
 *
 * PHP version 5
 *
 * @category AccessControlAssociationManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Access Control plugin
 *
 * @category AccessControlAssociationManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class AccessControlAssociationManager extends WRAITHManagerController
{
    /**
     * The base table name.
     *
     * @var string
     */
    public $tablename = 'roleUserAssoc';
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
                'ruaID',
                'ruaName',
                'ruaRoleID',
                'ruaUserID'
            ),
            array(
                'INTEGER',
                'VARCHAR(60)',
                'INTEGER',
                'INTEGER'
            ),
            array(
                false,
                false,
                false,
                false
            ),
            array(
                false,
                false,
                false,
                false
            ),
            array(
                'ruaID',
                'ruaUserID',
            ),
            'InnoDB',
            'utf8',
            'ruaID',
            'ruaID'
        );
        if (!self::$DB->query($sql)) {
            return false;
        } else {
            $wraithUserID = self::getSubObjectIDs(
                'User',
                array('name' => 'wraith')
            );
            $sql = sprintf(
                "INSERT INTO `%s` VALUES (1, '%s', 1, %d)",
                $this->tablename,
                'Administrator-wraith',
                intval($wraithUserID[0])
            );
            self::$DB->query($sql);
        }
        return self::getClass('AccessControlRuleManager')->install();
    }
    /**
     * Uninstalls the plugin
     *
     * @return bool
     */
    public function uninstall()
    {
        self::getClass('AccessControlRuleManager')->uninstall();
        return parent::uninstall();
    }
}
