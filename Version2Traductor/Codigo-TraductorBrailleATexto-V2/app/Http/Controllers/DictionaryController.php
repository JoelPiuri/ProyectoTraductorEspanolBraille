<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;

class DictionaryController extends Controller
{
    public function getTableData($type)
    {
        $translations = Translation::where('tipoCaracter', $type)->get();

        return response()->json($translations);
    }
}

