<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Orders extends BaseDimmer
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
        $string = trans_choice('Order|Orders', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-buy',
            'title'  => "{$count} {$string}",
            'text'   => __('You have :count :string in your database. Click on button below to view all orders.', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('View all orders'),
                'link' => route('voyager.orders.index'),
            ],
            'image' => 'images/dashboard/order-bg.jpeg',
        ]));
    }
}
