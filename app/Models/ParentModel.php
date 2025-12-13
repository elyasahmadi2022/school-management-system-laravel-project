<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ParentModel extends Model
{
    protected $table = 'parents';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'occupation'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_parent');
    }
}
