<?php
/**
 * Cleans directories but only for legacy client
 *
 * PHP version 5
 *
 * @category DirectoryCleanup
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * Cleans directories but only for legacy client
 *
 * @category DirectoryCleanup
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class DirectoryCleanup extends WRAITHClient implements WRAITHClientSend
{
    /**
     * Module associated shortname
     *
     * @var string
     */
    public $shortName = 'dircleanup';
    /**
     * Stores the data to send
     *
     * @var string
     */
    protected $send;
    /**
     * Creates the send string and stores to send variable
     *
     * @return void
     */
    public function send()
    {
        foreach ((array)self::getClass('DirCleanerManager')
            ->find() as $i => &$DirectoryCleanup
        ) {
            $SendEnc = base64_encode($DirectoryCleanup->get('path'));
            $SendEnc .= "\n";
            $Send[$i] = $SendEnc;
            unset($DirectoryCleanup);
        }
        unset($DirectoryCleanups);
        $this->send = implode((array)$Send);
        $this->send = trim($this->send);
        if (empty($this->send)) {
            $this->send = sprintf(
                '#!er: %s',
                _('No directories defined to be cleaned up')
            );
        }
    }
}
