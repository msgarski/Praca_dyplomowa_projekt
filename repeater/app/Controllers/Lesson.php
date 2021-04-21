<?php 

namespace App\Controllers;

class Lesson extends BaseController
{
    // private $lessonModel;

    // public function __construct()
    // {
    //     $this->lessonModel = service('courseModel');
    // }

    public function index()
    {
        return view('Lessons/newLesson_view');

    }

    public function create()
    {
        
    }

    
}