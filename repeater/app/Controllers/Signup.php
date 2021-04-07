<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function newUser()
    {
        // trzeba przechwycić formularz...
        return view("Signup/new_user");
    }

    public function create()
    {
        $user = new \App\Entities\UserEntity($this->request->getPost());

        $model = new \App\Models\UsersTableModel;

        if ($model->insert($user)) {
        
            return redirect()->to("/signup/success");
            
        } else {
            
            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', 'Nieprawidłowe dane')
                             ->withInput();
        }
    }

    public function success()
    {
		return view('Signup/success');
    }
}