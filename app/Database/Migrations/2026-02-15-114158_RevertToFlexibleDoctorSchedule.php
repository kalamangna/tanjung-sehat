<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RevertToFlexibleDoctorSchedule extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('doctors', ['service_start', 'service_end']);
        
        $this->forge->modifyColumn('doctors', [
            'service_days' => [
                'type' => 'TEXT', // Will store JSON
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->addColumn('doctors', [
            'service_start' => ['type' => 'TIME', 'null' => true],
            'service_end'   => ['type' => 'TIME', 'null' => true],
        ]);
    }
}