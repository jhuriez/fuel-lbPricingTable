<?php

namespace LbPricingTable\Model;

class Pricingtable_Price extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'title' => array(
            'label' => 'pricingtable_model_price.title',
            'default' => '',
            'null' => false,
            'validation' => array('required'),
        ),
        'is_new' => array(
            'label' => 'pricingtable_model_price.is_new',
            'default' => false,
            'null' => false,
            'form' => array('type' => 'checkbox', 'value' => '1'),
        ),
        'is_popular' => array(
            'label' => 'pricingtable_model_price.is_popular',
            'default' => false,
            'null' => false,
            'form' => array('type' => 'checkbox', 'value' => '1'),
        ),
        'view_counter' => array(
            'default' => 0,
            'form' => array('type' => false),
        ),
        'price' => array(
            'label' => 'pricingtable_model_price.price',
            'default' => 0,
            'null' => false,
            'validation' => array('required'),
        ),
        'price_text' => array(
            'label' => 'pricingtable_model_price.price_text',
            'default' => ' / per month',
        ),
        'price_small_text' => array(
            'label' => 'pricingtable_model_price.price_small_text',
            'default' => '',
        ),
        'currency' => array(
            'label' => 'pricingtable_model_price.currency',
            'default' => '€',
            'null' => false,
            'form' => array('type' => 'select'),
        ),
        'button_action_text' => array(
            'label' => 'pricingtable_model_price.button_action_text',
            'default' => 'SIGN UP',
            'null' => false,
            'validation' => array('required'),
        ),
        'button_action_url' => array(
            'label' => 'pricingtable_model_price.button_action_url',
            'default' => '',
            'null' => false,
        ),
        'small_text' => array(
            'label' => 'pricingtable_model_price.small_text',
            'default' => '',
            'null' => false,
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
        'id_pricingtable'
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
    protected static $_table_name = 'pricingtable_price';
    protected static $_has_many = array(
        'attributes_value' => array(
            'key_from' => 'id',
            'model_to' => 'LbPricingTable\Model\Pricingtable_Attribute_Value',
            'key_to' => 'id_pricingtable_price',
            'cascade_save' => true,
            'cascade_delete' => true,
        ),
    );
    protected static $_belongs_to = array(
        'pricingtable' => array(
            'key_from' => 'id_pricingtable',
            'model_to' => 'LbPricingTable\Model\Pricingtable',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
    );
    protected static $_conditions = array(
        'order_by' => array('position' => 'asc'),
    );

    /**
     * init the class
     */
    public static function _init()
    {
        // model language file
        \Lang::load('pricingtable_model_price', true);

        // add currency options
        static::$_properties['currency']['form']['options'] = \Config::get('lbpricingtable.currency');
        static::$_properties['currency']['options'] = \Config::get('lbpricingtable.currency');
    }

}
