<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // First convert existing string values to Y-m-d so SQLite/MySQL accepts the column change
        DB::table('users')->whereNotNull('date_of_birth')->get(['id', 'date_of_birth'])->each(function ($u) {
            try {
                $clean = preg_replace('/(\d+)(st|nd|rd|th)\s/i', '$1 ', $u->date_of_birth);
                $date  = \Carbon\Carbon::parse($clean)->format('Y-m-d');
                DB::table('users')->where('id', $u->id)->update(['date_of_birth' => $date]);
            } catch (\Exception $e) {}
        });

        DB::table('users')->whereNotNull('result_publication_date')->get(['id', 'result_publication_date'])->each(function ($u) {
            try {
                $clean = preg_replace('/(\d+)(st|nd|rd|th)\s/i', '$1 ', $u->result_publication_date);
                $date  = \Carbon\Carbon::parse($clean)->format('Y-m-d');
                DB::table('users')->where('id', $u->id)->update(['result_publication_date' => $date]);
            } catch (\Exception $e) {}
        });

        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->change();
            $table->date('result_publication_date')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('date_of_birth')->nullable()->change();
            $table->string('result_publication_date')->nullable()->change();
        });
    }
};
