<?php

namespace App\Models;

class CourseTableModel extends \CodeIgniter\Model
{
    protected $table = 'course';

    protected $allowedFields = [
                            'name',
                            'description',
                            'genre_id',
                            'user_id',
                            'code'
                            ];

    // tutaj okreslam klasę odpowiedzialną za tworzenie obiektu user:
    protected $returnType = 'App\Entities\CourseEntity';

    protected $useTimestamps = true;

    protected $validationRules = [
    ];

    protected $validationMessages = [
    ];

    public function getAllCoursesByUserId($userId)
    {
        return $this->where('user_id', $userId)
                        ->findAll();
    }

    public function getCourseByCourseId($courseId)
    {
        return $this->where('id', $courseId)
                    ->first();
    }

    
}