<?php 

namespace App\Entities;

class UserEntity extends \CodeIgniter\Entity
{
    public function activationByCode()
    {
        $this->token = bin2hex(random_bytes(16));

        $this->activation_hash = hash_hmac('sha256', $this->token, $_ENV['HASH_SECRET_KEY']);
    }

    public function activateUser()
    {
        $this->is_active = true;
        // ! tu się wykrzacza: po odkomentowaniu, gryzie się z rekordami
        // ! które mają wartość null w polu activation_hash
        //$this->activation_hash = null;
    }
}