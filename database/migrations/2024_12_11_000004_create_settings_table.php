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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('value', 1000)->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('type', 50)->default('text')->comment('SettingTypes enum');
            $table->string('group', 50)->default('general')->comment('SettingGroups enum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

