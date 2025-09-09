<?php

namespace App\Http\Controllers;

use App\Models\Cronjob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CronjobController extends Controller
{
    var $CronjobModel;

    public function __construct()
    {
        $this->CronjobModel = new Cronjob;
    }

    public function bersihkanriwayataktifitas()
    {
        $this->CronjobModel->bersihkanriwayataktifitas();
    }

}
