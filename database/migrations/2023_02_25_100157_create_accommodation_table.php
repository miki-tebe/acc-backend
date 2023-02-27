<?php

use App\Enums\CategoryType;
use App\Enums\CurrencyType;
use App\Enums\StatusType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('summary');
            $table->enum('category', CategoryType::getValues())->default(CategoryType::Hotels);
            $table->float('price')->default(0);
            $table->float('iPrice')->default(0);
            $table->enum('currency', CurrencyType::getValues())->default(CurrencyType::ETB);
            $table->boolean('published')->default(false);
            $table->boolean('fullyBooked')->default(false);
            $table->float('discount')->default(0);
            $table->enum('status', StatusType::getValues())->default(StatusType::Pending);
            $table->json('tags')->nullable();
            $table->float('commission')->default(0);
            $table->json('accommodationImages')->nullable();
            $table->string('accommodationPictures')->nullable();
            $table->integer('averageRating')->default(0);
            $table->integer('totalReviews')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
};
