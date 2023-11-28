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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('country_id')->nullable();
            $table->string('country_code')->nullable();
            $table->timestamps();
        });
        DB::table('contacts')->insert([
            [
                'name' => 'contacts Name',
                'phone' => '0152246224',
                'country_id' => 'eg',
                'country_code' => 20

            ],
            [
                'name' => 'contacts Name 2',
                'phone' => '3652455554',
                'country_id' => 'sa',
                'country_code' => 966
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
