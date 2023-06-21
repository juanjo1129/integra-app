<?php

namespace App\Actions\Plan;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PlanActions
{
    public static function findPlanWithContactId(int $contactId): object|null
    {
        $plan = DB::table('contracts')
            ->join('planes_velocidad', 'planes_velocidad.id', '=', 'contracts.plan_id')
            ->where('contracts.client_id', $contactId)
            ->get();

        if ($plan->isEmpty()) {
            return null;
        }

        // Seleccionar el único ítem que debería salir de la colección.
        return $plan->first();
    }

    public static function findPlans(string $name = null): Collection
    {
        return DB::table('planes_velocidad')
            ->where('name', 'like', '%' . $name . '%')
            ->get();
    }
}
