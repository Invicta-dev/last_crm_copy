<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\NotifyModel;

class NotifyController extends Controller
{
    protected $notifyModel;

    public function __construct()
    {

        helper('form', 'url');
        $this->notifyModel = new NotifyModel();
    }
}
