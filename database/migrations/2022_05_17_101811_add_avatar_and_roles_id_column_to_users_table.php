<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarAndRolesIdColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('roles_id')->nullable()->after('name')->constrained('roles');
            $table->string('avatar')->nullable()->after('email')->comment('Ссылка на аватар');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_roles_id_foreign');
            $table->dropColumn('roles_id');
            $table->dropColumn('avatar');
        });
    }
}
