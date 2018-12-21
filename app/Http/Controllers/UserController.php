<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/users');
    }

    /**
     * Request ajax data for
     * Datatables
     */
    public function getUsers()
    {
        return Datatables::of(User::query())
        ->editColumn('updated_at', function(User $user) {
                return $user->updated_at->diffForHumans();
            })
        ->addColumn('intro', function(User $user) {
                return '
                <a href="users/'.$user->id.'" 
                   class="btn btn-info">
                   info
                </a>
                <a href="users/'.$user->id.'/edit" 
                   type="button" 
                   class="btn btn-primary">
                   edit
                </a>
                <button 
                   type="button" 
                   class="delete-user btn btn-danger" 
                   value="'.$user->id.'" onclick="destroyElement(this);">
                   delete
                </button>
                ';
            })
        ->rawColumns(['intro', 'action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // CreateUserRequest - класс для валлидации данных
        
        User::create($request->all());
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user_detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    { 
        if(Hash::check($request->old_password, $user->password))
        {
            unset($request['old_password']);
            unset($request['password_confirm']);
            $user->update($request->all());
            return redirect("users");
        }
        else
        {           
            $error = array('current-password' => 'Please enter correct current password');
            return response()->json(array('error' => $error), 400);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return "was deleted...";
    }
}
