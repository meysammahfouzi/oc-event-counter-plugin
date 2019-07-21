<?php namespace Meysam\EventCounter\Models;

use Model;

/**
 * Model
 */
class EventLog extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'meysam_eventcounter_event_logs';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /* Relations */
    public $belongsTo = [
        'event' => 'Meysam\EventCounter\Models\Event'
    ];
}
