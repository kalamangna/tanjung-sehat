<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropServiceContentAndRestoreDescription extends Migration
{
    public function up()
    {
        // We keep 'content' for now but we ensure 'description' is used
        $this->forge->modifyColumn('services', [
            'description' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('services', [
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }
}