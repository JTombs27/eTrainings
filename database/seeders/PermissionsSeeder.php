<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert($this->data());
    }

    public function data()
    {
        return array(
            array('id' => 1,'permission_name' => 'can_edit_user'),
            array('id' => 2,'permission_name' => 'can_create_user'),
            array('id' => 3,'permission_name' => 'can_delete_user'),
        );
    }
}
