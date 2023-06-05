<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PlanController extends Controller
{
    function index(): Response {
        return Inertia::render('Plan/Index');
    }
}
