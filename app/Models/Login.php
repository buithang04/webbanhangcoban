<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class Login extends Model
    {
        protected $table = 'tbl_admin';
        protected $primaryKey = 'admin_id';
        public $timestamps = false;
    
        protected $fillable = [
            'admin_name', 'admin_email', 'admin_password', 'admin_phone' 
        ];
    }

