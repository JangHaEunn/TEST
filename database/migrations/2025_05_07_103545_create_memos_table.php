<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userId')->unique();
            $table->string('password');
            $table->text('name');
            $table->date('birth'); 
            $table->string('email');
            $table->boolean('status')->default(true);
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ch_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memos');
    }
};
