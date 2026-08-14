<?php
/**
 * Hook event tracker.
 *
 * PHP Version 5
 *
 * @category HookEvent
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Hook event tracker.
 *
 * @category HookEvent
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class HookEvent extends WRAITHController
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $databaseTable = 'hookEvents';
    /**
     * The table fields.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'heID',
        'name' => 'heName'
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
