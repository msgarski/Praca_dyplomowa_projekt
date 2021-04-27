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
                                'answer_sound',
                                'lesson_id'
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

    public function amountOfUserCards($userId)
    {
        return $this->select('*')
                    ->countAllResults();
    }

    public function amountOfLessonCards($lessonId)
    {
        return $this->where('lesson_id', $lessonId)
                    ->countAllResults();

    }







}