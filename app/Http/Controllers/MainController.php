<?php

namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\Report;
use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainPage()
    {
        $buses = Bus::all();
        return view ('main', ['buses' => $buses]);
       
    }

}
