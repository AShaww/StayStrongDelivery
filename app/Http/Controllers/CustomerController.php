<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index() {

    $customers = Customer::latest()->get();
    
    return view('customers.index', [
        'customers' => $customers
        ]);
    }   
    public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customers.show', ['customer' => $customer]);
    }
    public function createcustomer(){
        return view('customers.createcustomer'); 
    }
    public function store(){

        $customer = new Customer();

        $customer->fName = request('fName');
        $customer->lName = request('lName');
        $customer->number = request('number');
        $customer->email = request('email');
        $customer->fAddress = request('fAddress');
        $customer->lAddress = request('lAddress');
        $customer->postcode = request('postcode');
        $customer->save();

     return redirect('/customers')->with('mssg', 'Customer Created'.$customer->id);
    }
    public function delete($id) {
        
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers');
    }
    public function edit($id){

        $customer = Customer::findOrFail($id);

        return view('customers.edit',[
            'customer' => $customer
        ]);

    }
    public function update(Request $request){

        Customer::updateOrCreate([
            'id' => $request->input('id')
        ],[
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'fAddress' => $request->input('fAddress'),
            'lAddress' => $request->input('lAddress'),
            'postcode' => $request->input('postcode'),
        ]);


    //  return redirect('/customers')->with('mssg', 'Customer Created'.$customer->id);
        return redirect('/customers')->with('success', 'Customer details have been successfully updated!');
    }
}
