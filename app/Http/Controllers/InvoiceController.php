<?php

namespace App\Http\Controllers;

use App\Actions\Client\ClientActions;
use App\Actions\Company\CompanyActions;
use App\Actions\Invoice\InvoiceActions;
use App\Actions\Plan\PlanActions;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceController extends Controller
{
    public function index(): Response
    {
        $contactId = Auth::user()->contact_id;

        return Inertia::render('Invoice/Manage', [
            'plan' => PlanActions::findPlanWithContactId($contactId),
            'client' => ClientActions::findClient($contactId),
            'company' => CompanyActions::findCompany(CompanyActions::DEFAULT_COMPANY_ID),
            'invoice' => InvoiceActions::findInvoiceByClientId($contactId),
        ]);
    }
}
