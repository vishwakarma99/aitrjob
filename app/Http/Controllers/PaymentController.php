<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentDetails;

class PaymentController extends Controller
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
        $paymentDetails = PaymentDetails::all();
        return $paymentDetails;
        return response()->json(['paymentDetails'=> $paymentDetails]);
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
        $payment_count =  PaymentDetails::where(['user_id' => $id, 'status' => 1])->count();
        if($payment_count == 0){
            $payment = new PaymentDetails;
            $payment->user_id = $request->uid;
            $payment->total_price = $request->total_price;
            $payment->payment_method = $request->payment_method;
            $payment->payment_id = $request->payment_id;
            $payment->payment_status = $request->payment_status;
            
            $result = $payment->save();
            if($result){
                return response()->json(["result"=>"Payment details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in adding Payment details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
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
        // $payment = PaymentDetails::find($id);
        $payment =  PaymentDetails::where(['user_id' => $id, 'status' => 1])->first();
        return $payment;
        return response()->json(["payment"=>$payment]);
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
    public function update(Request $request)
    {
        $id = $request->uid;

        $result = PaymentDetails::Where('user_id',$id)->update([
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
            'payment_id' => $request->payment_id,
            'payment_status' => $request->payment_status
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Payment details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Payment details"]);
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
        $payment_count =  PaymentDetails::where(['user_id' => $id, 'status' => 1])->count();

        $paymentData =  PaymentDetails::where(['user_id' => $id, 'status' => 1])->get();
        
        if($payment_count > 0){
            $id = $paymentData[0]->id;
        
            $payment = PaymentDetails::find($id);
            $result = $payment->delete();

            if($result){
                return response()->json(["result"=>"Payment details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Payment details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }   
    }
}
