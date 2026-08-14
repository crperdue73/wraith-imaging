<?php
/**
 * The oui class.
 *
 * PHP version 5
 *
 * @category OUI
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.rog
 */
/**
 * The oui class.
 *
 * @category OUI
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.rog
 */
class OUI extends WRAITHController
{
    /**
     * The oui table name.
     *
     * @var string
     */
    protected $databaseTable = 'oui';
    /**
     * The oui fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'ouiID',
        'prefix' => 'ouiMACPrefix',
        'name' => 'ouiMan',
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'prefix',
        'name',
    );
}
