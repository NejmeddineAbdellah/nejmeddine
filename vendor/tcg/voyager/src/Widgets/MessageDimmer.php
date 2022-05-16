<?php

namespace TCG\Voyager\Widgets;

use App\Models\Maillings;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class MessageDimmer extends AbstractWidget
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
      
        $count = Maillings::count();
        $string = trans_choice('voyager::dimmer.mailling', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-mail',
            'title'  => "{$count} Email",
            'text'   => __('You have '.$count.' Emails in your DATABASE. Click the button below to view all Emails.
            ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => "Show all Email",
                'link' => route('voyager.maillings.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Maillings::class));    }
}
