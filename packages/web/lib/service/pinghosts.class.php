<?php
/**
 * Gets the current ping code of each host and
 * updates the hosts related to them.
 *
 * PHP version 5
 *
 * @category PingHosts
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Gets the current ping code of each host and
 * updates the hosts related to them.
 *
 * @category PingHosts
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class PingHosts extends WRAITHService
{
    /**
     * Is the host lookup/ping enabled
     *
     * @var int
     */
    private static $_pingOn = 0;
    /**
     * The wraith web host
     *
     * @var string
     */
    private static $_wraithWeb = '';
    /**
     * Where to get the services sleeptime
     *
     * @var string
     */
    public static $sleeptime = 'PINGHOSTSLEEPTIME';
    /**
     * Initializes the PingHost Class
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        list(
            self::$_wraithWeb,
            $dev,
            $log,
            $zzz
        ) = self::getSubObjectIDs(
            'Service',
            array(
                'name' => array(
                    'WRAITH_WEB_HOST',
                    'PINGHOSTDEVICEOUTPUT',
                    'PINGHOSTLOGFILENAME',
                    self::$sleeptime
                )
            ),
            'value',
            false,
            'AND',
            'name',
            false,
            ''
        );
        static::$log = sprintf(
            '%s%s',
            (
                self::$logpath ?
                self::$logpath :
                '/opt/wraith/log/'
            ),
            (
                $log ?
                $log :
                'pinghost.log'
            )
        );
        if (file_exists(static::$log)) {
            unlink(static::$log);
        }
        static::$dev = (
            $dev ?
            $dev :
            '/dev/tty3'
        );
        static::$zzz = (
            $zzz ?
            $zzz :
            300
        );
    }
    /**
     * This is what almost all services have available
     * but is specific to this service
     *
     * @throws Exception
     * @return void
     */
    private function _commonOutput()
    {
        try {
            self::$_pingOn = self::getSetting('PINGHOSTGLOBALENABLED');
            if (self::$_pingOn < 1) {
                throw new Exception(_(' * Ping hosts is globally disabled'));
            }
            $webServerIP = self::resolveHostName(
                self::$_wraithWeb
            );
            self::outall(
                sprintf(' * WRAITH Web Host IP: %s', $webServerIP)
            );
            self::getIPAddress();
            if (!in_array($webServerIP, self::$ips)) {
                throw new Exception(
                    _('I am not the wraith web server')
                );
            }
            foreach ((array)self::$ips as $index => &$ip) {
                if ($index === 0) {
                    self::outall(
                        sprintf(
                            ' * %s',
                            _('This servers ip(s)')
                        )
                    );
                }
                self::outall(" |\t$ip");
                unset($ip, $index);
            }
            $hostCount = self::getClass('HostManager')->count();
            self::outall(
                sprintf(
                    ' * %s %s %s',
                    _('Attempting to ping'),
                    $hostCount,
                    (
                        $hostCount != 1 ?
                        _('hosts') :
                        _('host')
                    )
                )
            );
            $hostids = (array)self::getsubObjectIDs('Host');
            $hostnames = (array)self::getSubObjectIDs(
                'Host',
                array('id' => $hostids),
                'name'
            );
            $hostips = (array)self::getSubObjectIDs(
                'Host',
                array(
                    'id' => $hostids,
                    'name' => $hostnames
                ),
                'ip',
                false,
                'AND',
                'name',
                false,
                ''
            );
            foreach ((array)$hostids as $index => &$hostid) {
                if (false === array_key_exists($index, $hostips)
                    || false === array_key_exists($index, $hostnames)
                ) {
                    continue;
                }
                $ip = $hostips[$index];
                if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                    $ip = self::resolveHostname($hostnames[$index]);
                }
                if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                    $ip = $hostnames[$index];
                }
                unset($hostnames[$index], $hostips[$index]);
                $ping = self::getClass('Ping', $ip)
                    ->execute();
                self::getClass('HostManager')
                    ->update(
                        array('id' => $hostid),
                        '',
                        array('pingstatus' => $ping)
                    );
                unset($hostid, $hostids[$index]);
            }
            self::outall(' * All hosts updated');
        } catch (Exception $e) {
            self::outall($e->getMessage());
        }
    }
    /**
     * This is what essentially "runs" the service
     *
     * @return void
     */
    public function serviceRun()
    {
        $this->_commonOutput();
        parent::serviceRun();
    }
}
