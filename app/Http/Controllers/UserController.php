<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use App\Models\Sites;
use App\Models\ClientSites;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'asc')->paginate(5);
        
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('name')->get();
        //echo'<pre>'; print_r($roles); die;
        $clients = ClientSites::select('client')->distinct()->get();
        $identitys = ClientSites::select('identity')->distinct()->get();
        $sites = ClientSites::select('sites')->distinct()->get();
        //echo'<pre>'; print_r($sites); die;
        return view('users.create',  ['roles' => $roles ,'sites' => $sites, 'clients' => $clients, 'identitys' => $identitys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // echo'<pre>'; print_r($_POST); die;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required',
            'sites' => 'required',
            'identity' => 'required',
            'client' => 'required'

        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['sites'] = $request->sites;
        //$input['client'] =$request->client;
        $news = $request->input('client');
        $news = implode(',', $news);
        $input['client'] = $news;

        $sit = $request->input('sites');
        $sit = implode(',', $sit);
        $input['sites'] = $sit;

       //$input['sites'] = json_encode($request->sites);
        $input['role'] =$request->role;
    
        $user = User::create($input);
        $user->assignRole($request->input('role'));
    
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
       // echo'<pre>'; print_r($user); die;
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $clients = ClientSites::select('client')->distinct()->get();
        $identitys = ClientSites::select('identity')->distinct()->get();
        $sites = ClientSites::select('sites')->distinct()->get();
    
        return view('users.edit', compact('user', 'roles', 'userRole','clients','identitys','sites'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required',
            'sites' => 'required',
            'identity' => 'required',
            'client' => 'required'
        ]);
    
        $input = $request->all();
        $news = $request->input('client');
        $news = implode(',', $news);
        $input['client'] = $news;

        $sit = $request->input('sites');
        $sit = implode(',', $sit);
        $input['sites'] = $sit;
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
