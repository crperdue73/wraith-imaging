<?php
/**
 * Checks the database is running
 *
 * PHP version 5
 *
 * @category Dbrunning
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Checks the database is running
 *
 * @category Dbrunning
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
require '../commons/base.inc.php';
session_write_close();
ignore_user_abort(true);
set_time_limit(0);
$link = DatabaseManager::getLink();
$redirect = false;
if ($link) {
    $redirect = WRAITHCore::getClass('Schema', 1)
        ->get('version') == WRAITH_SCHEMA;
}
$ret = array(
    'running' => (bool)$link,
    'redirect' => (bool)$redirect,
);
/**
 * When the database is unreachable, expose the underlying connection error
 * (e.g. SQLSTATE[HY000] [2002] Permission denied) so the cause is diagnosable.
 * The message is sanitized by connectError() -- the SQLSTATE/reason is kept
 * while identifiers (db user/host/name) are redacted -- so it is safe to
 * return even though this page is reachable pre-authentication.
 */
if (!$link) {
    $ret['error'] = DatabaseManager::getDB()->connectError();
}
$ret = json_encode($ret);
echo $ret;
exit;
