<?php

namespace App\Repositories;

use http\Env\Request;
use http\Env\Response;

class CustomerRepository
{

    public function store($request)
    {
       $customer= Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
        ]);

       return $customer;
    }

    public function find($id)
    {
        $customer=Customer::where('status','active')->find($id);
        return $customer;
    }

    public function update($customer,$request)
    {
        $customer->update([
           'name'=>$request->name
        ]);
    }

}
