<?php
namespace Leads\Leads;

use Leads\abstractObject;

/**
 * Class Report
 * @package Leads\Leads
 *
 * @property integer platform_id required
 * @property integer offer_id required
 * @property integer lead_id
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property string start_lead_date Y-m-d
 * @property string end_lead_date Y-m-d
 * @property string source maxlength = 255
 * @property string aff_sub1 maxlength = 255
 * @property string aff_sub2 maxlength = 255
 * @property string aff_sub3 maxlength = 255
 * @property string aff_sub4 maxlength = 255
 * @property string aff_sub5 maxlength = 255
 */
class Report extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'platform_id', 'offer_id', 'lead_id', 'start_lead_date',
            'end_lead_date', 'source',
            'aff_sub1', 'aff_sub2', 'aff_sub3', 'aff_sub4', 'aff_sub5',
        ];
        parent::__construct($token, 'leads/report');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}