<?php

namespace App\Models;

//use App\Libraries\Token;


class CardTableModel extends \CodeIgniter\Model
{
    protected $table = 'card';

    protected $allowedFields = ['question',
                                'answer',
                                'sentence',
                                'image',
                                'answer_sound'
                            ];

    // tutaj okreslam klasę odpowiedzialną za tworzenie obiektu user:
    protected $returnType = 'App\Entities\CardEntity';

    protected $useTimestamps = true;

    //protected $validationRules = [];

    protected $validationMessages = [];

    public function amountOfCards()
    {
        return $this->select('*')
                    ->countAllResults();
    }







}