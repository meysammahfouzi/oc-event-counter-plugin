<?php namespace Meysam\EventCounter\Models;

use Model;

/**
 * Model
 */
class Event extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'meysam_eventcounter_events';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'event_name' => 'required|unique:meysam_eventcounter_events|between:1,100'
    ];

    /* Relations */
    public $hasMany = [
        'logs' => ['Meysam\EventCounter\Models\EventLog', 'key' => 'event_id']
    ];

    /**
     * Defines a new imaginary field for this model called full_event_name like "acme.blog.create".
     * The value provided to this function is used to determine the value of 'plugin_name' and 'event_name'
     * fields of the model. The name of this field can be used in form field yaml files to accept a fully qualified
     * event name from users.
     * The provided name is split by last '.' character. The first part is then used as the 'plugin_name' and
     * the second part is used to fill the 'event_name' attribute of the model.
     *
     * @param string $value The fully qualified name of the event, like "acme.blog.create"
     */
    public function setFullEventNameAttribute($value)
    {
        $parts = explode('.', $value);
        $last = array_pop($parts);
        $parts = array(implode('.', $parts), $last);
        $plugin_name = $parts[0];
        $event_name = $parts[1];

        $this->attributes['plugin_name'] = $plugin_name;
        $this->attributes['event_name'] = $event_name;
    }

    public function getFullEventNameAttribute()
    {
        if ($this->exists) {
            return (($this->plugin_name != '') ? ($this->plugin_name . '.') : '') . $this->event_name;
        }
        return "";
    }
}
