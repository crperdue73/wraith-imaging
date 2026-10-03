<?php
/**
 * Hostgetkey returns the host token for hostinfo getting
 *
 * PHP version 5
 *
 * @category Hostgetkey
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Hostgetkey returns the host token for hostinfo getting
 *
 * @category Hostgetkey
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
header('Content-Type: text/plain');
try {
    WRAITHCore::getHostItem(false, true);
    if (!WRAITHCore::$Host->isValid()) {
        throw new Exception(_('Host Invalid'));
    }
    #if (WRAITHCore::$useragent) {
    #    throw new Exception(_('Accessed inappropriately'));
    #}
    if (!WRAITHCore::$Host->get('task')->isValid()) {
        throw new Exception(_('Invalid Tasking'));
    }
    if (WRAITHCore::$Host->get('token') && WRAITHCore::$Host->get('tokenlock')) {
        throw new Exception(_('Host token is currently in use'));
    }
    if (!WRAITHCore::$Host->get('token')) {
        $newToken = WRAITHCore::createSecToken();
        WRAITHCore::getClass('HostManager')->update(
            ['id' => WRAITHCore::$Host->get('id')],
            '',
            [
                'token' => $newToken,
                'tokenlock' => true
            ]
        );
        throw new Exception($newToken);
    }
    if (WRAITHCore::$Host->isValid() && !WRAITHCore::$Host->get('tokenlock')) {
        WRAITHCore::getClass('HostManager')->update(
            ['id' => WRAITHCore::$Host->get('id')],
            '',
            ['tokenlock' => true]
        );
        throw new Exception(WRAITHCore::$Host->get('token'));
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}
