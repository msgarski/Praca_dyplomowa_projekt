<?php 

namespace App\Controllers;

use App\Controllers\Porch;
class Lesson extends BaseController
{
    private $lessonModel;

    public function __construct()
    {
        $this->lessonModel = service('lessonModel');
    }

    public function index()
    {// ! funkcja na razie niepotrzebna...
        //return view('Lessons/newLesson_view');
    }

    public function toNewLessonForm($courseId)
    {
        return view('Lessons/newLesson_view', ['courseId' => $courseId]);
    }

    public function create()
    {
        // $lesson posiada też course_id dla tabeli lesson
        $lesson = $this->request->getPost();

        if ($this->lessonModel->insert($lesson)) 
        {          
            // tu trzeba wywołać metodę z innego kontrolera
            // bo muszę wrócić do widoku okna głównego z kursami      
            //$porch = new Porch();

            return $porch->getInto();
        } 
        else 
        {
            return redirect()->back()
                             ->with('errors', $this->lessonModel->errors())
                             ->with('warning', 'Nieprawidłowe dane')
                             ->withInput();
        }
        
    }

    
}