<?php namespace Meysam\EventCounter\Widgets;

use Backend\Classes\WidgetBase;
use Illuminate\Support\Facades\DB;

class Chart extends WidgetBase
{
    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'chart';

    protected $eventId;

    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    public function render()
    {
        return $this->makePartial('chart');
    }

    /**
     * Returns timestamp and count in an array.
     * @return string Sample output: "[1477857082000, 400], [1477943482000, 380], [1478029882000, 340],
     * [1478116282000, 540], [1478202682000, 440], [1478289082000, 360], [1478375482000, 220]"
     */
    public function getChartData()
    {
        $logs = Db::table('meysam_eventcounter_event_logs')
            ->select('date', DB::raw('count(*) as total'))
            ->where('event_id', '=', $this->eventId)
            ->groupBy('date')->limit(100)->get();
        $result = "";
        foreach ($logs as $log) {
            $result .= "[" . strtotime($log->date) * 1000 . ", " . $log->total . "], ";
        }
        return rtrim($result, ", ");  // remove the last comma
    }
}