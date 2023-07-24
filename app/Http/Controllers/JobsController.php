<?php

namespace App\Http\Controllers;

use App\Models\JobEntry;
use Inertia\Inertia;

class JobsController extends Controller
{
    public function index()
    {
        return Inertia::render('Jobs/Index', [
            'jobs' => JobEntry::all()->map(function ($jobEntry) {
                return [
                    'id' => $jobEntry->id,
                    'guid' => $jobEntry->guid,
                    'title' => $jobEntry->title,
                    'url' => $jobEntry->url,
                    'location' => $jobEntry->location,
                    'jobType' => $jobEntry->job_type,
                    'salary' => $jobEntry->salary,
                    'company' => $jobEntry->company,
                    'companyLogo' => $jobEntry->company_logo,
                    'tags' => $jobEntry->tags,
                    'publishedAt' => $jobEntry->published_at,
                    'category' => $jobEntry->category,
                    'description' => $jobEntry->description,
                ];
            }),
        ]);
    }
}
