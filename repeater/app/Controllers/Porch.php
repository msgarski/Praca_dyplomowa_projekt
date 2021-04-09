<?php 

namespace App\Controllers;

class Porch extends BaseController
{
    public function index()
    {

    }

    public function repeatShortly()
    {
        return view('Repeat/repetition_view');
    }

    public function tasks()
    {
        return view('Tryouts/main_view');
    }

    public function getInto()
    {
        return view('Main/main_view');
    }
}