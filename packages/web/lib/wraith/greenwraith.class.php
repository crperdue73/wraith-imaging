<?php
/**
 * GreenWraith handler, specific to legacy client now.
 *
 * PHP version 5
 *
 * @category GreenWraith
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * GreenWraith handler, specific to legacy client now.
 *
 * @category GreenWraith
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class GreenWraith extends WRAITHController
{
    /**
     * Green wraith table name.
     *
     * @var string
     */
    public $databaseTable = 'greenWraith';
    /**
     * Green wraith field names and common names.
     *
     * @var array
     */
    public $databaseFields = array(
        'id'    => 'gfID',
        'hostID' => 'gfHostID',
        'hour'    => 'gfHour',
        'min'    => 'gfMin',
        'action' => 'gfAction',
        'days'    => 'gfDays',
    );
    /**
     * Returns the Host object.
     *
     * @return object
     */
    public function getHost()
    {
        return new Host($this->get('hostID'));
    }
}
