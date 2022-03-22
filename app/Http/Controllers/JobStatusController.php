<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobsStatus;

class JobStatusController extends Controller
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
        $JobStatus = JobsStatus::all();
        return response()->json(['JobStatus'=> $JobStatus]);
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
        $JobsStatus = new JobsStatus;
        $JobsStatus->job_status = $request->job_status;
        
        $result = $JobsStatus->save();
        if($result){
            return response()->json(["result"=>"Order Status added successfully"]);
        }else{
            return response()->json(["result"=>"Error in added Order Status"]);
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
        $JobStatus = JobsStatus::find($id);
        return response()->json(["JobStatus"=>$JobStatus]);
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
        $result = JobsStatus::Where('id',$id)->update([
            'order_status' => $request->order_status
        ]);

        if($result){
            return response()->json(["result"=>"Order Status Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Order Status"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $JobStatus = JobsStatus::find($id);
        $result = $JobStatus->delete();
        if($result){
            return response()->json(["result"=>"Order Status Deleted successfully"]);
        }else{
            return response()->json(["result"=>"Issue in deleting Order Status"]);
        }
    }
}
