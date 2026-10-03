<?php
/**
 * Legacy client only, gives the background image
 * to use.
 *
 * PHP version 5
 *
 * @category ALO-BG
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Legacy client only, gives the background image
 * to use.
 *
 * @category ALO-BG
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
new ALOBG(
    true,
    false,
    false,
    false,
    isset($_REQUEST['newService'])
);
