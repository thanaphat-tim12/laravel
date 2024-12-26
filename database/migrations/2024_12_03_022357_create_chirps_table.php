<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()//ใช้ constrained() เพื่อผูกกับตาราง users โดยอัตโนมัติ
            ->cascadeOnDelete();//ใช้ cascadeOnDelete() เพื่อลบ chirps ที่เกี่ยวข้องเมื่อ user ถูกลบ
            $table->string('message');
            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
