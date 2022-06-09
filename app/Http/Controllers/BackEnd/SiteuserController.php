<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\AdminHelper;
use Yajra\DataTables\Facades\DataTables;
use App\Models\SiteUser;
use DB;

class SiteuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.siteuser.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.siteuser.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        dd($id);
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
    public function destroy(Request $request ,$id)
    {
       dd($request->all());
    }

    public function getsiteuserdata(Request $request) {

        $sTart = ctype_digit($request->get('start')) ? $request->get('start') : 0 ;

       DB::statement(DB::raw('set @rownum=' . (int) $sTart));

        $data = DB::table('site_users')->select(DB::raw('@rownum  := @rownum  + 1 AS rownum'),"site_users.id as id","name", "email", "phonenumber",
        "status"
         )

            ->orderBy('id','DESC')->get();


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
                        <a href="'.route("siteuser.edit",$data->id).'" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>

                      </div>';
                        //return $data->id;
                    })


                    ->make(true);


    }

    public function statuschange(Request $request){

        $data=SiteUser::find($request->userid);
        $data->status=$request->status;
        $data->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
