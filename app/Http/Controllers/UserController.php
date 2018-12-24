<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

use App\Services\UserService;

class UserController extends Controller
{

    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

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
        return $this->service->getUsersList();
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
        if($this->service->userUpdate($request, $user))  
            return redirect("users"); 
        else $this->service->userUpadateFall();
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
        if(request()->ajax())
            return "deleted";
        return redirect("users");
    }
}
