<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    protected $fillable = [
        'full_name',
        'job_id',
        'user_id',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path',
    ];

    public function job() :BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
