<?php

namespace App\Libraries;

class Authentication
{
    public function loginAuthentication($email, $password = null)
    {
        $model = service('userModel');

        $user = $model->where('email', $email)
                    ->first();
        
        if(($user === null)||( !$user->is_active))
        {
            return false;
        }

        if($password !== null)
        {
            if( ! password_verify($password, $user->password_hashed))
            {
                return false;
            }

            // ustanowienie sesji:
            $session = session();
            $session->regenerate();
            // ustawienie zmiennej sesyjnej 'user_id', żeby było łatwiej później do niej sięgać
            $session->set('user_id', $user->id);
        }

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