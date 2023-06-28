<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;
use App\Models\User;
use App\Models\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::orderByDesc('id')->get();
        $users = User::all();
        //select * from reports (if in mysql command)
        return view('bus.index', ['users'=> $users], ['buses'=> $buses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $drivers = Driver::all();
        $users = User::all();
        return view ('bus.create',['users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request ->validate([
            'name' =>'required',
            'phone'=>'required',
            'plate_no'=> 'required',
            'route'=> 'required',
            'schedule'=> 'required',
            'link'=>'required',
            'status'=>'required',
        ]);
        DB::beginTransaction(); 
        //command for testing
        //follow oop style
        try {
          
                // $id = Auth::id();
                // $role = User::select('role')->where('id', $id)->first();
                // if ($role->role == 'driver') {
                //     $user = User::where('name', $request->name)->where('phone', $request->phone)->first();
             if($user = User::where('role' === 'driver')){
                $user = User::where('name', $request->name)->where('phone', $request->phone)->first();
                $bus = new Bus();
                $bus->user_id = $user->id;
                $bus->plate_no = $request->plate_no;
                $bus->route = $request->route;
                $bus->schedule = $request->schedule;
                $bus->link = $request->link;
                $bus->status = $request->status;
                $bus->save();
            }
            DB::commit(); //if one of the table not in then not in for both table. 
            
            return redirect()->route('bus.create')->with('success', 'Bus submitted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->route('bus.create')->with ('fail','Failed to submit');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bus.show',compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::where('id',$id)->first();
        return view ('bus.edit') -> with(['bus'=>$bus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //for action of edit use
    {
        //
        $request->validate([
            
            'plate_no'=>'required',
            'route'=>'required',
            'schedule'=>'required',
            'link'=>'required'
        ]);
        try{
        
        // $driver = User::where('id', $id)->where('role', 'driver')->first();
        // $driver->phone = $request->phone;
        // $driver->save();
        
        $bus=Bus::where('id', $id)->first();
        $bus->plate_no =$request->plate_no;
        $bus->route =$request->route;
        $bus->schedule =$request->schedule;
        $bus->link =$request->link;
        $bus->save();

        return redirect()->route('bus.index')
            ->with('success','Data updated successfully.');
    }
    catch(\Exception $e)
    {
        return redirect()->route('bus.edit')->with ('fail','Data is not updated');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bus)
    {
        $bus = Bus::find($bus);
        $bus->delete();
        return redirect()->route('bus.index')->with ('success','Bus data is deleted.');
    }
    public function map($id)
    {
        $bus = Bus::findOrFail($id);
        return view ('bus.map') -> with (['bus' => $bus]);
    }
}
