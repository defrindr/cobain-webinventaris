<?php

namespace App\Http\Controllers\Apis;

use App\Models\InventarisModel;

class InventarisController extends Controller
{
    public function index($id)
    {
        $inventaris = InventarisModel::find($id);
        return response()->json($inventaris);
    }
}
