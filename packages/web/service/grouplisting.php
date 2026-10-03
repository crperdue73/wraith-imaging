<?php
/**
 * Returns a listing of all groups in the system.
 *
 * PHP version 5
 *
 * @category Grouplisting
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Returns a listing of all groups in the system.
 *
 * @category Grouplisting
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
try {
    $groupCount = WRAITHCore::getClass('GroupManager')
        ->count();
    if ($groupCount < 1) {
        throw new Exception(
            _('There are no groups on this server')
        );
    }
    $groupids = WRAITHCore::getSubObjectIDs('Group');
    $groupnames = WRAITHCore::getSubObjectIDs(
        'Group',
        array('id' => $groupids),
        'name'
    );
    foreach ((array)$groupids as $index => $groupid) {
        printf(
            '\tID# %d\t-\t%s\n',
            $groupid,
            $groupnames[$index]
        );
        unset(
            $groupid,
            $groupnames[$index],
            $groupids[$index]
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
exit;
