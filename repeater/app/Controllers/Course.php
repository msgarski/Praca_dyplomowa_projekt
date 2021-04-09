<?php

namespace App\Controllers;

class Course extends BaseController
{

    public function newCourse()
    {
        return view('Course/new_view');
    }
}