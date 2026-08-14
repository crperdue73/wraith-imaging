<?php
/**
 * Loads our global values
 *
 * PHP version 5
 *
 * @category LoadGlobals
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Loads our global values
 *
 * @category LoadGlobals
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class LoadGlobals extends WRAITHBase
{
    /**
     * Used to tell if it has already been loaded.
     *
     * @var bool
     */
    private static $_loadedglobals;
    /**
     * Initialize the class.
     *
     * @return void
     */
    private static function _init()
    {
        global $sub;
        if (self::$_loadedglobals) {
            return;
        }
        $GLOBALS['WRAITHFTP'] = new WRAITHFTP();
        $GLOBALS['WRAITHCore'] = new WRAITHCore();
        DatabaseManager::establish();
        $GLOBALS['DB'] = DatabaseManager::getDB();
        if (!$GLOBALS['DB']) {
            return;
        }
        $GLOBALS['HookManager'] = WRAITHCore::getClass('HookManager');
        $GLOBALS['EventManager'] = WRAITHCore::getClass('EventManager');
        $GLOBALS['WRAITHURLRequests'] = WRAITHCore::getClass('WRAITHURLRequests');
        $userID = 0;
        WRAITHCore::setEnv();
        if (session_status() === PHP_SESSION_ACTIVE) {
            $userID = isset($_SESSION['WRAITH_USER']) ? (int)$_SESSION['WRAITH_USER'] : 0;
        }
        $GLOBALS['currentUser'] = new User($userID);
        $GLOBALS['HookManager']->load();
        $GLOBALS['EventManager']->load();
        $subs = array(
            'configure',
            'authorize',
            'requestClientInfo'
        );
        if (in_array($sub, $subs)) {
            new DashboardPage();
            unset($subs);
            exit;
        }
        self::$_loadedglobals = true;
        unset($subs);
    }
    /**
     * Initializes directly.
     *
     * @return void
     */
    public function __construct()
    {
        self::_init();
        parent::__construct();
    }
}
