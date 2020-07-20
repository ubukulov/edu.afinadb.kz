<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'firstname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        $credentials['password'] = bcrypt($credentials['password']);
        DB::beginTransaction();
        try {
            $user = User::create($credentials);
            UserProfile::create([
                'user_id' => $user->id, 'firstname' => $request->input('firstname'), 'phone' => $request->input('phone')
            ]);
            foreach($request->input('role') as $role_name) {
                $user->addRole($role_name);
            }
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            dd($exception);
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
        //
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
        //
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
