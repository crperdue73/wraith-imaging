<?php
/**
 * Handles exporting of csv, pdf, or DB after verification
 *
 * PHP version 5
 *
 * @category Export
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Handles exporting of csv, pdf, or DB after verification
 *
 * @category Export
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
WRAITHCore::checkAuthAndCSRF();
$report = unserialize(base64_decode($_SESSION['wraithlastreport']));
if (!($report instanceof ReportMaker)) {
    $report = WRAITHCore::getClass('ReportMaker');
}
$report->outputReport();
