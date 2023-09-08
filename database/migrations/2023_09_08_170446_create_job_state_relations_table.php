<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("job_state_relations", function (Blueprint $table) {
            $table->id();
            $table->integer("state_id");
            $table
                ->foreignId("job_id")
                ->references("id")
                ->on("jobs")
                ->onDelete("cascade")
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("job_state_relations");
    }
};
