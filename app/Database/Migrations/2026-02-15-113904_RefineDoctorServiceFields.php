<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RefineDoctorServiceFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('doctors', [
            'service_start' => [
                'type' => 'TIME',
                'null' => true,
                'after' => 'service_days'
            ],
            'service_end' => [
                'type' => 'TIME',
                'null' => true,
                'after' => 'service_start'
            ],
        ]);

        $this->forge->modifyColumn('doctors', [
            'service_days' => [
                'type' => 'TEXT', // Better for stored serialized/comma-separated days
                'null' => true,
            ],
        ]);

        if ($this->db->fieldExists('service_hours', 'doctors')) {
            $this->forge->dropColumn('doctors', 'service_hours');
        }
    }

    public function down()
    {
        $this->forge->dropColumn('doctors', ['service_start', 'service_end']);
        $this->forge->addColumn('doctors', [
            'service_hours' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
    }
}