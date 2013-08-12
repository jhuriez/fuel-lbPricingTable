<?php

namespace LbPricingTable\Model;

class Pricingtable extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'title' => array(
            'label' => 'pricingtable_model_pricingtable.title',
            'default' => 'My pricing table',
            'null' => false,
            'validation' => array('required'),
        ),
        'created_at' => array(
            'form' => array('type' => false),
            'default' => 0,
            'null' => false,
        ),
        'updated_at' => array(
            'form' => array('type' => false),
            'default' => 0,
            'null' => false,
        ),
        'id_pricingtable_theme' => array(
            'label' => 'pricingtable_model_pricingtable.theme',
            'default' => '',
            'null' => false,
            'form' => array('type' => 'select'),
        ),
    );
    protected static $_conditions = array(
        'order_by' => array('title' => 'asc'),
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
    protected static $_table_name = 'pricingtable';
    protected static $_has_many = array(
        'attributes_title' => array(
            'key_from' => 'id',
            'model_to' => 'LbPricingTable\Model\Pricingtable_Attribute_Title',
            'key_to' => 'id_pricingtable',
            'cascade_save' => true,
            'cascade_delete' => true,
        ),
        'prices' => array(
            'key_from' => 'id',
            'model_to' => 'LbPricingTable\Model\Pricingtable_Price',
            'key_to' => 'id_pricingtable',
            'cascade_save' => true,
            'cascade_delete' => true,
        ),
    );
    protected static $_belongs_to = array(
        'theme' => array(
            'key_from' => 'id_pricingtable_theme',
            'model_to' => 'LbPricingTable\Model\Pricingtable_Theme',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
    );

    /**
     * init the class
     */
    public static function _init()
    {
        // model language file

        \Lang::load('pricingtable_model_pricingtable', true);
    }

    public static function set_form_fields($form, $instance = null)
    {
        // add themes options
        $result = \DB::select('id', 'name')->from(\LbPricingTable\Model\Pricingtable_Theme::table())->execute()->as_array('id', 'name');

        static::$_properties['id_pricingtable_theme']['form']['options'] = $result;
        static::$_properties['id_pricingtable_theme']['options'] = $result;

        parent::set_form_fields($form, $instance);
    }

}
