<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'head_id',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Get the employees for this department.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Get the department head.
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(User::class, 'head_id');
    }

    /**
     * Get the full name attribute.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    /**
     * Scope a query to only include active departments.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the employee count for this department.
     */
    public function getEmployeeCountAttribute(): int
    {
        return $this->employees()->count();
    }
}
