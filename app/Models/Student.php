<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'age',
        'phone',
        'address',
        'date_of_birth',
        'admission_date',
        'gender',
        'blood_group',
        'teacher_id',
        'class_id',
        'user_id'
    ];

    protected $casts = [
        'age' => 'integer',
        'date_of_birth' => 'date',
        'admission_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\ParentModel', 'student_parent');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
}
