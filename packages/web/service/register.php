<?php
/**
 * Passes the legacy and new client
 * host register information.  Particularly
 * useful for adding additional mac addresses.
 *
 * PHP version 5
 *
 * @category Register
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Passes the legacy and new client
 * host register information.  Particularly
 * useful for adding additional mac addresses.
 *
 * @category Register
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
new RegisterClient(
    true,
    false,
    isset($_REQUEST['newService']),
    false,
    isset($_REQUEST['newService'])
);
