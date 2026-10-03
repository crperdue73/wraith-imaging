<?php
/**
 * Example class builder for plugins
 *
 * PHP version 5
 *
 * @category Example
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Example class builder for plugins
 *
 * @category Example
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class Example extends WRAITHController
{
    /**
     * The example table.
     *
     * @var string
     */
    protected $databaseTable = 'example';
    /**
     * The database fields and commonized items.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'eID',
        'name' => 'eName',
        'other' => 'eOther',
        'hostID' => 'eHostID',
    );
    /**
     * The required fields
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'name',
        'hostID',
    );
    /**
     * Additional fields
     *
     * @var array
     */
    protected $additionalFields = array(
        'host',
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
    /**
     * Return the host object.
     *
     * @return object
     */
    public function getHost()
    {
        return $this->get('host');
    }
}
