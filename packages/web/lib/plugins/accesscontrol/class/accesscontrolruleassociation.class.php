<?php
/**
 * Access Control plugin
 *
 * PHP version 5
 *
 * @category AccessControlRuleAssociation
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Access Control plugin
 *
 * @category AccessControlRuleAssociation
 * @package  WRAITHProject
 * @author   Fernando Gietz <fernando.gietz@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class AccessControlRuleAssociation extends WRAITHController
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $databaseTable = 'roleRuleAssoc';
    /**
     * The table fields.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'rraID',
        'name' => 'rraName',
        'accesscontrolID' => 'rraRoleID',
        'accesscontrolruleID' => 'rraRuleID',
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'accesscontrolID',
        'accesscontrolruleID',
    );
}
