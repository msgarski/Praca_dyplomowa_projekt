<?php

namespace App\Controllers;


class SingleCardInput extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = service('cardModel');
    }

    public function index()
    {
        $data = [
            'before' => 0,
            'recent' => $this->model->amountOfCards()
            ];

        return view('Input/singleInput_view', $data);

    }

    public function createCard()
    {
        $card = $this->request->getPost();

        $data = ['before' => $this->model->amountOfCards()];

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
}