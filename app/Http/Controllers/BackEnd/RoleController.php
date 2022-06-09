<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\AdminHelper;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Permission;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Notification;
use App\Notifications\AdminNotification;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data=Role::select('id','name')->get();
            return view('backend.role.list',compact($data));
    }
    public function sample(){
        $data=Role::WEEK_DAYS;
        $nodays=[];
        for ($i=0; $i <3 ; $i++) {
            $nodays[]=$data[$i];
        }
        return view('backend.role.sample',compact('nodays','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::where('status',1)->select('id','name','slug','group')->get();
        $permissionlist=$this->getpermissionlist($permissions);


        //dd($permissionlist);
        return view('backend.role.create',compact('permissionlist'));
    }

    public function getpermissionlist($permissions){
            $permissionlist=[];
            foreach ($permissions as $permission) {



                $permissionlist[$permission->group]['ids'][$permission->id] = $permission->name;

                # code...
            }
            return $permissionlist;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $role_id=Role::insertGetId([
            'name'=>$request->rolename,
            'slug'=>Str::slug($request->rolename),
        ]);

        foreach($request->permission as $permission)
        {
            RolePermission::insert([
                    'role_id'=>$role_id,
                    'permission_id'=>$permission,
                    'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Role Created',
            'alert-type' => 'success'
        );
        return redirect()->route('role.index')->with($notification);


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



        $role_id=Role::with('permissions')->find($id);

        //dd($role_id);
        //$permissions=Permission::where('status',1)->select('id','name','slug','group')->get();
        $permissions=Permission::where('status',1)->select('id','name','slug','group')->get();
        $permissionlist=$this->getpermissionlist($permissions);
        $Rolepermissionlist=$role_id->permissions->pluck('id');
        //dd($Rolepermissionlist);
        return view('backend.role.create',compact('permissionlist','Rolepermissionlist','role_id'));

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
       
       $role_id=$id;
       $permissions=$request->permission;

       RolePermission::where('role_id',$role_id)->delete();

       foreach($permissions as $permission)
       {
           RolePermission::insert([
                   'role_id'=>$role_id,
                   'permission_id'=>$permission,
                   'created_at' => Carbon::now(),
           ]);
       }
       $role_name=Role::where('id',$id)->pluck('name')->first();

       $admin=Role::with('users')->where('name',AdminHelper::ADMIN)->get();

       $message=$role_name." Role Updated";
       foreach($admin as $key=>$user)
       {
        Notification::send($user->users, new AdminNotification($message));
       
       }

       $notification = array(
           'message' => 'Role Updated',
           'alert-type' => 'success'
       );
       return redirect()->route('role.index')->with($notification);
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

     public function getrolluser_data(Request $request) {

        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;

       DB::statement(DB::raw('set @rownum=' . (int) $sTart));

        $data = DB::table('roles')->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"roles.id as id","name")

            ->orderBy('id','Asc')->get();


            return Datatables::of($data)
                    ->addIndexColumn()
                     ->addColumn('check', function($data) {
                        if($data->id != '1')
                            return $data->rownum;
                        else
                            return '';
                    })

                    ->addColumn('action',function($data){
                        if($data->id ===1)
                        {
                            return ;
                        }else{

                             return '<div class="btn-group btn-group-sm">
                        <a href="'.route("role.edit",$data->id).'" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>

                      </div>';
                        }
                        
                        
                       
                        //return $data->id;
                    })


                    ->make(true);


    }


    public function export()

    {

        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }

}
