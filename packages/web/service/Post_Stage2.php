<?php
/**
 * Check out upload task.
 *
 * PHP version 5
 *
 * @category Upload_Complete
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Check out upload task.
 *
 * @category Upload_Complete
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';
WRAITHCore::getClass('TaskQueue')
    ->checkout();
