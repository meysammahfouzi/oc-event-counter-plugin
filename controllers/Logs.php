<?php namespace Meysam\EventCounter\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Logs extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_events'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Meysam.EventCounter', 'event-counter', 'event-logs');
    }
}
