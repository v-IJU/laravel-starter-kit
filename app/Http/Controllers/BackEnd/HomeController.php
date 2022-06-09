<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SiteUser;
use App\Http\Helpers\AdminHelper;

class HomeController extends Controller
{
    public function Home()
    {
    	$user =\Auth::user();
		//dd($user);
    	/*$role=Role::where('slug','admin')->first();
    	$user->roles()->attach($role);*/
    	//dd($user->hasRole('admin'));

    	/*$permission=Permission::first();
    	$user->permissions()->attach($permission);*/
		//dd($user->role());
    	//dd($user->permissions);
    	//dd($user->hasPermission('edit.post'));
    	//dd($user->can('role.create'));
    	$totalusers=User::count();
    	$siteusers=SiteUser::where('status',1)->count();

    	//dd($totalusers,$siteusers);

    	return view('dashboard',compact('totalusers','siteusers'));
    }
}
