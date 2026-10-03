<?php
/**
 * System, the basic system layout.
 *
 * PHP Version 5
 *
 * This just presents the system variables
 *
 * @category System
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * System, the basic system layout.
 *
 * @category System
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class System
{
    const PHP_REQUIRED = '5.6.0';
    /**
     * Checks the php version against what we require.
     *
     * @return void
     */
    private static function _versionCompare()
    {
        $msg = '';
        if (false === version_compare(PHP_VERSION, self::PHP_REQUIRED, '>=')) {
            $msg = sprintf(
                '%s. %s %s, %s %s %s.',
                _('Your system PHP Version is not sufficient'),
                _('You have version'),
                PHP_VERSION,
                _('version'),
                self::PHP_REQUIRED,
                _('is required')
            );
        }
        if ($msg) {
            die($msg);
        }
    }
    /**
     * Constructs the system variables.
     */
    public function __construct()
    {
        self::_versionCompare();
        define('WRAITH_VERSION', '1.6.0.0');
        // WRAITH cuts its own version line from 1.6.0.0 — the rebrand and the
        // lab PXE features have diverged from the upstream. The FOG Project
        // baseline this release is built from is recorded here and in
        // UPSTREAM_VERSION.
        define('WRAITH_UPSTREAM_BASELINE', '1.5.10.1903');
        define('WRAITH_RELEASE', 'wraith-1.6.0.0');
        define('WRAITH_SCHEMA', 274);
        define('WRAITH_BCACHE_VER', 141);
        define('WRAITH_CLIENT_VERSION', '0.13.0');
    }
}
