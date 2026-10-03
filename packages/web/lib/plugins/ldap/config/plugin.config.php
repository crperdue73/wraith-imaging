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
$wraith_plugin['name'] = 'LDAP';
$wraith_plugin['description'] = 'LDAP plugin to use a LDAP validation with WRAITH'
    . '. Ensure you have the php ldap module installed and loaded on your '
    . 'server.  This can be done typically by using your distros package '
    . 'manager software.  (e.g. apt-get install php5-ldap, '
    . 'yum install php-ldap). Version: 1.5.5_2';
$wraith_plugin['menuicon'] = 'fa fa-key fa-fw';
$wraith_plugin['menuicon_hover'] = null;
$wraith_plugin['entrypoint'] = 'html/run.php';
