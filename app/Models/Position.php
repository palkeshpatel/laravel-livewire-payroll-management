<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'salary_grade',
        'min_salary',
        'max_salary',
        'status',
    ];

    protected $casts = [
        'min_salary' => 'decimal:2',
        'max_salary' => 'decimal:2',
        'status' => 'string',
    ];

    /**
     * Get the employees for this position.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Get the full name attribute.
     */
    public function getFullNameAttribute(): string
    {
        return $this->title;
    }

    /**
     * Scope a query to only include active positions.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the employee count for this position.
     */
    public function getEmployeeCountAttribute(): int
    {
        return $this->employees()->count();
    }

    /**
     * Get the salary range as a formatted string.
     */
    public function getSalaryRangeAttribute(): string
    {
        if ($this->min_salary && $this->max_salary) {
            return '₹' . number_format($this->min_salary) . ' - ₹' . number_format($this->max_salary);
        } elseif ($this->min_salary) {
            return '₹' . number_format($this->min_salary) . '+';
        } elseif ($this->max_salary) {
            return 'Up to ₹' . number_format($this->max_salary);
        }
        
        return 'Not specified';
    }
}
