<?php
/**
 * Checks for any jobs for the host
 *
 * PHP version 5
 *
 * @category Jobs
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Checks for any jobs for the host
 *
 * @category Jobs
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
new Jobs(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
