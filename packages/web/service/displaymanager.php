<?php
/**
 * Display sender for the clients
 *
 * PHP version 5
 *
 * @category DisplayManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Display sender for the clients
 *
 * @category DisplayManager
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new DisplayManager(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
