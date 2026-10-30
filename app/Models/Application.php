<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'company',
    'role',
    'applied_at',
    'status',
    'job_url',
    'salary_range',
    'notes',
])]
class Application extends Model
{
    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'applied_at' => 'date',
        ];
    }

    /**
     * Return Tailwind CSS utility classes based on the application status.
     */
    public function statusColor(): string
    {
        return match ($this->status) {
            'applied'   => 'bg-blue-100 text-blue-700 border-blue-200',
            'interview' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'offer'     => 'bg-green-100 text-green-700 border-green-200',
            'rejected'  => 'bg-red-100 text-red-700 border-red-200',
            default     => 'bg-gray-100 text-gray-700 border-gray-200',
        };
    }
}
