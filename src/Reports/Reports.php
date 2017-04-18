<?php
namespace Leads\Reports;

use Leads\abstractObject;

/**
 * Class Reports
 * @package Leads\Reports
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property string id
 * @property string start_date Y-m-d
 * @property string end_date Y-m-d
 * @property string grouping (hour|day|week|month|year)
 * @property integer offer_id
 * @property integer goal_id
 * @property integer platform_id
 * @property string status (approved|rejected|pending)
 * @property string ip
 * @property string source maxlength = 255
 * @property string aff_sub1 maxlength = 255
 * @property string aff_sub2 maxlength = 255
 * @property string aff_sub3 maxlength = 255
 * @property string aff_sub4 maxlength = 255
 * @property string aff_sub5 maxlength = 255
 */
class Reports extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'id', 'start_date', 'end_date', 'offer_id',
            'goal_id', 'platform_id', 'status', 'ip', 'source', 'grouping',
            'aff_sub1', 'aff_sub2', 'aff_sub3', 'aff_sub4', 'aff_sub5',
        ];
        parent::__construct($token, 'reports');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}