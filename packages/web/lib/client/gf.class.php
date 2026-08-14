<?php
/**
 * Handles GreenWraith, now only for legacy client
 *
 * PHP version 5
 *
 * @category Greenwraith
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Handles GreenWraith, now only for legacy client
 *
 * @category Greenwraith
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
class GF extends WRAITHClient implements WRAITHClientSend
{
    /**
     * Module associated shortname
     *
     * @var string
     */
    public $shortName = 'greenwraith';
    /**
     * Creates the send string and stores to send variable
     *
     * @return void
     */
    public function send()
    {
        $gfcount = self::getClass('GreenWraithManager')
            ->count();
        if ($gfcount < 1) {
            throw new Exception('#!na');
        }
        $Send = array();
        foreach ((array)self::getClass('GreenWraithManager')
            ->find() as $index => &$gf
        ) {
            $actionTemp = $gf->get('action');
            $actionTemp = strtolower($actionTemp);
            $actionTemp = trim($actionTemp);
            $action = '';
            switch ($actionTemp) {
                case 's':
                    $action = 'shutdown';
                    break;
                case 'r':
                    $action = 'reboot';
                    break;
            }
            if (empty($action)) {
                continue;
            }
            $val = sprintf(
                '%d@%d@%s',
                $gf->get('hour'),
                $gf->get('min'),
                $action
            );
            $Send[$index] = sprintf(
                "%s\n",
                base64_encode($val)
            );
        }
        $this->send = implode($Send);
    }
}
