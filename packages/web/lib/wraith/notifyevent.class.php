<?php
/**
 * Notify event tracker.
 *
 * PHP Version 5
 *
 * @category NotifyEvent
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Notify event tracker.
 *
 * @category NotifyEvent
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class NotifyEvent extends WRAITHController
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $databaseTable = 'notifyEvents';
    /**
     * The table fields.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'neID',
        'name' => 'neName'
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'name'
    );
}
