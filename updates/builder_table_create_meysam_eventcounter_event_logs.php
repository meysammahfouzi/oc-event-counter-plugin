<?php namespace Meysam\EventCounter\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMeysamEventcounterEventLogs extends Migration
{
    public function up()
    {
        Schema::create('meysam_eventcounter_event_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('meysam_eventcounter_event_logs');
    }
}