<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Role;
use App\Http\Helpers\AdminHelper;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$permission=Permission::where('status',1)->get();
      
        
        return view('backend.permission.list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.permission.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'permissionname' => 'required',
            'slugname' => 'required',
            'groupname' => 'required',
        ]);
        
        $permission_id=Permission::insertGetId([
            'name'=>$request->permissionname,
            'slug'=>$request->slugname,
            'group'=>$request->groupname,
            'created_at' => Carbon::now(),

        ]);
        $admin=Role::where('name','Admin')->first();
        RolePermission::insert([
            'role_id'=>$admin->id,
            'permission_id'=>$permission_id

        ]);
        $notification = array(
            'message' => 'Permission Created',
            'alert-type' => 'success'
        );
        return redirect()->route('permission.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
       
        
        return view("backend.permission.create",compact('permission'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        dd($request->all());
    }

    public function getpermissionData(Request $request)
    {
          


        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;
       
       DB::statement(DB::raw('set @rownum=' . (int) $sTart));
       
        $data = DB::table('permissions')->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"permissions.id as id","name")

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
                        return '<div class="btn-group btn-group-sm">
                       
                        <a href="'.route("permission.edit",$data->id).'" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                      
                      </div>';
                        //return $data->id;
                    })


                    ->make(true);
    }
}
