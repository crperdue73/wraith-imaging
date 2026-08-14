<?php
/**
 * Site plugin
 *
 * PHP version 7
 *
 * @category SiteUserRestriction
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Site plugin
 *
 * @category SiteUserRestriction
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class SiteUserRestriction extends WRAITHController
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $databaseTable = 'siteUserRestriction';
    /**
     * The table fields.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'surID',
        'userID' => 'surUserID',
        'isRestricted' => 'surRestricted'
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'id',
        'userID'
    );
    /**
     * Additional fields.
     *
     * @var array
     */
    protected $additionalFields = array(
        'user'
    );
    /**
     * Database -> Class field relationships
     *
     * @var array
     */
    protected $databaseFieldClassRelationships = array(
        'User' => array(
            'id',
            'userID',
            'user'
        )
    );
}
