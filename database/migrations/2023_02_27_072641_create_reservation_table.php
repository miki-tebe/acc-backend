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
            $table->enum('status', ReservationStatusType::getValues())->default(ReservationStatusType::Pending);
            $table->string('currency');
            $table->timestamp('checkedIn');
            $table->timestamp('checkedOut');
            $table->enum('status', PaymentType::getValues())->default(PaymentType::On_Arrival);
            $table->float('price');
            $table->string('canceledReason')->nullable();
            $table->float('commission')->nullable();
            $table->string('source')->nullable();
            $table->timestamp('bookingDate')->default(now());
            $table->string('notes');
            $table->integer('roomSize');
            $table->integer('adults');
            $table->integer('children');
            $table->string('code')->nullable();
            $table->float('totalPrice')->nullable();
            $table->integer('totalStay')->nullable();
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
