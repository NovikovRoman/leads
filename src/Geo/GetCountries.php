<?php
namespace Leads\Geo;

use Leads\abstractObject;

/**
 * Class GetCountries
 * @package Leads\Geo
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property integer id
 * @property string name
 * @property string iso_alpha2 length = 2 (country code)
 */
class GetCountries extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'id', 'name', 'iso_alpha2',
        ];
        parent::__construct($token, 'geo/getCountries');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}