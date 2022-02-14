<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

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

    public function admin(){
        return view('admin');
    }


    public function role(){
        //Permission::create(['name' => 'delete']);

        //$role = Role::find(2);
        $permission = Permission::find(5);
        $user = User::find(2);
        //$role->givePermissionTo($permission);
       // $user->assignRole($role);
       // $user->givePermissionTo($permission);

        // if(auth()->user()->hasRole('Admin')){
        //     echo 'i am heree';
        // } elseif(auth()->user()->hasRole('Author')){
        //     echo 'I am a Author';
        // }   elseif(auth()->user()->hasRole('Editor')){
        //     echo 'I am a Editor';
        // }   elseif(auth()->user()->hasRole('publisher')){
        //     echo 'I am a Publisher';
        // }else {
        //     echo "who are u";
        // }

        $test = auth()->user()->getRoleNames();
        //dd($test);
        foreach ($test as $key) {
            echo $key . "<br>" ;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
