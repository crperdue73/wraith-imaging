<?php
/**
 * The main index presenter
 *
 * PHP version 5
 *
 * @category Index_Page
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * The main index presenter
 *
 * @category Index_Page
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
require '../commons/base.inc.php';

// Initialize required classes
$WRAITHPageManager = WRAITHCore::getClass('WRAITHPageManager');

// Get login process
WRAITHCore::getClass('ProcessLogin')->processMainLogin();

require '../commons/text.php';
$Page = WRAITHCore::getClass('Page');

// Define allowed nodes
$nodes = array(
    'schema',
    'client'
);

// Handle logout or login nodes
if (isset($node) && in_array($node, ['logout', 'login'])) {
    if ($node === 'logout') {
        $currentUser->logout();
    }
    WRAITHCore::redirect('../management/index.php');
    exit;
}

// Render login page if user is not valid
if (!isset($node) || (!in_array($node, $nodes) && !$currentUser->isValid())) {
    $Page
        ->setTitle($wraithlang['Login'])
        ->setSecTitle($wraithlang['ManagementLogin'])
        ->startBody();
    WRAITHCore::getClass('ProcessLogin')
        ->mainLoginForm();
    $Page
        ->endBody()
        ->render();
} else {
    // Handle AJAX requests
    if (WRAITHCore::$ajax) {
        $WRAITHPageManager->render();
        exit;
    }

    // Render main page content
    $Page->startBody();
    $WRAITHPageManager->render();
    $Page
        ->setTitle($WRAITHPageManager->getWRAITHPageTitle())
        ->setSecTitle($WRAITHPageManager->getWRAITHPageName())
        ->endBody()
        ->render();
}
