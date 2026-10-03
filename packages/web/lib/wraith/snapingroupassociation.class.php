<?php
/**
 * Snapin group association handling.
 *
 * PHP version 5
 *
 * @category SnapinGroupAssociation
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Snapin group association handling.
 *
 * @category SnapinGroupAssociation
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class SnapinGroupAssociation extends WRAITHController
{
    /**
     * The snapin group association table.
     *
     * @var string
     */
    protected $databaseTable = 'snapinGroupAssoc';
    /**
     * The snapin group association fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'sgaID',
        'snapinID' => 'sgaSnapinID',
        'storagegroupID' => 'sgaStorageGroupID',
        'primary' => 'sgaPrimary',
    );
    /**
     * The required fields
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'snapinID',
        'storagegroupID',
    );
    /**
     * Additional fields
     *
     * @var array
     */
    protected $additionalFields = array(
        'snapin',
        'storagegroup'
    );
    /**
     * Database -> Class field relationships
     *
     * @var array
     */
    protected $databaseFieldClassRelationships = array(
        'Snapin' => array(
            'id',
            'snapinID',
            'snapin'
        ),
        'StorageGroup' => array(
            'id',
            'storagegroupID',
            'storagegroup'
        )
    );
    /**
     * Gets the snapin object
     *
     * @return object
     */
    public function getSnapin()
    {
        return $this->get('snapin');
    }
    /**
     * Gets the associated storage group.
     *
     * @return object
     */
    public function getStorageGroup()
    {
        return $this->get('storagegroup');
    }
    /**
     * Returns whether this is the primary group or not.
     *
     * @return bool
     */
    public function isPrimary()
    {
        return (bool)$this->get('primary');
    }
}
