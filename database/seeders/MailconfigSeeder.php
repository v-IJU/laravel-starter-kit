<?php

namespace Database\Seeders;

use App\Models\MailConfig;
use Illuminate\Database\Seeder;

class MailconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailConfig::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'2525',
            'mail_username'             =>'55175207b27b09',
            'mail_password'             =>'5b9bc6ee1d63b9',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'adminjk@gmail.com',
        ]);
    }
}
