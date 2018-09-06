<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('list', User::class);
        $this->data['title'] = "List Users";
        $this->data['rows']= User::getUsers();
        //dd($this->data);
        $this->data['roles'] = Role::orderby('name', 'asc');
        return view('users/user-list', $this->data)->with('i', ($request->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new aresource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $this->data['title'] = "Add User";
        $this->data['heading_title'] = "Add User";
        $this->data['roles'] = Role::orderby('name', 'asc');
        $this->data['method'] = "POST";
        $this->data['row'] = (object)['role'=>'', 'name'=>'', 'email'=>''];
        $this->data['action'] = route('user.store');
        return view('users/user-form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $this->authorize('create', User::class);
        $this->validator($data->all())->validate();
        event(new Registered($user = $this->save($data->all())));

        return redirect()->route('user.list')->with('success', "Data saved successfully");
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function save(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => 0,
            'role' => $data['role'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('list', User::class);

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
        $this->data['title'] = "Edit User";
        $this->data['heading_title'] = "Edit User";
        $this->data['method'] = "PUT";
        $this->data['action'] = route('user.update', $id);
        $row = User::find($id);
        $this->authorize('update', $row);
        $this->data['roles'] = Role::orderby('name', 'asc')->get();
        $this->data['row'] = $row;
        return view('users/user-form', $this->data);
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
        $this->authorize('update', User::class);

        $this->validator($request->all(), $id)->validate();

        return redirect()->route('user.list')->with('success', "Data saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy', User::class);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'role' => 'required',
            'name' => 'required|max:255'.($id?",".$id:''),
            'email' => 'required|email|max:255|unique:users'.($id?",email,".$id:''),
            'password' => $id ? '' : 'required|min:6|confirmed',
        ]);
    }


    public function custom(){

    }
}
