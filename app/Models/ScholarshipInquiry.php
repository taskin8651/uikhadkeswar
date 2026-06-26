<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'parent_name',
        'mobile_number',
        'email',
        'course_interested',
        'current_class',
        'eligibility_category',
        'last_percentage',
        'message',
    ];
}
