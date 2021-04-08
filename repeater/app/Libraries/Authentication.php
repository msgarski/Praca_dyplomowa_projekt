<?php

namespace App\Libraries;

class Authentication
{
    public function loginAuthentication($email, $password)
    {
        $model = service('userModel');
        //$model = new \App\Models\UsersTableModel;
        $user = $model->where('email', $email)
                    ->first();
        //dd($user);
        
        if($user === null)
        {
            return false;
        }

        if( ! password_verify($password, $user->password_hashed))
        {
            return false;
        }

        if( ! $user->is_active)
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

        $model = service('userModel');

        return $model->find(session()->get('user_id'));
    }

    public function logout()
    {
        session()->destroy();
    }
    
}