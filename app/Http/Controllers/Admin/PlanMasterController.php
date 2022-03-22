<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanMasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->role=="Admin"){
            $plan_count = Plan::where(['status' => 1])->count();
            $plan = Plan::all();
            return response()->json(['plan'=> $plan, 'plan_count' => $plan_count]);
        }
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
            'plan_name'=>'required|unique:plans',
            'plan_amount'=>'required',
            'service_tax_gst'=>'required',
            'total_pay'=>'required',
        ]);

        $plan = new Plan;
        $plan->plan_name = $request->plan_name;
        $plan->plan_amount = $request->plan_amount;
        $plan->service_tax_gst = $request->service_tax_gst;
        $plan->total_pay = $request->total_pay;
        $plan->coupon_code = $request->coupon_code;
        $plan->validity = $request->validity;
        $plan->plan_benefit1 = $request->plan_benefit1;
        $plan->plan_benefit2 = $request->plan_benefit2;
        $plan->plan_benefit3 = $request->plan_benefit3;
        $plan->plan_benefit4 = $request->plan_benefit4;
        $plan->plan_benefit5 = $request->plan_benefit5;

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
            'plan_name' => $request->plan_name,
            'plan_amount' => $request->plan_amount,
            'service_tax_gst' => $request->service_tax_gst,
            'total_pay' => $request->total_pay,
            'coupon_code' => $request->coupon_code,
            'validity' => $request->validity,
            'plan_benefit1' => $request->plan_benefit1,
            'plan_benefit2' => $request->plan_benefit2,
            'plan_benefit3' => $request->plan_benefit3,
            'plan_benefit4' => $request->plan_benefit4,
            'plan_benefit5' => $request->plan_benefit5,
        ]);

        if($result >= 0){
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
        $plan_count =  Plan::where(['id' => $id, 'status' => 1])->count();

        if($plan_count > 0){        
            $plan = Plan::find($id);
            $result = $plan->delete();

            if($result){
                return response()->json(["result"=>"Plan Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Plan details"]);
            }    
        }else{
            return response()->json(["result"=>"No record found"]);
        }
    }
}
