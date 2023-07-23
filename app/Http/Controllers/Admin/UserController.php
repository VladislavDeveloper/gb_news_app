<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Queries\QueryBuilder;
use App\Queries\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct(
        protected UsersQueryBuilder $usersQueryBuilder
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/users', ['users' => $this->usersQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('forms/Users/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $role = $request->get('roles');

        if(!$user->isAdmin && $role == 'admin'){
            $user->isAdmin = true;

            if($user->save()){
                return redirect()->route('admin.users.index')->with('success', 'User has been updated');
            }
        }
        if($user->isAdmin && $role == 'user'){
            $user->isAdmin = false;

            if($user->save()){
                return redirect()->route('admin.users.index')->with('success', 'User has been updated');
            }
        }
        return redirect()->route('admin.users.index')->with('error', 'User has not been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
