<?php
/**
 * Check in tasks.
 *
 * PHP version 5
 *
 * @category Check_In
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Check in tasks.
 *
 * @category Check_In
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
WRAITHCore::getClass('TaskQueue')
    ->checkIn();
