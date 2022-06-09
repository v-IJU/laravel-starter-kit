<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    use HasFactory;
    protected $table = "mail_configs";
    protected $fillable = [
    'mail_transport',
    'mail_host',
    'mail_port',
    'mail_username',
    'mail_password',
    'mail_encryption',
    'mail_from',];
}
