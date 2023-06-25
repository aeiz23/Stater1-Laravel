<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\File;
use App\Models\Driver;
use App\Models\Report;
use App\Models\Bus;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::get();
        $totalBus = Bus::count();
        $totalDriver = User::where('role', 'driver')->count();
        $totalReport = Report::count();
        //select * from reports (if in mysql command)
        return view('admin.dashboard', compact('totalBus','totalDriver','totalReport'));
       
    }
    public function generatePdf()
    {
        $reports = Report::all();
           // Generate the PDF using the Laravel PDF library
        $dompdf =  new Dompdf();
        $tableHtml = View::make ('admin.viewPdf',compact ('reports'))->render();
        $html='<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Report UPSI Bus</title>
            <style>
               thead {
                        background-color: #F2D2D2;
               }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #000;
                    padding: 5px;
                }
            </style>
        </head>
        <body>
            <h1>Report UPSI Bus</h1>
            ' . $tableHtml . '
        </body>
        </html>';
        $dompdf->loadHtml($html);

        $options = New Options();
        $options->set('defaultFont','Arial');
        $dompdf->setOptions($options);

        $dompdf->render();
        $dompdf->stream('Report UPSI Bus.pdf');
    
    }

}
