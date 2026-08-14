<?php
/**
 * Green wraith manager class.
 *
 * PHP version 5
 *
 * @category GreenWraithManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Green wraith manager class.
 *
 * @category GreenWraithManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class GreenWraithManager extends WRAITHManagerController
{
    /**
     * The base table name.
     *
     * @var string
     */
    public $tablename = 'greenWraith';
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
                'gfID',
                'gfHostID',
                'gfHour',
                'gfMin',
                'gfAction',
                'gfDays'
            ),
            array(
                'INTEGER',
                'INTEGER',
                'INTEGER',
                'INTEGER',
                'VARCHAR(2)',
                'VARCHAR(25)'
            ),
            array(
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
                false
            ),
            array(
                'gfID',
                array(
                    'gfHour',
                    'gfMin',
                    'gfAction'
                ),
            ),
            'InnoDB',
            'utf8',
            'gfID',
            'gfID'
        );
        return self::$DB->query($sql);
    }
}
