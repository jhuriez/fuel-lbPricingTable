<?php

namespace LbPricingTable;

class Pricingtable
{

    public static function render($pricingTable)
    {
        $data['pricingtable'] = $pricingTable;
        $file = $pricingTable->theme->file;

        $view = \View::forge($file, $data)->render();
        return $view;
    }

    public static function render_uri($uri)
    {
        if ($named_uri = \Router::get($uri)) {
            $uri = $named_uri;
        }

        return \Uri::create($uri);
    }

    /**
     * 
     * Find the Pricing Table for re-organize attributes value and title with key increment
     * 
     * @param int $id
     * @return object
     */
    public static function find($id)
    {
        $pricingTable = \LbPricingTable\Model\Pricingtable::find($id);
        $nbMaxAttributes = 0;

        // Attributes title
        $attributesTitle = array();
        foreach ($pricingTable->attributes_title as $title) {
            $attributesTitle[$title->position] = $title;
        }
        $pricingTable->attributes_title = $attributesTitle;

        foreach ($pricingTable->prices as $price) {
            // Max attributes
            $nbMaxAttributes = (count($price->attributes_value) > $nbMaxAttributes) ? count($price->attributes_value) : $nbMaxAttributes;

            // Attributes value
            $attributesValue = array();
            foreach ($price->attributes_value as $attribute) {
                $attributesValue[$attribute->position] = $attribute;
            }
            $price->attributes_value = $attributesValue;
        }

        $pricingTable->nb_max_attribute = $nbMaxAttributes;
        $pricingTable->freeze();
        return $pricingTable;
    }

    public static function css($pricingTable)
    {
        // Assets
        if (\Asset::find_file($pricingTable->theme->css_file, 'css')) {
            return $pricingTable->theme->css_file;
        } else {
            return false;
        }
    }

    public static function js($pricingTable)
    {
        // Assets
        if (\Asset::find_file($pricingTable->theme->js_file, 'js')) {
            return $pricingTable->theme->js_file;
        } else {
            return false;
        }
    }

}
