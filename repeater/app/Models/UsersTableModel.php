<?php

namespace App\Models;

class UsersTableModel extends \CodeIgniter\Model
{
    protected $table = 'user';

    protected $allowedFields = ['name', 'email', 'password'];

    protected $returnType = 'App\Entities\UserEntity';

    protected $useTimestamps = true;

    protected $validationRules = [
        'name'                  =>  'required',
        'email'                 =>  'required|valid_email|is_unique[user.email]',
        'password'              =>  'required|min_length[6]',
        'password_confirmation' =>  'required|matches[password]'
    ];

    protected $validationMessages = [
        'name'  => [
                    'required'      => 'Imię jest wymagane'
        ],
        'email' => [
                    'required'      => 'Adres e-mail jest wymagany',
                    'is_unique'     => 'Istnieje już konto dla podanego adresu',
                    'valid_email'   => 'Nieprawidłlowy format adresu email'
        ],
        'password' => [
                    'required'      => 'Wymagane jest podanie hasła',
                    'min_length[6]' => 'Hasło powinno mieć długość min 6 znaków'
        ],
        'password_confirmation'     => [
                    'required'      => 'Potwierdź hasło',
                    'matches'       => 'Wprowadzone hasła nie są identyczne',
                    'min_length[6]' => 'Długość hasło to min 6 znaków'
        ]
    ];

    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if(isset($data['data']['password']))
        {
            $data['data']['password_hashed'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
        }

        return $data;
    }
}