<?php
/**
 * The snapin job handler class.
 *
 * PHP version 5
 *
 * @category SnapinJob
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
/**
 * The snapin job handler class.
 *
 * @category SnapinJob
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging
 */
class SnapinJob extends WRAITHController
{
    /**
     * The snapin job name.
     *
     * @var string
     */
    protected $databaseTable = 'snapinJobs';
    /**
     * The snapin job fields and common names.
     *
     * @var array
     */
    protected $databaseFields = array(
        'id' => 'sjID',
        'hostID' => 'sjHostID',
        'stateID' => 'sjStateID',
        'createdTime' => 'sjCreateTime',
    );
    /**
     * The required fields.
     *
     * @var array
     */
    protected $databaseFieldsRequired = array(
        'hostID',
        'stateID',
    );
    /**
     * Additional fields
     *
     * @var array
     */
    protected $additionalFields = array(
        'host',
        'state',
        'snapintasks'
    );
    /**
     * Database -> Class field relationships
     *
     * @var array
     */
    protected $databaseFieldClassRelationships = array(
        'Host' => array(
            'id',
            'hostID',
            'host'
        ),
        'TaskState' => array(
            'id',
            'stateID',
            'state'
        )
    );
    /**
     * Load tasks
     *
     * @return void
     */
    protected function loadSnapintasks()
    {
        $snapintasks = self::getSubObjectIDs(
            'SnapinTask',
            array('jobID' => $this->get('id'))
        );
        $this->set('snapintasks', (array)$snapintasks);
    }
    /**
     * Cancel's the current job.
     *
     * @return bool
     */
    public function cancel()
    {
        return $this->getManager()->cancel($this->get('id'));
    }
}
