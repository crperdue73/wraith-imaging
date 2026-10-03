<?php
/**
 * The task state manager class.
 *
 * PHP version 5
 *
 * @category TaskStateManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * The task state manager class.
 *
 * @category TaskStateManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class TaskStateManager extends WRAITHManagerController
{
    /**
     * The base table name.
     *
     * @var string
     */
    public $tablename = 'taskStates';
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
                'tsID',
                'tsName',
                'tsDescription',
                'tsOrder',
                'tsIcon'
            ),
            array(
                'INTEGER',
                'VARCHAR(50)',
                'LONGTEXT',
                'TINYINT(4)',
                'VARCHAR(255)'
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
                'tsID',
                'tsName'
            ),
            'InnoDB',
            'utf8',
            'tsID',
            'tsID'
        );
        return self::$DB->query($sql);
    }
}
