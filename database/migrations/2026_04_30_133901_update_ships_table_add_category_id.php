<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ships', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('name')->constrained('categories')->nullOnDelete();
        });

        // Migrate existing types to categories
        $ships = DB::table('ships')->get();
        foreach ($ships as $ship) {
            if (!empty($ship->type)) {
                $category = DB::table('categories')->where('name', $ship->type)->first();
                if (!$category) {
                    $categoryId = DB::table('categories')->insertGetId([
                        'name' => $ship->type,
                        'description' => 'Category for ' . $ship->type,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $categoryId = $category->id;
                }
                
                DB::table('ships')->where('id', $ship->id)->update(['category_id' => $categoryId]);
            }
        }

        Schema::table('ships', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ships', function (Blueprint $table) {
            $table->string('type')->after('name')->nullable();
        });

        $ships = DB::table('ships')->get();
        foreach ($ships as $ship) {
            if ($ship->category_id) {
                $category = DB::table('categories')->where('id', $ship->category_id)->first();
                if ($category) {
                    DB::table('ships')->where('id', $ship->id)->update(['type' => $category->name]);
                }
            }
        }

        Schema::table('ships', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
