<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerColection; //ko tham số
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show tất cả người dùng
        return new CustomerColection(Customer::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tạo người dùng
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save the user to the database
        $request->validate([
            'name_customer' => 'required',
            'phone_customer' => 'required',
            'address_customer' => 'required',
            'email_customer' => 'required',
            'city_customer' => 'required',
        ]);

        $customer = Customer::create($request->all());

        return new CustomerResource($customer);
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
        return new CustomerResource(Customer::find($id));
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
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        //cập nhật người dùng
        // $request->validate([
        //     'name_customer' => 'required',
        //     'phone_customer' => 'required',
        //     'address_customer' => 'required',
        //     'email_customer' => 'required',
        //     'city_customer' => 'required',
        // ]);



        //trả về những gì đã update
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //Xóa người dùng
        $customer->delete();
    }
}
