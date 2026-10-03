<?php
/**
 * Cleans up users; only good for Windows XP
 *
 * PHP version 5
 *
 * @category Usercleanup_Users
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Cleans up users; only good for Windows XP
 *
 * @category Usercleanup_Users
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new UserCleaner(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
