<?php

use App\Enums\PaymentType;
use App\Enums\ReservationStatusType;
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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('accommodation_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ReservationStatusType::getValues())->default(ReservationStatusType::Pending);
            $table->string('currency');
            $table->timestamp('checked_in');
            $table->timestamp('checked_out');
            $table->enum('status', PaymentType::getValues())->default(PaymentType::On_Arrival);
            $table->float('price');
            $table->string('canceled_reason')->nullable();
            $table->float('commission')->nullable();
            $table->string('source')->nullable();
            $table->timestamp('booking_date')->default(now());
            $table->string('notes')->nullable();
            $table->integer('room_size')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->string('code')->nullable();
            $table->float('total_price')->nullable();
            $table->integer('total_stay')->nullable();
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
        Schema::dropIfExists('reservation');
    }
};
