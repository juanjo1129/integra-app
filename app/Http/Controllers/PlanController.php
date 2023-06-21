<?php

namespace App\Http\Controllers;

use App\Actions\Plan\PlanActions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(): Response
    {
        $contactId = Auth::user()->contact_id;

        return Inertia::render('Plan/Index', [
            'plan' => PlanActions::findPlanWithContactId($contactId),
        ]);
    }

    public function findPlans(Request $request): Collection
    {
        return PlanActions::findPlans($request->query('planName'));
    }
}
