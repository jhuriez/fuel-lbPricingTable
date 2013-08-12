<?php

/**
 * LbPricingTable : Manage and show pricing table
 *
 * @package    LbPricingTable
 * @version    v1.00
 * @author     Julien Huriez
 * @license    MIT License
 * @copyright  2013 Julien Huriez
 * @link   https://github.com/jhuriez/fuel-lbPricingTable
 */
Autoloader::add_core_namespace('LbPricingTable');

Autoloader::add_classes(array(
    'LbPricingTable\\Pricingtable' => __DIR__ . '/classes/pricingtable.php',
    'LbPricingTable\\Helper' => __DIR__ . '/classes/helper.php',
    'LbPricingTable\\Model\\Pricingtable' => __DIR__ . '/classes/model/pricingtable.php',
    'LbPricingTable\\Model\\Pricingtable_Price' => __DIR__ . '/classes/model/pricingtable/price.php',
    'LbPricingTable\\Model\\Pricingtable_Theme' => __DIR__ . '/classes/model/pricingtable/theme.php',
    'LbPricingTable\\Model\\Pricingtable_Attribute_Title' => __DIR__ . '/classes/model/pricingtable/attribute/title.php',
    'LbPricingTable\\Model\\Pricingtable_Attribute_Value' => __DIR__ . '/classes/model/pricingtable/attribute/value.php',
));

// Load config
\Config::load('lbpricingtable', true);

/* End of file bootstrap.php */