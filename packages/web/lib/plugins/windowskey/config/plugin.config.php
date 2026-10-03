<?php
/**
 * Plugin configuration file.
 *
 * PHP version 5
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   George Rowlett <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Plugin configuration file.
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Lee Rowlett <nah@nah.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
$wraith_plugin = array();
$wraith_plugin['name'] = 'windowskey';
$wraith_plugin['description'] = sprintf(
    '%s %s. %s %s. %s %s. %s: %s %s.',
    _('Windows keys is a plugin that associates product keys'),
    _('for Microsoft Windows to images'),
    _('Those images should be activated with the associated'),
    _('key'),
    _('The key will be assigned to registered hosts when a'),
    _('deploy task occurs for it'),
    _('NOTE'),
    _('When the plugin is removed, the assigned key will remain'),
    _('with the host')
);
$wraith_plugin['menuicon'] = 'fa fa-windows fa-fw';
$wraith_plugin['menuicon_hover'] = null;
$wraith_plugin['entrypoint'] = 'html/run.php';
