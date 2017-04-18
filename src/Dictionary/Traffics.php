<?php
namespace Leads\Dictionary;

use Leads\abstractObject;

/**
 * Class Traffics
 * @package Leads\Dictionary
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property integer id
 * @property string name
 */
class Traffics extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'id', 'name',
        ];
        parent::__construct($token, 'dictionary/traffics');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}