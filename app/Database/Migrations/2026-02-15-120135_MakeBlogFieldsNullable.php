<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MakeBlogFieldsNullable extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('blogs', [
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('blogs', [
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'summary' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
    }
}