<?php
/**
 * Tracks users logging in and out
 *
 * PHP version 5
 *
 * @category UserTrack
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Tracks users logging in and out
 *
 * @category UserTrack
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
new UserTrack(
    true,
    !isset($_REQUEST['newService'])
);
