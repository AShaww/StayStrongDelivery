<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class CustomerController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    /**
     * show customer by id
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', ['customer' => $customer]);
    }

    /**
     * @return Application|Factory|View
     */
    public function createcustomer()
    {
        return view('customers.createcustomer');
    }

    /**
     * Looks at name attribute from named Text field in createcustotmer.blade and saves the datta in same named field database.
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'fname' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'fAddress' => $request->input('fAddress'),
            'lAddress' => $request->input('lAddress'),
            'postcode' => $request->input('postcode'),
        ]);

        return redirect('/customers')->with('mssg', 'Customer Created' . $customer->id);
    }

    /**
     * Delete a customer; if not found throw http 404
     *
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function delete($id)
    {

        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers');
    }

    /**
     * Edit an existing customer or throw a http 404
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', [
            'customer' => $customer
        ]);

    }

    /**
     * Update or create new|existing customer
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {

        Customer::updateOrCreate([
            'id' => $request->input('id')
        ], [
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'fAddress' => $request->input('fAddress'),
            'lAddress' => $request->input('lAddress'),
            'postcode' => $request->input('postcode'),
        ]);

        return redirect('/customers')->with('success', 'Customer details have been successfully updated!');
    }
}
