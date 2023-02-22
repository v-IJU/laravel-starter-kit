<?php

namespace App\Providers;

use App\Models\MailConfig;
use Illuminate\Support\ServiceProvider;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $mailsetting = MailConfig::first();
        // if($mailsetting){
        //     $data = [
        //         'driver'            => $mailsetting->mail_transport,
        //         'host'              => $mailsetting->mail_host,
        //         'port'              => $mailsetting->mail_port,
        //         'encryption'        => $mailsetting->mail_encryption,
        //         'username'          => $mailsetting->mail_username,
        //         'password'          => $mailsetting->mail_password,
        //         'from'              => [
        //             'address'=>$mailsetting->mail_from,
        //             'name'   => config('app.name'),
        //         ]
        //     ];
        //     Config::set('mail',$data);
        // }
    }
}
