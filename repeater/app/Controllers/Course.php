<?php

namespace App\Controllers;

class Course extends BaseController
{

    public function newCourse()
    {
        return view('Course/new_view');
    }

    public function createCourse()
    {
        $model = service('courseModel');

        $user_id = session()->get('user_id');

        $course = $this->request->getPost();

        $course += ['user_id' => $user_id];

        if ($model->insert($course)) 
        {            
            return view('Main/main_view');            
        } 
        else 
        {
            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', 'Nieprawidłowe dane')
                             ->withInput();
        }
    }
}