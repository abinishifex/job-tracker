<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            [
                'company'      => 'Stripe',
                'role'         => 'Backend Engineer',
                'applied_at'   => '2026-07-15',
                'status'       => 'interview',
                'job_url'      => 'https://stripe.com/jobs',
                'salary_range' => '$140k - $180k',
                'notes'        => 'First round technical interview scheduled.',
            ],
            [
                'company'      => 'Vercel',
                'role'         => 'Full Stack Developer',
                'applied_at'   => '2026-07-20',
                'status'       => 'applied',
                'job_url'      => 'https://vercel.com/careers',
                'salary_range' => '$130k - $160k',
                'notes'        => 'Applied via referral.',
            ],
            [
                'company'      => 'Razorpay',
                'role'         => 'Software Engineer',
                'applied_at'   => '2026-07-10',
                'status'       => 'offer',
                'job_url'      => null,
                'salary_range' => '25 - 30 LPA',
                'notes'        => 'Received formal offer letter.',
            ],
            [
                'company'      => 'Freshworks',
                'role'         => 'Product Engineer',
                'applied_at'   => '2026-06-25',
                'status'       => 'rejected',
                'job_url'      => null,
                'salary_range' => '18 - 22 LPA',
                'notes'        => 'Position put on hold.',
            ],
            [
                'company'      => 'Zerodha',
                'role'         => 'Go/Python Developer',
                'applied_at'   => '2026-07-28',
                'status'       => 'applied',
                'job_url'      => null,
                'salary_range' => '20 - 25 LPA',
                'notes'        => 'Take-home assessment pending.',
            ],
        ];

        foreach ($applications as $application) {
            Application::create($application);
        }
    }
}
