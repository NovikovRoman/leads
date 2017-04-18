<?php
namespace Leads\Offices;

use Leads\abstractObject;

/**
 * Class Offices
 * @package Leads\Offices
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property integer offer_id required
 * @property integer region_id required
 * @property integer city_id
 */
class Offices extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'offer_id', 'region_id', 'city_id'
        ];
        parent::__construct($token, 'offices');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}