<?php

namespace LbPricingTable\Model;

class Pricingtable_Attribute_Value extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'title',
        'position',
        'tooltip_info',
        'created_at',
        'updated_at',
        'id_pricingtable_price'
    );
    protected static $_conditions = array(
        'order_by' => array('position' => 'asc'),
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );
    protected static $_table_name = 'pricingtable_attribute_value';

}
