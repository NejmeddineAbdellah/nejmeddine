<?php

namespace TCG\Voyager\Widgets;

use Illuminate\Support\Facades\Auth;
use App\Models\Projects;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class ProjectDimmer extends AbstractWidget
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
      
        $count = Projects::count();
        $string = trans_choice('voyager::dimmer.project', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-trophy',
            'title'  => "{$count} Projects",
            'text'   => __('You have '.$count.' Project in your DATABASE. Click the button below to view all Projects.
            ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => "Show all Project",
                'link' => route('voyager.projects.index'),
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
        return Auth::user()->can('browse', app(Projects::class));
    }
}
