<?php
/**
 * Plugin configuration file.
 *
 * PHP version 5
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Plugin configuration file.
 *
 * @category Config
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
$wraith_plugin = array();
$wraith_plugin['name'] = 'wolbroadcast';
$wraith_plugin['description'] = 'Allows you to create WOL across '
    . 'separate broadcast addresses. '
    . 'Should only be used if you cannot edit your network switches.';
$wraith_plugin['menuicon'] = 'fa fa-plug fa-fw';
$wraith_plugin['menuicon_hover'] = null;
$wraith_plugin['entrypoint'] = 'html/run.php';
