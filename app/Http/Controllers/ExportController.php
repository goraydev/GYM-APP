<?php

namespace App\Http\Controllers;

use App\Exports\AlumnospreExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function index()
    {
    }

    public function export()
    {

        return Excel::download(new AlumnospreExport(), 'preinscritos.xlsx');
    }

    public static function ExportRoutes()
    {
        Route::get('/exportpreins', [ExportController::class, 'export'])->name('exportpreins');
    }
}
