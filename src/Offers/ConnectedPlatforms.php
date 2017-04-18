<?php
namespace Leads\Offers;

use Leads\abstractObject;

/**
 * Class ConnectedPlatforms
 * @package Leads\Offers
 * Получение списка офферов, подключенных к моим площадкам
 *
 * @property integer offset default = 0
 * @property integer limit from 1 to 500, default = 50
 * @property integer id
 * @property integer geo (1 - yes|0 - no)
 * @property integer extendedFields
 * @property array categories [id0, id1 ... idn]
 * @property array traffic_types [id0, id1 ... idn]
 * @property integer platform_id
 */
class ConnectedPlatforms extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'offset', 'limit', 'id', 'geo', 'extendedFields', 'categories',
            'traffic_types', 'platform_id',
        ];
        parent::__construct($token, 'offers/connectedPlatforms');
    }

    public function get($type = 'json')
    {
        $this->setResponseType($type);
        return parent::get();
    }
}