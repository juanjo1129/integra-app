<?php

namespace App\Actions\Company;

use Illuminate\Support\Facades\DB;

class CompanyActions
{
    public const DEFAULT_COMPANY_ID = 1;

    public static function findCompany(int $companyId): Object | null
    {
        $company = DB::table('empresas')->find($companyId);
        return $company;
    }
}
