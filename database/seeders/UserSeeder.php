<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
            'access_token' => 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ',
            'uuid'         => 'c8491983-75b4-4e1f-af2c-b194c7c71ab1',
            'email'        => '', // see accompanying documentation
            'password'     => '', // see accompanying documentation
        ]);
    }
}
