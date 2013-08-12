Fuel LbPricingTable is a package for easily generate pricing table like that :

- http://vpictu.re/i/4hBq
- http://vpictu.re/i/4hBr

## Installation :

1. Clone or download the fuel-lbPricingTable repository
2. Move it in fuel/packages/
3. Add 'fuel-lbPricingTable' to the 'always_load.packages' array in app/config/config.php. (Or call `\Packages::load('fuel-lbPricingTable');` whenever you want to use it).
4. Open console for oil
5. Run 'refine migrate --packages=fuel-lbPricingTable' (it's for generate models in database)

## Usage :

Once your pricing table configured in the database or backend, you can generate it wherever in your code :

```php
        $pricingTable = \LbPricingTable\Pricingtable::find($id);

	// Load CSS and JS file from the theme for Asset        
        \LbPricingTable\Pricingtable::css($pricingTable) and \Asset::css(\LbPricingTable\Pricingtable::css($pricingTable), array(), 'layout', false);
        \LbPricingTable\Pricingtable::js($pricingTable) and \Asset::js(\LbPricingTable\Pricingtable::js($pricingTable), array(), 'js_bottom', false);
	
	// Render the pricing table
        echo \LbPricingTable\Pricingtable::render($pricingTable);
```

## Backend, Management :

You can easily implemente a CRUD management in your backend, i have make helper function for manage collection, in the package (classes/helper.php).

If you want, you can use or take example on my backend specially create for this package, it's a module called 'pricingtable' (link github)

Here some screen, it's based on Twitter bootstrap 3, and jQuery UI for the sortable function :

- http://vPictu.re/i/4hBt
- http://vPictu.re/i/4hBu


## Theme

This package use theme for generate a pricing table. A theme `Has many` Pricing Table, and a pricing table `Belongs to` a theme.

In the module pricingtable, 3 themes are already ready to use.

### Create theme

You want to create your own theme ? You can take example on 3 themes in the pricingtable module.

A theme require a view file, and if you want a js, css file.