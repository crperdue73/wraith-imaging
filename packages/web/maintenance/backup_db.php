<?php
/**
 * Backs up the db for us
 *
 * PHP version 5
 *
 * @category Backup_DB
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Backs up the db for us
 *
 * @category Backup_DB
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
WRAITHCore::getClass('ReportMaker')->outputReport(3, true);
