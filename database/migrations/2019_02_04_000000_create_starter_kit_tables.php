<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarterKitTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::create('tenants', function (Blueprint $table) {
        $table->id();
        $table->string('tenant_name');
        $table->string('tenant_domain');
        $table->string('tenant_description')->nullable()->defaul(null);
        $table->timestamps();
      });

      Schema::create('tenant_relationships', function (Blueprint $table) {
        $table->id();
        $table->string('model_type');
        $table->integer('model_id')->unsigned()->default(0);
        $table->integer('tenant_id')->unsigned()->default(0);
        $table->timestamps();
      });

      Schema::create('terms', function (Blueprint $table) {
        $table->id();
        $table->string('name')->index();
        $table->string('slug')->unique();
        $table->integer('term_group')->default(0);
        $table->timestamps();
      });

      Schema::create('term_metas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('term_id')->default(0);
        $table->string('meta_key')->nullable()->default(null);
        $table->longText('meta_value')->nullable()->default(null);
        $table->timestamps();
      });

      Schema::create('term_taxonomies', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('term_id')->default(0);
        $table->string('taxonomy', 32);
        $table->longText('description')->nullable()->default(null);
        $table->bigInteger('parent')->default(0);
        $table->bigInteger('count')->default(0);
        $table->timestamps();
      });

      Schema::create('term_relationships', function (Blueprint $table) {
        $table->id();
        $table->string('model_type')->nullable()->default(null);
        $table->unsignedInteger('model_id')->default(0);
        $table->unsignedInteger('term_taxonomy_id')->default(0);
        $table->integer('term_order')->default(0);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::dropIfExists('tenants');
      Schema::dropIfExists('tenant_relationships');
      
      Schema::dropIfExists('terms');
      Schema::dropIfExists('term_metas');
      Schema::dropIfExists('term_taxonomies');
      Schema::dropIfExists('term_relationships');
    }
  }