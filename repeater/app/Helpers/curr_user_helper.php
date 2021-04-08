<?php

if(!function_exists('current_user'))
{
    function current_user()
    {
        $authentic = new \App\Libraries\Authentication;

        return $authentic->getCurrentUser();

        
    }
}