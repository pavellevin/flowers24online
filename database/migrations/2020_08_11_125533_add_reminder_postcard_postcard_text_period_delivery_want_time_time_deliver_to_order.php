<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReminderPostcardPostcardTextPeriodDeliveryWantTimeTimeDeliverToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'is_slider')) {
                $table->string('reminder', 2)->nullable()->after('status_id');
                $table->string('want_postcard', 20)->nullable()->after('reminder');
                $table->text('postcard_text', 500)->nullable()->after('postcard');
                $table->string('period_id', 20)->nullable()->after('date_delivery');
                $table->string('want_time', 20)->nullable()->after('period_delivery');
                $table->time('time_delivery')->nullable()->after('want_time');
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
                $table->dropColumn('reminder');
                $table->dropColumn('want_postcard');
                $table->dropColumn('postcard_text');
                $table->dropColumn('period_id');
                $table->dropColumn('want_time');
                $table->dropColumn('time_delivery');
        });
    }
}
