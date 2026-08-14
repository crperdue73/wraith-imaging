<?php
/**
 * Check if the node exists and return it
 *
 * PHP version 5
 *
 * @category Check_Node_Exists
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Check if the node exists and return it
 *
 * PHP version 5
 *
 * @category Check_Node_Exists
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
$val = '';
$exists = WRAITHCore::getClass('StorageNodeManager')
    ->exists($_POST['ip'], '', 'ip');
if ($exists) {
    $val = 'exists';
}
echo $val;
exit;
