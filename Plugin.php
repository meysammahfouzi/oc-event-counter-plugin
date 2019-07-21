<?php namespace Meysam\EventCounter;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        if (Schema::hasTable('meysam_eventcounter_events')) {
            $events = DB::table('meysam_eventcounter_events')->select('id', 'plugin_name', 'event_name')->get();

            // Listen to events and log them as they happen
            foreach ($events as $event) {
                // TODO: Why is $event->full_plugin_name not recognized here?
                $full_plugin_name = $event->plugin_name . '.' . $event->event_name;
                Event::listen($full_plugin_name, function () use ($event) {
                    Db::table('meysam_eventcounter_event_logs')->insert(
                        [
                            'event_id' => $event->id,
                            'date' => Carbon::now()->format("Y/m/d"),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    );
                });
            }
        }
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
