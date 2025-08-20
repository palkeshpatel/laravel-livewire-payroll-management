<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'department_id',
        'position_id',
        'join_date',
        'contract_end_date',
        'employment_status',
        'basic_salary',
        'house_rent_allowance',
        'dearness_allowance',
        'transport_allowance',
        'medical_allowance',
        'other_allowances',
        'bank_name',
        'account_number',
        'ifsc_code',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'profile_photo',
        'id_proof',
        'resume',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'join_date' => 'date',
        'contract_end_date' => 'date',
        'basic_salary' => 'decimal:2',
        'house_rent_allowance' => 'decimal:2',
        'dearness_allowance' => 'decimal:2',
        'transport_allowance' => 'decimal:2',
        'medical_allowance' => 'decimal:2',
        'other_allowances' => 'decimal:2',
    ];

    /**
     * Get the department that owns the employee.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the position that owns the employee.
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Get the full name attribute.
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the full address attribute.
     */
    public function getFullAddressAttribute(): string
    {
        $address = [];
        
        if ($this->address) {
            $address[] = $this->address;
        }
        if ($this->city) {
            $address[] = $this->city;
        }
        if ($this->state) {
            $address[] = $this->state;
        }
        if ($this->postal_code) {
            $address[] = $this->postal_code;
        }
        if ($this->country) {
            $address[] = $this->country;
        }
        
        return implode(', ', $address);
    }

    /**
     * Get the total salary (basic + all allowances).
     */
    public function getTotalSalaryAttribute(): float
    {
        return $this->basic_salary +
               $this->house_rent_allowance +
               $this->dearness_allowance +
               $this->transport_allowance +
               $this->medical_allowance +
               $this->other_allowances;
    }

    /**
     * Get the formatted total salary.
     */
    public function getFormattedTotalSalaryAttribute(): string
    {
        return '₹' . number_format($this->total_salary, 2);
    }

    /**
     * Get the formatted basic salary.
     */
    public function getFormattedBasicSalaryAttribute(): string
    {
        return '₹' . number_format($this->basic_salary, 2);
    }

    /**
     * Scope a query to only include active employees.
     */
    public function scopeActive($query)
    {
        return $query->where('employment_status', 'active');
    }

    /**
     * Get the age of the employee.
     */
    public function getAgeAttribute(): int
    {
        return $this->date_of_birth->age;
    }

    /**
     * Get the years of service.
     */
    public function getYearsOfServiceAttribute(): int
    {
        return $this->join_date->diffInYears(now());
    }

    /**
     * Boot the model and generate employee ID.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            if (empty($employee->employee_id)) {
                $employee->employee_id = 'EMP' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
