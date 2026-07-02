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
        Schema::create('job_feeds', function (Blueprint $table) {

            $table->id();

            $table->string('source')->default('FreeJobAlert');

            $table->bigInteger('article_id')->nullable();

            $table->text('url');

            $table->text('title')->nullable();

            $table->timestamp('published_at')->nullable();

            $table->enum(
                'status',
                [
                    'pending',
                    'processing',
                    'completed',
                    'failed'
                ]
            )->default('pending');

            $table->timestamps();

            $table->unique('article_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_feeds');
    }
};
