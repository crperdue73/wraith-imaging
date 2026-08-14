<?php
/**
 * Returns a listing of all locations in the system.
 *
 * PHP version 5
 *
 * @category Locationlisting
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Returns a listing of all locations in the system.
 *
 * @category Locationlisting
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
try {
    $locationCount = WRAITHCore::getClass('LocationManager')
        ->count();
    if ($locationCount < 0) {
        throw new Exception(
            _('There are no locations on this server')
        );
    }
    $locationids = WRAITHCore::getSubObjectIDs('Location');
    $locationnames = WRAITHCore::getSubObjectIDs(
        'Location',
        array('id' => $locationids),
        'name'
    );
    foreach ((array)$locationids as $index => $locationid) {
        printf(
            '\tID# %d\t-\t%s\n',
            $locationid,
            $locationnames[$index]
        );
        unset(
            $locationid,
            $locationnames[$index],
            $locationids[$index]
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
exit;
