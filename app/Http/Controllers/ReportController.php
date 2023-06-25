<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Models\Bus;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $reports = Report::orderByDesc('id')->get();
        $buses = Bus::all();
        //select * from reports (if in mysql command)
        return view('report.index', ['students' => $students], ['reports' => $reports], ['buses' => $buses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view ('report.create', ['buses'=>$buses]);
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
        DB::beginTransaction();
         //command for testing
        //  $request->validate([
        //     'bus_id' => 'required',
        //     'student_id'=>'required',
        //     'name'=> 'required|max:255',
        //     'matric_no'=> 'required|max:255',
        //     'desc'=> 'required',
        //     'plate_no'=>'required',
        //     //'route'=>'required',
        //     'schedule'=>'required'

        //  ]);
        
        //follow oop style
        //$bus = Bus::findOrFail($validatedData['bus_id']);
        try{
        $ExistStudent = Student::where('matric_no', $request->matric_no)->first();
        $bus = Bus::where('plate_no', $request->plate_no)->where('schedule', $request->schedule)->first();
        //dd($ExistStudent,$bus);
        if($ExistStudent){

            $report = new Report();
            $report->student_id= $ExistStudent->id;
            $report->bus_id= $bus->id;
            $report->desc = $request->desc;
            $report->save();
        
        }
        else{
        $student =  new Student();
        $student->name = $request->name;
        $student->matric_no = $request->matric_no;
        $student->save();

        $report = new Report();
        $report->student_id= $student->id;
        $report->bus_id= $bus->id;
        $report->desc = $request->desc;
        $report->save();
        }
        DB::commit();

    return redirect()->route ('report.create')->with ('success','Report submitted successfully!');
    }
    catch(\Exception $e){
        DB::rollback();
        dd($e->getMessage());
        return redirect()->route('report.create')->with ('fail','Failed to submit');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //return view('report.show',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
