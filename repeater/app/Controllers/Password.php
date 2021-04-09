<?php

namespace App\Controllers;

class Password extends BaseController
{
    public function forgot()
    {
        return view('Password/forgot_view');
    }

    public function checking()
    {
        $email = $this->request->getPost('email');
    }
}