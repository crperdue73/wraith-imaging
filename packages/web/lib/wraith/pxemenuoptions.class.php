<?php
/**
 * Pxe menu items class.
 *
 * PHP version 5
 *
 * @category PXEMenuOptions
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Pxe menu items class.
 *
 * @category PXEMenuOptions
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class PXEMenuOptions extends WRAITHController
{
    /**
     * The PXE menu items table.
     *
     * @var string
     */
    protected $databaseTable = 'pxeMenu';
    /**
     * The PXE menu items fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'pxeID',
        'name' => 'pxeName',
        'description' => 'pxeDesc',
        'params' => 'pxeParams',
        'default' => 'pxeDefault',
        'regMenu' => 'pxeRegOnly',
        'args' => 'pxeArgs',
        'hotkey' => 'pxeHotKeyEnable',
        'keysequence' => 'pxeKeySequence',
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
