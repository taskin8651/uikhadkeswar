<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'parent_name',
        'mobile_number',
        'email',
        'course_interested',
        'student_class',
        'fee_concession',
        'message',
        'source',
    ];
}
