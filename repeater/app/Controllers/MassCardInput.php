<?php

namespace App\Controllers;

class MassCardInput extends BaseController
{
    public function index()
    {
        return view('Input/massInput_view');
    }

    public function reachCards()
    {
        $cardsAsString = $this->request->getPost('cardsInput');
        
        $score = $this->cardsInputFormatting($cardsAsString);

        $this->createCards($score);

        //dd($score);
    }

    public function createCards($score)
    {
        $model = service('cardModel');

        array_pop($score);

        dd($score);

        if ($model->insertBatch($score)) {

            //$this->sendActivationEmail($user);
        
            return redirect()->to("/masscardinput/success");
            
        } 
        else 
        {
            return redirect()->back()
                             ->with('errors', $model->errors())
                             ->with('warning', 'Nieprawidłowe dane')
                             ->withInput();
        }
    }

    public function success()
    {
        return " udało się zapisać do tabeli";
    }

    public function cardsInputFormatting($cardsAsString)
    {
        /*
        * function, which is used for transferring card's data from html form, to row table.
        * by now: for multiple input way
        *
        * In future: In both: single and multiple input manner
        *
        */

        //! delimitery docelowo zalezne od wprowadzonej wartości w formularzu
        $lineDelimiter = "\n";

        $colsDelimiter = "\t";

        //! tu będę wpisywał nazwy kolejnych pól do wprowadzenia do tabeli:
        $parts = ['question', 'answer', 'pronounciation', 'sentence'];

        $score = [];
        
        $k = 0;

        $rows = explode($lineDelimiter, $cardsAsString);

        foreach($rows as $row)
        {
            $words = explode($colsDelimiter, $row);

            $word = [];

            //! możzna by jeszcze sprawdzać, czy nie ma " "...
            
            for($i=0; $i<sizeof($words); $i+=1)
            {
                $word[$parts[$i]] =  $words[$i];
            }
            array_push($score, $word);
        
            $k += 1;
        }
        return $score;
    }
}
