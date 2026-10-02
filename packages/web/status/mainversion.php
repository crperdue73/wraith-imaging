<?php
/**
 * Gets version information
 *
 * PHP version 5
 *
 * @category Mainversion
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Gets version information
 *
 * @category Mainversion
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
session_write_close();
ignore_user_abort(true);
set_time_limit(0);

$curversion = WRAITH_VERSION;
$urls = array(
    'https://api.github.com/repos/crperdue73/wraith-imaging/tags',
    'https://raw.githubusercontent.com/crperdue73/wraith-imaging/dev-branch/packages/web/lib/wraith/system.class.php',
    'https://raw.githubusercontent.com/crperdue73/wraith-imaging/working-1.6/packages/web/lib/wraith/system.class.php'
);
$resp = $WRAITHURLRequests->process($urls);

$tags = json_decode(array_shift($resp));
foreach ($tags as $tag) {
    $stableversion = $tag->name;
    break;
}
$systemclass = array_shift($resp);
if (preg_match("/WRAITH_VERSION', '([0-9.RCalphbet-]*)'/", $systemclass, $wraithver)) {
    $devversion = $wraithver[1];
}
$systemclass = array_shift($resp);
if (preg_match("/WRAITH_VERSION', '([0-9.RCalphbet-]*)'/", $systemclass, $wraithver)) {
    $alphaversion = $wraithver[1];
}

$stablecheck = version_compare($curversion, $stableversion, '=');
$devcheck = version_compare($curversion, $devversion, '=');
$alphacheck = version_compare($curversion, $alphaversion, '=');

if (!$stablecheck && !$devcheck && !$alphacheck) {
    $result = '<font face="arial" color="red" size="4"><b>You are not running the most current version of WRAITH!</b></font>'
    . "<p>You are currently running WRAITH version: $curversion (" . WRAITH_RELEASE . ")</p>"
    . "<p>Latest stable version is " . $stableversion . "</p>"
    . "<p>Latest dev-branch version is $devversion</p>"
    . "<p>Latest alpha-branch version is $alphaversion</p>";
} else {
    $result = "<b>Your version of WRAITH is up to date.</b><br/>";
    if ($stablecheck) {
        $result .= "You're running the latest stable version: " . $stableversion;
    } elseif ($devcheck) {
        $result .= "You're running the latest dev-branch version: " . $devversion;
    } else {
        $result .= "You're running the latest alpha-branch version: " . $alphaversion;
    }
}


echo json_encode($result);
exit;
