<?php

namespace App\Controllers;

use App\Libraries\MassCardInput;


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
            $placeholder = "pytanie odpowiedź [wymowa] [zdanie przykładowe] \n pytanie odpowiedź [wymowa] [zdanie przykładowe]";

            $userId = session()->get('user_id');

            $data = [
                'user_id' => $userId,
                'lesson_id' => $lessonId,
                'before' => 0,
                'recent' => $this->model->amountOfCards()       //! to do zmiany, karty usera!
            ];
        
            if($amount ==1)                                     // single input option
            {
                return view('Input/singleInput_view', $data);
            }
            else                                                // mass input option
            {
                $data['placeholder'] = $placeholder;

                //dd($data);

                return view('Input/massInput_view', $data);
            }
        
        }
        // todo : else wyrzuć błąd braku zalogowania
    }

    public function createCard()
    {
                                                                // array $card zawiera lesson_id 
        $card = $this->request->getPost();                      // z ukrytego pola formularza:

        $data = [
            'before' => $this->model->amountOfCards(),
            'lesson_id' => $card['lesson_id']
            ];

        if ($this->model->insert($card)) 
        {
            $data['recent'] = $this->model->amountOfCards();
            
            return view('Input/singleInput_view', $data);            
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
        $mass = new MassCardInput;                              // create instance of massCardsInput class

        $lesson_id = $this->request->getVar('lesson_id');

        $cardsAsString = $this->request->getVar('cardsInput'); // pobranie zawartości pola textarea formularza
        
        $score = $mass->cardsInputFormatting($cardsAsString);

        $mass->createCards($score, $lesson_id);
    }
}