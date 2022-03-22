<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobManagement;

class JobManageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobManagement = JobManagement::all();
        return response()->json(['applicantsJobs'=> $JobManagement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->uid;
        $job_count =  JobManagement::where(['user_id' => $id, 'job_id' => $job_id, 'status' => 1])->count();
        if($job_count == 0){
            $payment = new JobManagement;
            $payment->user_id = $request->uid;
            $payment->total_price = $request->total_price;
            $payment->payment_method = $request->payment_method;
            $payment->payment_id = $request->payment_id;
            $payment->payment_status = $request->payment_status;
            
            $result = $payment->save();
            if($result){
                return response()->json(["result"=>"Applied for job successfully"]);
            }else{
                return response()->json(["result"=>"Error in applying for Job"]);
            }
        }else{
            return response()->json(["result"=>"You already applied for this job. Please update if you want to change the details"]);
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
        //
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
