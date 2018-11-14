<?php

namespace App\Widgets;

use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Categories extends BaseDimmer
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
        $count = \App\Category::count();
        $string = trans_choice('voyager::dimmer.category', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.category_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager::dimmer.category_link_text'),
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }
}
