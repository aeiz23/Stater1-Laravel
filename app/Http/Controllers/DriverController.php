<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
   
    {
        $drivers = User::where('role', 'driver')->where('id', auth()->user()->id)->first();
        $buses = Bus::orderByDesc('id')->get();
    
        return view('driver.dashboard', ['drivers' => $drivers], ['buses' => $buses]);
       
    }
    public function edit($id)
    {
        $bus = Bus::where('id',$id)->first();
        return view('driver.edit') ->with(['bus'=>$bus]);
    }

    public function update(Request $request, $id)
    {
            // dd($request->all());
            $request->validate([
            'phone'=>'required',
            'status'=> 'required'
        ]);

        try{
    
            $bus = Bus::where('id', $id)->first();

            $user=User::where('id', $bus->user_id)->first();
            $user->phone = $request->phone;
            $user->save();

            //$bus->user_id = $user->id;
            $bus->status= $request->status;
            $bus->save();
      
            return redirect()->route('driver.dashboard')->with('success','Status updated successfully.');
        }
        catch(\Exception $e)
    {
        return redirect()->route('driver.edit')->with ('fail','Status is not updated');
    }
        }
}