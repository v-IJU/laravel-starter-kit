<?php

namespace App\Http\Controllers\Backend;

use Throwable;
use App\Models\MailConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailConfigRequest;

class MailconfigController extends Controller
{

    public function index()
    {
        $mailconfig=MailConfig::first();
        return view('backend.mailconfig.createedit',compact('mailconfig'));
    }
    public function update(MailConfigRequest $request,MailConfig $mailconfig)
    {
        try{
            $mailconfig->update($request->validated());

            $notification = array(
            'message' => 'Mail Configuration Updated Successfully',
            'alert-type' => 'success'
                );

             return redirect()->route('mailconfig.view')->with($notification);

        }catch(\Exception $e)
        {
            Log::error($e);
           ;
            $message = str_replace(array("\r", "\n","'","`"), ' ', $e->getMessage());
            return redirect()->route('mailconfig.view')->with('error', $message);
 
        }
        
        
    }

    public function lfmview()
    {
        return view('backend.mailconfig.lfmview');

    }
}
