<?php
/**
 * Access Control plugin
 *
 * PHP version 5
 *
 * @category AccessControlManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Access Control plugin
 *
 * @category AccessControlManager
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class AccessControlManager extends WRAITHManagerController
{
    /**
     * The table name.
     *
     * @var string
     */
    public $tablename = 'roles';
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
                'rID',
                'rName',
                'rDesc',
                'rCreatedBy',
                'rCreatedTime'
            ),
            array(
                'INTEGER',
                'VARCHAR(255)',
                'LONGTEXT',
                'VARCHAR(40)',
                'TIMESTAMP'
            ),
            array(
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
                'CURRENT_TIMESTAMP'
            ),
            array(
                'rID',
                'rName'
            ),
            'InnoDB',
            'utf8',
            'rID',
            'rID'
        );

        if (!self::$DB->query($sql)) {
            return false;
        } else {
            $sql = sprintf(
                "INSERT INTO `%s` VALUES"
                . "(1, 'Administrator', 'WRAITH Administrator', 'wraith', NOW()),"
                . "(2, 'Technician', 'WRAITH Technician', 'wraith', NOW())",
                $this->tablename
            );
            self::$DB->query($sql);
        }
        return self::getClass('AccessControlAssociationManager')->install();
    }
    /**
     * Uninstalls the plugin
     *
     * @return bool
     */
    public function uninstall()
    {
        self::getClass('AccessControlAssociationManager')->uninstall();
        return parent::uninstall();
    }
}
