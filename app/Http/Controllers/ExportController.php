<?php

namespace App\Http\Controllers;

use App\Exports\AlumnosInscritosExport;
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

    public function exportpreins()
    {

        return Excel::download(new AlumnospreExport(), 'preinscritos.xlsx');
    }

    public function exportinscritos()
    {

        return Excel::download(new AlumnosInscritosExport(), 'inscritos.xlsx');
    }

    public static function ExportRoutes()
    {
        Route::get('/exportpreins', [ExportController::class, 'exportpreins'])->name('exportpreins');
        Route::get('/exportinscritos', [ExportController::class, 'exportinscritos'])->name('exportinscritos');
    }
}
