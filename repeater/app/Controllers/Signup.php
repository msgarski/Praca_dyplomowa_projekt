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
        echo "po zatwierdzeniu danych formularza nowego usera";
    }
}