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
        Schema::create('frontend_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->text('data');
            $table->enum('status',[1,2])->default(2)->comment('1=publish , 2=pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_sections');
    }
};
