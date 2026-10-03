<?php
/**
 * Checks the snapin.
 *
 * PHP version 5
 *
 * @category SnapinCheck
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Checks the snapin.
 *
 * @category SnapinCheck
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
try {
    WRAITHCore::getHostItem(false);
    if (!WRAITHCore::$Host->isValid()) {
        throw new Exception('#!ih');
    }
    $SnapinJob = WRAITHCore::$Host
        ->get('snapinjob');
    if (!$SnapinJob->isValid()) {
        throw new Exception(0);
    }
    $snapinids = WRAITHCore::getSubObjectIDs(
        'SnapinTask',
        array(
            'stateID' => $WRAITHCore->getQUeuedStates(),
            'jobID' => $SnapinJob->get('id')
        ),
        'snapinID'
    );
    if (isset($_REQUEST['getSnapnames'])) {
        $snapins = WRAITHCore::getSubObjectIDs(
            'Snapin',
            array('id' => $snapinids),
            'name'
        );
    } elseif (isset($_REQUEST['getSnapargs'])) {
        $snapins = WRAITHCore::getSubObjectIDs(
            'Snapin',
            array('id' => $snapinids),
            'args'
        );
    } else {
        $snapins = (
            WRAITHCore::getClass('SnapinTaskManager')
            ->count(
                array(
                    'stateID' => WRAITHCore::getQueuedStates(),
                    'jobID' => $SnapinJob->get('id')
                )
            ) ?
            1 :
            0
        );
    }
    echo implode(' ', (array)$snapins);
} catch (Exception $e) {
    echo $e->getMessage();
}
exit;
