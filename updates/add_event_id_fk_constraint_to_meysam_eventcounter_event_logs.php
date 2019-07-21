<?php namespace Meysam\EventCounter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddEventIdFKConstraintToMeysamEventcounterEventLogs extends Migration
{
    public function up()
    {
        Schema::table('meysam_eventcounter_event_logs', function ($table) {
            $table->foreign('event_id')->references('id')->on('meysam_eventcounter_events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('meysam_eventcounter_event_logs', function ($table) {
            $table->dropForeign(['event_id']);
        });
    }
}