<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class JobsController extends Controller
{
    public function index()
    {
        return Inertia::render('Jobs/Index');
    }
}
