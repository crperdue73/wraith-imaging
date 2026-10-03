<?php
/**
 * Legacy client uses this to find out
 * if the module checked is usable.
 *
 * PHP version 5
 *
 * @category ServiceModule_Active
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Legacy client uses this to find out
 * if the module checked is usable.
 *
 * @category ServiceModule_Active
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new ServiceModule(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
