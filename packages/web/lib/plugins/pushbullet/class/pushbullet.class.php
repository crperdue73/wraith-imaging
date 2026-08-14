<?php
/**
 * The pushbullet database and object definer
 *
 * PHP version 5
 *
 * @category Pushbullet
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Joe Schmitt <jbob182@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * The pushbullet database and object definer
 *
 * @category Pushbullet
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Joe Schmitt <jbob182@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class Pushbullet extends WRAITHController
{
    /**
     * The pushbullet table
     *
     * @var string
     */
    protected $databaseTable = 'pushbullet';
    /**
     * The pushbullet fields and common names
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'pID',
        'token' => 'pToken',
        'name' => 'pName',
        'email' => 'pEmail',
    );
    /**
     * The required fields
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'token',
        'name',
        'email',
    );
}
