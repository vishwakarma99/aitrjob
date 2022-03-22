<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanMasterController extends Controller
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
        $plan = Plan::all();
        return response()->json(['plans'=> $plans]);
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
        $validateData = $request->validate([
            'service_name'=>'required',
            'service_price'=>'required',
            'service_image'=>'required'
        ]);

        $plan = new Plan;
        $plan->plan_name = $request->plan_name;
        $plan->plan_amount = $request->plan_amount;
        $plan->service_tax_gst = $request->service_tax_gst;
        $plan->total_pay = $request->total_pay;
        $plan->coupon_code = $request->coupon_code;

        $result = $plan->save();
        
        if($result){
            return response()->json(["result"=>"Plan added successfully"]);
        }else{
            return response()->json(["result"=>"Error in added New Plan"]);
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
        $plan = Plan::find($id);
        return response()->json(["plan"=>$plan]);
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
        $result = Plan::Where('id',$id)->update([
            'plan_name' => $request->service_name,
            'plan_amount' => $request->service_price,
            'service_tax_gst' => $request->service_price,
            'total_pay' => $request->service_price,
            'coupon_code' => $fileNameToStore
        ]);

        if($result){
            return response()->json(["result"=>"Plan Details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Plan details"]);
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
        $plan = Plan::find($id);
        $result = $plan->delete();
        if($result){
            return response()->json(["result"=>"Plan Deleted successfully"]);
        }else{
            return response()->json(["result"=>"Issue in deleting Plan details"]);
        }
    }
}
