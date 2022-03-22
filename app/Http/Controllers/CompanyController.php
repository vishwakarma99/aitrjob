<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetails;

class CompanyController extends Controller
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
        $companydetails = CompanyDetails::all();
        return $companydetails;
        return response()->json(['companydetails' => $companydetails]);
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
        $company_count =  CompanyDetails::where(['user_id' => $id, 'status' => 1])->count();

        if($company_count == 0){
            $validateData = $request->validate([
                'company_name'=>'required|unique:company_details',
                'company_website'=>'required',
                'email_address'=>'required',
                'contact_no'=>'required',
                'state'=>'required',
                'city'=>'required',
                'pincode'=>'required',
                'employee_desc'=>'required',
                'interview_address'=>'required',
                'contact_person_name'=>'required',
                'contact_person_designation'=>'required'
            ]);

            $companyDetails = new CompanyDetails;
            $companyDetails->user_id = $request->uid;
            $companyDetails->company_name = $request->company_name;
            $companyDetails->company_website = $request->company_website;
            $companyDetails->email_address = $request->email_address;
            $companyDetails->contact_no = $request->contact_no;
            $companyDetails->state = $request->state;
            $companyDetails->city = $request->city;
            $companyDetails->pincode = $request->pincode;
            $companyDetails->employee_desc = $request->employee_desc;
            $companyDetails->interview_address = $request->interview_address;
            $companyDetails->contact_person_name = $request->contact_person_name;
            $companyDetails->contact_person_designation = $request->contact_person_designation;
            
            $result = $companyDetails->save();
            
            if($result){
                return response()->json(["result"=>"Company detail added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added Company Details"]);
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
        $companyDetails =  CompanyDetails::select('company_details.*','users.user_email_status')
                            ->leftjoin('users', 'users.uid', '=', 'company_details.user_id')
                            ->where(['company_details.user_id' => $id, 'company_details.status' => 1])->first();
        return $companyDetails;
        // $companyDetails = CompanyDetails::find($id);
        return response()->json(["companyDetails"=>$companyDetails]);
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
        $company = CompanyDetails::Where('user_id',$id);
        if ($request->has('company_name')) {
            $company->update(['company_name' => $request->company_name]);
        }

        if ($request->has('company_website')) {
            $company->update(['company_website' => $request->company_website]);
        }
        
        if ($request->has('email_address')) {
            $company->update(['email_address' => $request->email_address]);
        }

        if ($request->has('contact_no')) {
            $company->update(['contact_no' => $request->contact_no]);
        }

        if ($request->has('state')) {
            $company->update(['state' => $request->state]);
        }

        if ($request->has('city')) {
            $company->update(['city' => $request->city]);
        }

        if ($request->has('pincode')) {
            $company->update(['pincode' => $request->pincode]);
        }

        if ($request->has('employee_desc')) {
            $company->update(['employee_desc' => $request->employee_desc]);
        }
        if ($request->has('interview_address')) {
            $company->update(['interview_address' => $request->interview_address]);
        }
        if ($request->has('contact_person_name')) {
            $company->update(['contact_person_name' => $request->contact_person_name]);
        }
        if ($request->has('contact_person_designation')) {
            $company->update(['contact_person_designation' => $request->contact_person_designation]);
        }
        
        return response()->json(["result"=>"Company details Updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_count =  CompanyDetails::where(['user_id' => $id, 'status' => 1])->count();

        $companyDetails =  CompanyDetails::where(['user_id' => $id, 'status' => 1])->get();

        if($company_count > 0){
            $id = $companyDetails[0]->id;

            $companyDetails = CompanyDetails::find($id);

            $result = $companyDetails->delete();
            if($result){
                return response()->json(["result"=>"Company details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Company details"]);
            }
        }else{
            return response()->json(["result"=>"No record found"]);
        }
    }
}
