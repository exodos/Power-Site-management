<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        Role::create(['name'=>'writer']);
//        Permission::create(['name'=>'write post']);
//        $permission = Permission::create(['name' => 'edit post']);

//        $role = Role::findById(1);
//        $permission = Permission::findById(1);
//        $permission = Permission::findById(2);


//        $role->givePermissionTo($permission);
//        $permission->removeRole($role);
//        $role->revokePermissionTo($permission);


//        Role::create(['name'=>'writer']);
//        Permission::create(['name'=>'edit post']);

//        auth()->user()->givePermissionTo('edit post');
//        auth()->user()->assignRole('writer');


//        return auth()->user()->permissions;

//        $permission = Permission::create(['name'=>'write post']);
//        $role = Role::findById(1);
//        $role->givePermissionTo($permission);

//        return auth()->user()->revokePermissionTo('edit post');
//        return auth()->user()->removeRole('writer');

//        return User::permission('write post')->get();
        return view('home');
    }
}
