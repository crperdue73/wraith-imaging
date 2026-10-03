<?php
/**
 * Antivirus handler
 *
 * PHP version 5
 *
 * @category Antivirus
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Antivirus handler
 *
 * @category Antivirus
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
try {
    if (trim($_REQUEST['mode']) != array('q', 's')) {
        throw new Exception(_('Invalid operational mode'));
    }
    $string = explode(':', base64_decode($_REQUEST['string']));
    $vInfo = explode(' ', trim($string[1]));
    $Virus = WRAITHCore::getClass('Virus')
        ->set('name', $vInfo[0])
        ->set('mac', strtolower($_REQUEST['mac']))
        ->set('file', $string[0])
        ->set('date', WRAITHCore::formatTime('now', 'Y-m-d H:i:s'))
        ->set('mode', $_REQUEST['mode']);
    if (!$Virus->save()) {
        throw new Exception(_('Failed'));
    }
    throw new Exception(_('Accepted'));
} catch (Exception $e) {
    echo $e->getMessage();
}
