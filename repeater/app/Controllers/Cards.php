<?php

namespace App\Controllers;

use App\Libraries\MassCardInput;

use App\Libraries\Queries;


class Cards extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = service('cardModel');
    }

    public function index($lessonId, $amount)
    {
        if(session()->has('user_id'))
        {
            $placeholder = "pytanie odpowiedź [wymowa] [zdanie przykładowe] \n";

            $userId = session()->get('user_id');

            //! próbne zapytania:
            $qrs = new Queries;
            // d($qrs->amountOfUserCards($userId));
            // dd($qrs->userCardsEntireInfo($userId));
            // dd($qrs->checkFunction($userId));
            
            //! koniec próbnych zapytań
            
            $data = [
                'user_id' => $userId,
                'lesson_id' => $lessonId,
                'before' => 0,
                'recent' => $qrs->amountOfUserCards($userId)
            ];

            if($amount == 1)                                     // single input option
            {
                return view('Input/singleInput_view', $data);
            }
            else                                                // mass input option
            {
                $data['placeholder'] = $placeholder.$placeholder.$placeholder;

                return view('Input/massInput_view', $data);
            }
        
        }
        // todo : else wyrzuć błąd braku zalogowania
    }

    public function createCard()
    {
        /*
        *   this method gets new card data from form and
        *   save them as new record in cardTable
        */
         
        $card = [
            'question' => 'gowno',
            'answer' => '',
            'pronounciation' => '',
            'sentence' => '',
            'image' => null,
            'lesson_id' => '6'
        ];

        $card['question'] = $this->request->getVar('question');
        $card['answer'] = $this->request->getVar('answer');
        $card['pronounciation'] = $this->request->getVar('pronounciation');
        $card['sentence'] = $this->request->getVar('sentence');
        //!$card['image'] = $this->request->getVar('image');
        //$card['lesson_id'] = (int)$this->request->getVar('lesson_id');

        
        var_dump($card['lesson_id']);
        //exit; 
        $data = [
            'before' => $this->model->amountOfCards(), //! jak to przekazać do widoku?
            'lesson_id' => $card['lesson_id']
            ];

        if ($this->model->insert($card)) 
        {
            $data['recent'] = $this->model->amountOfCards();
            
            //return view('Input/singleInput_view', $data);            
        } 
        else 
        {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Nieprawidłowe dane')
                             ->withInput();
        }
    }

    public function createManyCards()
    {
        /*
        *   method gets data of multiple cards from textarea
        *   and save them in cardTable
        */

        $mass = new MassCardInput;                              // create instance of massCardsInput class

        $lesson_id = $this->request->getVar('lesson_id');

        $cardsAsString = $this->request->getVar('cardsInput'); // pobranie zawartości pola textarea formularza
        
        $score = $mass->cardsInputFormatting($cardsAsString);

        $mass->createCards($score, $lesson_id);
    }
}