<?php
/**
 * Stores any actions to the database.
 *
 * PHP version 5
 *
 * @category History
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Stores any actions to the database.
 *
 * @category History
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class History extends WRAITHController
{
    /**
     * History table name.
     *
     * @var string
     */
    protected $databaseTable = 'history';
    /**
     * History field and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'hID',
        'info' => 'hText',
        'createdBy' => 'hUser',
        'createdTime' => 'hTime',
        'ip' => 'hIP',
    );
}
