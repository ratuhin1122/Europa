<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model

{
    use HasFactory;
    protected $table = 'job_listings';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'tags',
        'job_type',
        'remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zipcode',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_logo',
        'company_website',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bookmarkedByUsers() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }

    public function applicants() : HasMany
    {
        return $this->hasMany(Applicant::class);
    }
}
