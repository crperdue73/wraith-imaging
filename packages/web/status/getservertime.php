<?php
/**
 * Returns the server time
 *
 * PHP version 5
 *
 * @category Getservertime
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Returns the server time
 *
 * @category Getservertime
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
session_write_close();
ignore_user_abort(true);
set_time_limit(0);
echo WRAITHCore::formatTime(
    'Now',
    'M d, Y G:i a'
);
exit;
