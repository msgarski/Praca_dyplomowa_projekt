<?php

namespace App\Libraries;

class Authentication
{
    public function loginAuthentication($email, $password)
    {
        $model = new \App\Models\UsersTableModel;

        $user = $model->where('email', $email)
                    ->first();

        if($user === null)
        {
            return false;
        }

        if( ! password_verify($password, $user->password_hashed))
        {
            return false;
        }

        $session = session();
        $session->regenerate();
        $session->set('user_id', $user->id);

        return true;
    }

    public function getCurrentUser()
    {
        if(!session()->has('user_id'))
        {
            return null;
        }

        $model = new \App\Models\UsersTableModel;

        return $model->find(session()->get('user_id'));
    }

    public function logout()
    {
        session()->destroy();
    }
    
}