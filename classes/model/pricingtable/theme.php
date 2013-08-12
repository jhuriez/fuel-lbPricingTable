<?php

namespace LbPricingTable\Model;

class Pricingtable_Theme extends \Orm\Model
{

    protected static $_properties = array(
        'id',
        'name' => array(
            'label' => 'pricingtable_model_theme.name',
            'default' => 'My template',
            'null' => false,
            'validation' => array('required'),
        ),
        'file' => array(
            'label' => 'pricingtable_model_theme.file',
            'default' => '',
            'null' => false,
            'validation' => array('required'),
        ),
        'css_file' => array(
            'label' => 'pricingtable_model_theme.css_file',
            'default' => '',
        ),
        'js_file' => array(
            'label' => 'pricingtable_model_theme.js_file',
            'default' => '',
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
    protected static $_table_name = 'pricingtable_theme';

    /**
     * init the class
     */
    public static function _init()
    {
        // model language file
        \Lang::load('pricingtable_model_theme', true);
    }

}
