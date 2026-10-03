<?php
/**
 * The image type class.
 *
 * PHP version 5
 *
 * @category ImageType
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * The image type class.
 *
 * @category ImageType
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class ImageType extends WRAITHController
{
    /**
     * The image type table.
     *
     * @var string
     */
    protected $databaseTable = 'imageTypes';
    /**
     * The image type fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'imageTypeID',
        'name' => 'imageTypeName',
        'type' => 'imageTypeValue'
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'name',
        'type',
    );
}
