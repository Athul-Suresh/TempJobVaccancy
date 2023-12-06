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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status',[1,0])->default(1)->comment('1:active,0:inactive');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
