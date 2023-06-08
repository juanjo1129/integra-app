<?php

namespace App\Actions\Invoice;

use Illuminate\Support\Facades\DB;

class InvoiceActions
{
    public const STATUS_ACTIVE = 1;

    public static function findInvoiceByClientId(int $clientId): object|null
    {
        $invoice = DB::table('factura')
            ->join('items_factura', 'items_factura.factura', '=', 'factura.id')
            ->where('factura.cliente', $clientId)
            ->where('factura.estatus', InvoiceActions::STATUS_ACTIVE)
            // TODO: Esto puede generar problemas en el futuro, ya que no se está
            // organizando la factura por otro criterio. Así, si el cliente tiene
            // más de una factura se mostrará la primera que encuentre el sistema.
            ->first();

        return $invoice;
    }
}
