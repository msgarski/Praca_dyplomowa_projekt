<?php

namespace App\Libraries;

class Queries
{
    public function userCardsEntireInfo($userId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('card');

        $builder->select('*')
                ->join('lesson', 'lesson.id = lesson_id')
                ->join('course', 'course.id = lesson.course_id')
                ->join('user', 'user.id = course.user_id')
                ->where('user.id', $userId);

        $query = $builder->get();
        return $query->getResult();
    }

    public function amountOfUserCards($userId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('card');

        $builder->select('question')
                ->join('lesson', 'lesson.id = lesson_id')
                ->join('course', 'course.id = lesson.course_id')
                ->join('user', 'user.id = course.user_id')
                ->where('user.id', $userId);

        //$query = $builder->get();
        return $builder->countAllResults();
    }









    public function checkFunction($userId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('card');

        $builder->select('question')
                ->join('lesson', 'lesson.id = lesson_id')
                ->where('lesson.id', '2');

        return $builder->get();
    }
}