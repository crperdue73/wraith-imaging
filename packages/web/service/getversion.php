<?php
/**
 * Get version, used for multiple things.
 * The new wraith client uses this to tell a client to update.
 * It also is used to return the current running WRAITH Version.
 * If the client update is disabled, it should return 0.0.0
 * as all clients use a numerical system of which 0.0.0 is below.
 *
 * PHP version 5
 *
 * @category Getversion
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Get version, used for multiple things.
 * The new wraith client uses this to tell a client to update.
 * It also is used to return the current running WRAITH Version.
 * If the client update is disabled, it should return 0.0.0
 * as all clients use a numerical system of which 0.0.0 is below.
 *
 * @category Getversion
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
$clientUpdate = (bool) WRAITHCore::getSetting('WRAITH_CLIENT_AUTOUPDATE');
if (isset($_REQUEST['client'])) {
    $ver = (
        $clientUpdate ?
        '9.9.99' :
        '0.0.0'
    );
} elseif (isset($_REQUEST['clientver'])) {
    $ver = (
        $clientUpdate ?
        WRAITH_CLIENT_VERSION :
        '0.0.0'
    );
} elseif (isset($_REQUEST['url'])) {

    // Prevent an unauthenticated user from making arbitrary requests.
    WRAITHCore::checkAuthAndCSRF();

    $url = $_REQUEST['url'];

    $parts = parse_url($url);
    if (!$parts || empty($parts['host']) || empty($parts['path'])) {
        http_response_code(400);
        echo 'Invalid url';
        exit;
    }

    // Require http(s)
    $scheme = strtolower($parts['scheme'] ?? '');
    if (!in_array($scheme, ['http', 'https'], true)) {
        http_response_code(400);
        echo 'Invalid scheme';
        exit;
    }

    // Only allow other storage nodes:
    $allowedStorageNodes = WRAITHCore::getSubObjectIDs('StorageNode', '', 'ip');
    $host = strtolower($parts['host']);
    if (!in_array($host, array_map('strtolower', $allowedStorageNodes), true)) {
        http_response_code(403);
        echo 'Host not allowed';
        exit;
    }

    // Require getversion.php only
    if (basename($parts['path']) !== 'getversion.php') {
        http_response_code(403);
        echo 'Path not allowed';
        exit;
    }

    // restrict query params to known ones
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $q);
        $allowedKeys = ['client', 'clientVer'];
        foreach (array_keys($q) as $k) {
            if (!in_array($k, $allowedKeys, true)) {
                http_response_code(403);
                echo 'Query not allowed';
                exit;
            }
        }
    }

    $res = $WRAITHURLRequests->process($_REQUEST['url']);
    $ver = array_shift($res);
} else {
    $ver = WRAITH_VERSION;
}
echo $ver;
exit;
