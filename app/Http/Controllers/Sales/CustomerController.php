<?php

namespace App\Http\Controllers\Sales;

use Validator;
use App\Http\Models\Sales\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', Customer::class);
        $this->data['title'] = "List Customers";
        $this->data['rows'] = Customer::orderby('id', 'desc')->paginate(25) ;
        return view('sales.customer-list', $this->data)->with('i', ($request->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Customer::class);
        $data['title'] = "Add Customer";
        $data['heading_title'] = "Add Customer";
        $data['method'] = "POST";
        $data['routes'] = [];
        $data['action'] = route('customer.store');
        return view('sales.customer-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Customer::class);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Customer::create($request->all());
        return redirect()->route('customer.list')->with('success', "Data saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $this->authorize('update', [Customer::class, $customer]);
        $data['title'] = "Edit Customer";
        $data['heading_title'] = "Edit Customer";
        $data['method'] = "PUT";
        $data['action'] = route('customer.update', $customer->id);
        $row = Customer::find( $customer->id);
        $data['row'] = $row;
        $data['routes'] = [];
        return view('sales.customer-form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->authorize('update', [Customer::class, $customer]);

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        
        // store
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->route('customer.list')->with('success', "Data saved successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Sales\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    }

    public function autocomplete(Request $request)
    {
        $term = $request->get('term');

        $results = array();
        $customers = Customer::where('name', 'LIKE', '%'.$term.'%')->take(5)->get();
        foreach ($customers as $customer){
            $results[] = ['value'=>$customer->name, 'id'=>$customer->id];
        }

        return $results;
    }
}
