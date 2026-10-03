<?php
/**
 * Plugin configuration file.
 *
 * PHP version 5
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @author   Lee Rowlett <nah@nah.com>
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
$wraith_plugin['name'] = 'location';
$wraith_plugin['description'] = sprintf(
    '%s %s %s. %s %s %s.',
    _('Location is a plugin that allows your WRAITH Server'),
    _('to operate in an environment where there may be'),
    _('multiple places to get your image'),
    _('This is especially useful if you have multiple'),
    _('sites with clients moving back and forth'),
    _('between different sites')
);
$wraith_plugin['menuicon'] = 'fa fa-globe fa-fw';
$wraith_plugin['menuicon_hover'] = null;
$wraith_plugin['entrypoint'] = 'html/run.php';
