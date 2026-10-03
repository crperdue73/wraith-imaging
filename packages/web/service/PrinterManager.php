<?php
/**
 * Printer client script
 *
 * PHP version 5
 *
 * @category PrinterClient
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Printer client script
 *
 * @category PrinterClient
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new PrinterClient(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
