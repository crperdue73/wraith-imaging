<?php
/**
 * Client Update Manager handles the mass client update stuff.
 *
 * PHP version 5
 *
 * @category ClientUpdaterManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Client Update Manager handles the mass client update stuff.
 *
 * @category ClientUpdaterManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class ClientUpdaterManager extends WRAITHManagerController
{
    /**
     * The base table name.
     *
     * @var string
     */
    public $tablename = 'clientUpdates';
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
                'cuID',
                'cuName',
                'cuMD5',
                'cuType',
                'cuFile'
            ),
            array(
                'INTEGER',
                'VARCHAR(255)',
                'VARCHAR(100)',
                'VARCHAR(40)',
                'LONGBLOB'
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
                false
            ),
            array(
                'cuID',
                array(
                    'cuName',
                    'cuType'
                )
            ),
            'InnoDB',
            'utf8',
            'cuID',
            'cuID'
        );
        return self::$DB->query($sql);
    }
}
