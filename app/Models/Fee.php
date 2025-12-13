<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fee extends Model
{
    protected $fillable = [
        'student_id',
        'amount',
        'due_date',
        'paid',
        'paid_date',
        'description'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'due_date' => 'date',
        'paid_date' => 'date',
        'paid' => 'boolean'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}