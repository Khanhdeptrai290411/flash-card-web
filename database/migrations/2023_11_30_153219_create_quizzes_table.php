<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // Trong file create_quizzes_table.php

public function up()
{
    Schema::create('quizzes', function (Blueprint $table) {
        $table->id('quizzes_id');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->unsignedBigInteger('course_id');
        $table->foreign('course_id')->references('course_id')->on('courses');
        $table->text('definition');
        $table->text('mota');
        $table->string('image')->nullable();
        $table->timestamps();
        // Tạo foreign key để liên kết với bảng users

    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};