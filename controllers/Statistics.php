<?php namespace Meysam\EventCounter\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Support\Facades\DB;
use Meysam\EventCounter\Widgets\Chart;

class Statistics extends Controller
{
    public $implement = [    ];
    
    public function __construct()
    {
        parent::__construct();

        $this->pageTitle = 'Statistics';
        BackendMenu::setContext('Meysam.EventCounter', 'event-counter', 'statistics');

        $myWidget = new Chart($this);
        $myWidget->alias = 'chart';
        $myWidget->bindToController();
    }

    public function index()    // <=== Action method
    {
        $first_event = DB::table('meysam_eventcounter_events')->select('id', 'plugin_name', 'event_name')->first();
        $this->widget->chart->setEventId($first_event->id);
    }

    public function getEvents()
    {
        $result = array();
        $events = DB::table('meysam_eventcounter_events')->select('id', 'plugin_name', 'event_name')->get();

        foreach ($events as $event) {
            $result += [$event->id => (($event->plugin_name != '') ? ($event->plugin_name . '.') : '') . $event->event_name];
//            $result += [$event->id => $event->full_event_name]; //TODO: Why is full_event_name not recognized here?
        }

        return $result;
    }

    public function onSelectedEventChange()
    {
        $selected_event_id = input('event_id');
        $this->widget->chart->setEventId($selected_event_id);
    }
}
