<?php
/**
 * A basic interface to define how client classes should operate
 *
 * PHP version 5
 *
 * @category WRAITHClientSend
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * A basic interface to define how client classes should operate
 *
 * @category WRAITHClientSend
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
interface WRAITHClientSend
{
    /**
     * Creates the send string and stores to send variable
     *
     * @return void
     */
    public function send();
}
