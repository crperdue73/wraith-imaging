<?php
/**
 * Multicast check in
 *
 * PHP version 5
 *
 * @category Multicast_Checkin
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Multicast check in
 *
 * @category Multicast_Checkin
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
WRAITHCore::getClass('TaskQueue')
    ->checkIn();
