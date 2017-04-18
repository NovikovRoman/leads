<?php
namespace Leads\Geo;

use Leads\abstractObject;

/**
 * Class GetRegions
 * @package Leads\Geo
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property integer id
 * @property string name
 * @property integer country_id
 */
class GetRegions extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'id', 'name', 'country_id',
        ];
        parent::__construct($token, 'geo/getRegions');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}