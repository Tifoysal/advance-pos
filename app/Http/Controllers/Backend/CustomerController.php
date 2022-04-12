<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createForm()
    {
    return view('admin.layouts.customer.create');
    }


    public function store(CustomerRequest $request,CustomerRepository $customerRepository)
    {
        $customerRepository->store($request);
        return redirect()->back();
    }

    public function update($id, CustomerRequest $request,CustomerRepository $customerRepository)
    {
        $customer=$customerRepository->find($id);
        $customerRepository->update($customer, $request);
    }

    public function findCustomer($id,CustomerRepository $customerRepository)
    {
        $customer=$customerRepository->find($id);
    }
}
