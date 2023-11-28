<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB ;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('profile_image')->nullable();
            $table->string('job_description')->nullable();
            $table->string('company')->nullable();
            $table->double('long')->nullable();
            $table->double('lat')->nullable();
            $table->string('access_token')->nullable();
            $table->string('fcm_token')->nullable();
            $table->enum('type',['normal','premium'])->default('normal');
            $table->dateTime('last_seen')->nullable();
            $table->string('country_id')->nullable();
            $table->string('country_code')->nullable();
            $table->enum('role',['admin','user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'phone' => '01200828426',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'country_id' => 'eg',
                'country_code' => 20

            ],

            [
                'first_name' => 'user',
                'last_name' => 'user',
                'phone' => '01012012524',
                'email' => 'euser@gmail.com',

                'role' => 'user',
                'country_id' => 'eg',
                'country_code' => 20

            ],
            [
                'first_name' => 'fuser',
                'last_name' => 'suser',
                'phone' => '6524255441',
                'email' => 'fuser@gmail.com',

                'role' => 'user',
                'country_id' => 'sa',
                'country_code' => 966

            ],

            [
                'first_name' => 'fuser',
                'last_name' => 'user',
                'phone' => '6524255447',
                'email' => 'suser@gmail.com',

                'role' => 'user',
                'country_id' => 'sa',
                'country_code' => 966

            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
