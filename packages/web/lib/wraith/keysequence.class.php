<?php
/**
 * The key sequence class.
 *
 * PHP version 5
 *
 * @category KeySequence
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * The key sequence class.
 *
 * @category KeySequence
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class KeySequence extends WRAITHController
{
    /**
     * The keysequence table name.
     *
     * @var string
     */
    protected $databaseTable = 'keySequence';
    /**
     * The keysequence field and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'ksID',
        'name' => 'ksValue',
        'ascii' => 'ksAscii',
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'name',
        'ascii',
    );
}
