<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    protected $table = 'admins';

    public $timestamps = false;

    public function checkLoginAdmin($username = null, $password = null)
    {
        return DB::table('admins')
                ->where([
                    'username' => $username,
                    'password' => $password,
                    'status' => 1
                ])->first();
    }

    public function updateLastLogin($id = null)
    {
        return DB::table('admins')
                    ->where('id', $id)
                    ->update([
                        'last_login' => date('Y-m-d H:i:s')
                    ]);
    }
}
