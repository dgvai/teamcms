<?php

use App\Models\LaraTrusts\Permission;
use App\Models\LaraTrusts\Role;
use App\Models\Team\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetupRolesPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $root = new Role();
        $root->name = "root";
        $root->display_name = "Root User";
        $root->save();

        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin User";
        $admin->save();

        $mod = new Role();
        $mod->name = "mod";
        $mod->display_name = "Moderator User";
        $mod->save();

        $writer = new Role();
        $writer->name = "writer";
        $writer->display_name = "Writer User";
        $writer->save();

        $rootAccess = new Permission();
        $rootAccess->name = "root-permit";
        $rootAccess->save();

        $root->attachPermission($rootAccess);

        $rootUser = new User();
        $rootUser->email = "root@admin.com";
        $rootUser->roll_id = 0;
        $rootUser->password = Hash::make('admin');
        $rootUser->class = 100;
        $rootUser->status = 1;
        $rootUser->save();

        $rootUser->attachRole($root);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
