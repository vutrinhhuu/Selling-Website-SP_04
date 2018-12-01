<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Products extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Product::count();
        $string = trans_choice('Product|Products', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bag',
            'title'  => "{$count} {$string}",
            'text'   => __('You have :count :string in your database. Click on button below to view all products.', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('View all products'),
                'link' => route('voyager.products.index'),
            ],
            'image' => 'images/dashboard/product-bg.jpg',
        ]));
    }
}
