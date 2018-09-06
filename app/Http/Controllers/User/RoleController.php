<?php

namespace App\Http\Controllers\User;

use Validator;
use App\Http\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', Role::class);
        $this->data['rows'] = Role::orderby('id', 'desc')->paginate(5) ;
        return view('users/role-list', $this->data)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add Role";
        $data['heading_title'] = "Add Role";
        $data['method'] = "POST";
        $data['row'] = (object)['permission'=>[], 'description'=>'', 'name'=>''];
        $data['routes'] = [];
        $data['action'] = route('role.store');
        return view('users/role-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('role.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->permission = json_encode($request->permission);
            $role->status = 1;
            $role->save();
            return redirect()->route('role.list')->with('success', "Data saved successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
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
        $data['title'] = "Edit Role";
        $data['heading_title'] = "Edit Role";
        $data['method'] = "PUT";
        $data['action'] = route('role.update', $id);
        $row = Role::find($id);
        $row->permission = json_decode($row->permission);
        $data['row'] = $row;
        $data['routes'] = [];
        return view('users/role-form', $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('role.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $role = Role::find($id);
            $role->name = $request->name;
            $role->description = $request->description;
            $role->permission = json_encode($request->permission);
            $role->save();
            return redirect()->route('role.list')->with('success', "Data saved successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
