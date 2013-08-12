<?php

namespace LbPricingTable\Model;

class Pricingtable_Attribute_Title extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'title' => array(
            'label' => 'pricingtable_model_attribute_title.title',
            'default' => 0,
            'null' => false,
            'validation' => array('required'),
        ),
        'position' => array(
            'default' => 0,
            'null' => false,
            'form' => array('type' => false),
        ),
        'created_at' => array(
            'default' => 0,
            'null' => false,
            'form' => array('type' => false),
        ),
        'updated_at' => array(
            'default' => 0,
            'null' => false,
            'form' => array('type' => false),
        ),
        'id_pricingtable',
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
    protected static $_table_name = 'pricingtable_attribute_title';

}
