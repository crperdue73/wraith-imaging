<?php
/**
 * Plugin configuration file.
 *
 * PHP version 5
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Wayne Workman <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Plugin configuration file.
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Wayne Workman <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
$wraith_plugin = array();
$wraith_plugin['name'] = 'fileintegrity';
$wraith_plugin['description'] = sprintf(
    '%s %s, %s, %s %s.',
    _('Associates the files on nodes'),
    _('and stores their respective checksums'),
    _('mod dates'),
    _('and the location of the file on that'),
    _('particular node')
);
$wraith_plugin['menuicon'] = 'fa fa-list-ol fa-fw';
$wraith_plugin['menuicon_hover'] = null;
$wraith_plugin['entrypoint'] = 'html/run.php';
