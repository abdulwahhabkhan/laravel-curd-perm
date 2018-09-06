<?php

namespace App\Http\Controllers\Sales;

use Auth;
use App\Http\Models\Sales\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', Sale::class);
        $this->data['title'] = "List Customers";
        $this->data['rows'] = Sale::orderby('id', 'desc')->paginate(25) ;
        return view('sales.sale-list', $this->data)->with('i', ($request->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Sale::class);
        $data['title'] = "Add Sale";
        $data['heading_title'] = "Add Sale";
        $data['method'] = "POST";
        $data['routes'] = [];
        $data['action'] = route('sale.store');
        return view('sales.sale-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Sale::class);
        $this->validate($request,[
            'name' => 'required',
            'customer_id' => 'required',
            'amount' => 'required',
        ]);
        //pr($auth->user(),1);
        Sale::create(array_merge($request->all(),['created_by'=>Auth::user()->id]));
        return redirect()->route('sale.list')->with('success', "Data saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\Sales\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Sales\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Sales\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Sales\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
