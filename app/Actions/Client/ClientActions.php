<?php

namespace App\Actions\Client;

use Illuminate\Support\Facades\DB;

class ClientActions
{
    public static function findClient(int $clientId): Object | null
    {
        $client = DB::table('contactos')->find($clientId);
        return $client;
    }
}
