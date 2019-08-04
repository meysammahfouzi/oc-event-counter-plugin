<?php namespace Meysam\EventCounter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMeysamEventcounterEvents extends Migration
{
    public function up()
    {
        Schema::create('meysam_eventcounter_events', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('plugin_name', 100);
            $table->string('event_name', 100);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meysam_eventcounter_events');
    }
}
