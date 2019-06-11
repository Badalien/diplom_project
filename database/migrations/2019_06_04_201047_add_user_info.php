<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('second_name')->default('')->after('name');
            $table->string('patronymic')->default('')->after('name');
            $table->timestamp('date_bf')->nullable()->after('email');
            $table->string('phone')->default('')->after('email');
            $table->string('address')->default('')->after('email');
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
            $table->dropColumn('second_name');
            $table->dropColumn('patronymic');
            $table->dropColumn('date_bf');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
}
