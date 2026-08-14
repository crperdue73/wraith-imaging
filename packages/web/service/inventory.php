<?php
/**
 * Inventory, stores the host inventory.
 *
 * PHP version 5
 *
 * @category Inventory
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Inventory, stores the host inventory.
 *
 * @category Inventory
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
header('Content-Type: text/plain');
// The client base64-encodes every value, so decode (and sanitize) the
// request up front before any field is read.
WRAITHCore::stripAndDecode($_REQUEST);
try {
    // Authenticate by host/MAC the same way the other FOS-facing service
    // endpoints do; getHostItem() reads the mac itself and throws on an
    // unknown/invalid host.
    WRAITHCore::getHostItem(false);
    if (!WRAITHCore::$Host->isValid()) {
        throw new Exception(_('Invalid Host'));
    }
    $Inventory = WRAITHCore::$Host->get('inventory');
    if (!$Inventory instanceof Inventory
        || !$Inventory->isValid()
    ) {
        $Inventory = WRAITHCore::getClass('Inventory')
            ->set('hostID', WRAITHCore::$Host->get('id'));
    }
    // Explicit allowlist of fields a client is permitted to write. Server
    // managed fields (id, hostID, createdTime, deleteDate) are intentionally
    // excluded so a request cannot overwrite a different inventory row or
    // reassign this inventory to another host via mass-assignment.
    $allowedFields = array(
        'primaryUser',
        'other1',
        'other2',
        'sysman',
        'sysproduct',
        'sysversion',
        'sysserial',
        'sysuuid',
        'systype',
        'biosversion',
        'biosvendor',
        'biosdate',
        'mbman',
        'mbproductname',
        'mbversion',
        'mbserial',
        'mbasset',
        'cpuman',
        'cpuversion',
        'cpucurrent',
        'cpumax',
        'mem',
        'caseman',
        'casever',
        'caseserial',
        'caseasset',
        'gpuvendors',
        'gpuproducts',
    );
    foreach ($allowedFields as $field) {
        if (!isset($_REQUEST[$field])) {
            continue;
        }
        $Inventory->set($field, $_REQUEST[$field]);
    }
    // hdinfo is a compound string that is parsed out into separate columns.
    if (isset($_REQUEST['hdinfo'])) {
        $val = $_REQUEST['hdinfo'];
        preg_match(
            '#model=(.*?),#i',
            $val,
            $hdmodel
        );
        preg_match(
            '#fwrev=(.*?),#i',
            $val,
            $hdfirmware
        );
        preg_match(
            '#serialno=.*#i',
            $val,
            $hdserial
        );
        $hdmodel = (
            count($hdmodel) > 1 ?
            trim($hdmodel[1]) :
            ''
        );
        $hdfirmware = (
            count($hdfirmware) > 1 ?
            trim($hdfirmware[1]) :
            ''
        );
        $hdserial = (
            count($hdserial) ?
            trim(
                str_ireplace(
                    'serialno=',
                    '',
                    trim($hdserial[0])
                )
            ) :
            ''
        );
        $Inventory
            ->set('hdmodel', $hdmodel)
            ->set('hdfirmware', $hdfirmware)
            ->set('hdserial', $hdserial);
    }
    if (!$Inventory->save()) {
        throw new Exception(
            _('Failed to create inventory for this host')
        );
    }
    echo _('Done');
} catch (Exception $e) {
    echo Initiator::e($e->getMessage());
}
exit;
