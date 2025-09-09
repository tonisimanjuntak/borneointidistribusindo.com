<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cronjob extends Model
{
    use HasFactory;

    public function bersihkanriwayataktifitas()
    {
        DB::table('riwayataktifitas')
            ->where('inserted_date', '<', date('Y-m-d', strtotime('-1 month')))
            ->delete();
    }
}
