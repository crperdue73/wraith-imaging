<?php
/**
 * Autologout information client
 *
 * PHP version 5
 *
 * @category Autologout
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Autologout information client
 *
 * @category Autologout
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new Autologout(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
