<?php
/**
 * UserTracking handles tracking users from client to client
 *
 * PHP version 5
 *
 * @category UserTracking
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * UserTracking handles tracking users from client to client
 *
 * @category UserTracking
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class UserTracking extends WRAITHController
{
    /**
     * DatabaseTable
     *
     * @var string
     */
    protected $databaseTable = 'userTracking';
    /**
     * DatabaseFields
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'utID',
        'hostID' => 'utHostID',
        'username' => 'utUserName',
        'action' => 'utAction',
        'datetime' => 'utDateTime',
        'description' => 'utDesc',
        'date' => 'utDate',
        'anon3' => 'utAnon3',
    );
    /**
     * DatabaseFieldsRequired
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'hostID',
        'username',
    );
    /**
     * Additional fields
     *
     * @var array
     */
    protected $additionalFields = array(
        'host'
    );
    /**
     * Database -> Class field relationships
     *
     * @var array
     */
    protected $databaseFieldClassRelationships = array(
        'Host' => array(
            'id',
            'hostID',
            'host'
        )
    );
}
