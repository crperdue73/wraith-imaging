<?php
/**
 * Snapin client file download
 *
 * PHP version 5
 *
 * @category Snapin_File
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Snapin client file download
 *
 * @category Snapin_File
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new SnapinClient(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
