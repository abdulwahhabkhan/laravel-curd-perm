<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Group;

class GroupController extends Controller
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
        $this->data['title'] = "List User Group";
        $this->data['rows'] = Group::orderby('id', 'desc')->paginate(5) ;
        return view('users/group-list', $this->data)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['title'] = "Add User Group";
        $this->data['heading_title'] = "Add User Group";
        $this->data['method'] = "POST";
        $this->data['routes'] = $this->getMenuItems();
        $this->data['action'] = route('group.store');
        return view('users/group-form', $this->data);
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
            return redirect('group.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $group = new Group();
            $group->name = $request->name;
            $group->description = $request->description;
            $group->view_permission = json_encode($request->view_permission);
            $group->update_permission = json_encode($request->update_permission);
            $group->save();
            return redirect()->route('group.list')->with('success', "Data saved successfully");
        }


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
        $this->data['title'] = "Edit User Group";
        $this->data['heading_title'] = "Edit User Group";
        $this->data['method'] = "PUT";
        $this->data['action'] = route('group.update', $id);
        $row = Group::find($id);
        $row->view_permission = json_decode($row->view_permission);
        $row->update_permission = json_decode($row->update_permission);
        $this->data['row'] = $row;
        $this->data['routes'] = $this->getMenuItems();
        return view('users/group-form', $this->data);
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
            return redirect('group.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $group = Group::find($id);
            $group->name = $request->name;
            $group->description = $request->description;
            $group->view_permission = json_encode($request->view_permission);
            $group->update_permission = json_encode($request->update_permission);
            $group->save();
            return redirect()->route('group.list')->with('success', "Data saved successfully");
        }

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
