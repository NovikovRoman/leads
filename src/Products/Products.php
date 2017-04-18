<?php
namespace Leads\Products;

use Leads\abstractObject;

/**
 * Class Products
 * @package Leads\Products
 *
 * @property integer platform_id required
 * @property integer offer_id required
 * @property integer vendor_id
 * @property array categories [id0, id1 ... idn]
 */
class Products extends abstractObject
{
    public function __construct($token)
    {
        $this->properties = [
            'platform_id', 'vendor_id', 'offer_id', 'categories'
        ];
        parent::__construct($token, 'products/getYML');
    }

    public function get()
    {
        return parent::get();
    }
}