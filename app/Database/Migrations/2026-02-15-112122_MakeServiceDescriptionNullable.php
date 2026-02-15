<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeServiceDescriptionNullable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('services', [
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('services', [
            'description' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
    }
}