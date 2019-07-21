<?php namespace Meysam\EventCounter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMeysamEventcounterEventLogs extends Migration
{
    public function up()
    {
        Schema::table('meysam_eventcounter_event_logs', function ($table) {
            $table->date('date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('meysam_eventcounter_event_logs', function ($table) {
            $table->dropColumn('date');
        });
    }
}
