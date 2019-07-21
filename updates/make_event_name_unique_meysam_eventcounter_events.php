<?php namespace Meysam\EventCounter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class MakeEventNameUniqueMeysamEventcounterEvents extends Migration
{
    public function up()
    {
        Schema::table('meysam_eventcounter_events', function ($table) {
            $table->unique('event_name');
        });
    }

    public function down()
    {
        Schema::table('meysam_eventcounter_events', function ($table) {
            $table->dropUnique('event_name');
        });
    }
}