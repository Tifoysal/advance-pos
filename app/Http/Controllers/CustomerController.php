<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(CustomerRequest $request, CustomerRepository $customerRepository)
    {
        $customerRepository->store($request);
        return redirect()->back();
    }

    public function update($id, Request $request,CustomerRepository $customerRepository)
    {
        $customer=$customerRepository->find($id);
        $customerRepository->update($customer, $request);
    }


    public function findCustomer($id,CustomerRepository $customerRepository)
    {
        $customer=$customerRepository->find($id);
    }
}
