<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(0);

            $table->string('title')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('position')->nullable();
            $table->string('organisation')->nullable();
            $table->string('organisation_address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('consent_name')->nullable();
            $table->string('member_no')->nullable();
            
            $table->string('vegeterian')->nullable();
            $table->string('vegan')->nullable();
            $table->string('gluten_free')->nullable();
            $table->string('lactose_free')->nullable();
            $table->string('halal')->nullable();
            $table->string('kosher')->nullable();
            $table->string('no_seafood')->nullable();
            $table->string('allergic_to_nuts')->nullable();
            $table->string('allergic_to_shellfish')->nullable();
            $table->string('dietary_requirements')->nullable();

            $table->string('accompanying_person')->nullable();
            $table->string('accompanying_person_name')->nullable();
            $table->string('accompanying_person_amount')->nullable();

            $table->string('accommodation')->nullable();
            $table->string('accommodation_type')->nullable();
            $table->string('accommodation_days')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->string('accommodation_amount')->nullable();

            $table->string('registration')->default(0);
            $table->string('currency')->default('USD');
            $table->integer('price')->default(0);
            $table->boolean('paid')->default(0);
            $table->timestamp('paid_at')->nullable();
            $table->string('receipt_no')->nullable();
            $table->integer('updated_by')->nullable();

            $table->string('pesapal_merchant_reference')->nullable();
            $table->string('pesapal_transaction_tracking_id')->nullable();
            $table->string('status')->nullable();

            $table->boolean('deleted')->default(0);
            $table->timestamp('deleted_at')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
