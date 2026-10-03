<?php
/**
 * This is used by the client to determine
 * domain joining and changing hostname.
 *
 * PHP version 5
 *
 * @category Hostname
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * This is used by the client to determine
 * domain joining and changing hostname.
 *
 * @category Hostname
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new HostnameChanger(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
