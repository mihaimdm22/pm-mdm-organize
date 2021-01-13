<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User;

        //defaults
        $queries = [
            'sort_by' => 'first_name',
            'sort' => 'asc',
        ];

        $filters = [
            'role',
        ];

        // foreach ($filters as $filter) {
        //     if(request()->has($filter)) {
        //         $users = $users->where('role', request('role'));
        //         $queries[$filter] = request($filter);
        //     }
        // }

        // if(request()->has('sort_by')) {
        //     $queries['sort_by'] = request('sort_by');
        // }

        // if(request()->has('sort')) {
        //     $queries['sort'] = request('sort');
        // }

        // $users = $users->orderBy($queries['sort_by'], $queries['sort']);

        if(request()->has('role')) {
            if(is_array(request('role'))) {
                $users = User::role(request('role')[0])->role(request('role')[1])->get();
            } else {
                $users = User::role(request('role'))->get();
            }
        } else {
            $users = $users->paginate(5)->appends($queries);
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:50000',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required|same:password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('avatar')) {
            $filepath = $request->file('avatar')->storeAs('avatars', $request->file('avatar')->getClientOriginalName());
            if ($filepath) {
                $input['avatar'] = $filepath;
            }
        }

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
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
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:50000',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required|same:password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        if ($request->hasFile('avatar')) {
            $filepath = $request->file('avatar')->storeAs('avatars', $request->file('avatar')->getClientOriginalName());
            if ($filepath) {
                $input['avatar'] = $filepath;
            }
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
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
            ->with('success', 'User deleted successfully');
    }
}
