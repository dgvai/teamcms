<?php

use App\Models\LaraTrusts\Permission;
use App\Models\Team\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userMgmt = new Permission();
        $userMgmt->name = "manage-user";
        $userMgmt->save();

        $postMgmt = new Permission();
        $postMgmt->name = 'manage-posts';
        $postMgmt->save();

        $designMgmt = new Permission();
        $designMgmt->name = 'manage-frontend';
        $designMgmt->save();

        $mailMgmt = new Permission();
        $mailMgmt->name = 'manage-mailings';
        $mailMgmt->save();

        $rootPermit = Permission::find(1);

        $user = User::whereRoleIs('root')->first();
        $user->attachPermissions([$rootPermit,$userMgmt,$postMgmt,$designMgmt,$mailMgmt]);
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
