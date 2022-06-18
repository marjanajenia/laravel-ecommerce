<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.vendor.vendormanage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.vendor.addvendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'des'=>'required',
            'office_address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'operatorName'=>'required',
            'operator_phone'=>'required',
            'tin'=>'required',
            'trade_num'=>'required',
            'status'=>'required'
        ]);

        $vendor=new Vendor();
        $vendor->name=$request->name;
        $vendor->des=$request->des;
        $vendor->office_address =$request->office_address;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->operator_name=$request->operator_name;
        $vendor->operator_phone=$request->operator_phone;
        $vendor->tin=$request->tin;
        $vendor->trade_num=$request->trade_num;
        $vendor->status=$request->status;
        $vendor->save();
         return redirect()->route('dashboard');
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
