<?php

namespace App\Http\Controllers;

use App\Actions\Plan\PlanActions;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class PlanController extends Controller
{
    public function index(): Response
    {
        $contactId = Auth::user()->contact_id;

        return Inertia::render('Plan/Manage', [
            'plan' => PlanActions::findPlanWithContactId($contactId),
        ]);
    }
}
