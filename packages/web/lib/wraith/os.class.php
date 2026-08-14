<?php
/**
 * The os class.
 *
 * PHP version 5
 *
 * @category OS
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * The os class.
 *
 * @category OS
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class OS extends WRAITHController
{
    /**
     * The os table name.
     *
     * @var string
     */
    protected $databaseTable = 'os';
    /**
     * The os fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'osID',
        'name' => 'osName',
        'description' => 'osDescription'
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'name',
    );
}
