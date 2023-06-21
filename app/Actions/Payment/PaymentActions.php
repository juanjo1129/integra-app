<?php

namespace App\Actions\Payment;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PaymentActions
{
    public static function findAllPaymentOptions(): Collection|null
    {
        $options = DB::table('integracion')
            ->where('tipo', 'PASARELA')
            ->where('status', 1)
            ->where('app', 1)
            ->get();

        return $options;
    }
}
