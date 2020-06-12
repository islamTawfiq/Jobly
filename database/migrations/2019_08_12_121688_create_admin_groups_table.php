<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();

            $table->enum('settings_show', [0, 1])->default(0);
            $table->enum('settings_edit', [0, 1])->default(0);

            $table->enum('agencies_show', [0, 1])->default(0);
            $table->enum('agencies_add', [0, 1])->default(0);
            $table->enum('agencies_edit', [0, 1])->default(0);
            $table->enum('agencies_delete', [0, 1])->default(0);

            $table->enum('brokers_show', [0, 1])->default(0);
            $table->enum('brokers_add', [0, 1])->default(0);
            $table->enum('brokers_edit', [0, 1])->default(0);
            $table->enum('brokers_delete', [0, 1])->default(0);

            $table->enum('skills_show', [0, 1])->default(0);
            $table->enum('skills_add', [0, 1])->default(0);
            $table->enum('skills_edit', [0, 1])->default(0);
            $table->enum('skills_delete', [0, 1])->default(0);

            $table->enum('nannies_show', [0, 1])->default(0);
            $table->enum('nannies_add', [0, 1])->default(0);
            $table->enum('nannies_edit', [0, 1])->default(0);
            $table->enum('nannies_delete', [0, 1])->default(0);

            $table->enum('admins_show', [0, 1])->default(0);
            $table->enum('admins_add', [0, 1])->default(0);
            $table->enum('admins_edit', [0, 1])->default(0);
            $table->enum('admins_delete', [0, 1])->default(0);

            $table->enum('about_show', [0, 1])->default(0);
            $table->enum('about_add', [0, 1])->default(0);
            $table->enum('about_edit', [0, 1])->default(0);
            $table->enum('about_delete', [0, 1])->default(0);

            $table->enum('contact_show', [0, 1])->default(0);
            $table->enum('contact_add', [0, 1])->default(0);
            $table->enum('contact_edit', [0, 1])->default(0);
            $table->enum('contact_delete', [0, 1])->default(0);

            $table->enum('terms_show', [0, 1])->default(0);
            $table->enum('terms_add', [0, 1])->default(0);
            $table->enum('terms_edit', [0, 1])->default(0);
            $table->enum('terms_delete', [0, 1])->default(0);

            $table->enum('admin_groups_show', [0, 1])->default(0);
            $table->enum('admin_groups_add', [0, 1])->default(0);
            $table->enum('admin_groups_edit', [0, 1])->default(0);
            $table->enum('admin_groups_delete', [0, 1])->default(0);

            $table->enum('icons_show', [0, 1])->default(0);
            $table->enum('icons_add', [0, 1])->default(0);
            $table->enum('icons_edit', [0, 1])->default(0);
            $table->enum('icons_delete', [0, 1])->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_groups');
    }
}
