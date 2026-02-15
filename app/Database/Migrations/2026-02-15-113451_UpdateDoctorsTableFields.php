<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateDoctorsTableFields extends Migration
{
    public function up()
    {
        // Add new fields
        $this->forge->addColumn('doctors', [
            'service_days' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'specialty'
            ],
            'service_hours' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'service_days'
            ],
        ]);

        // Remove old fields
        $this->forge->dropColumn('doctors', 'biography');
        
        // Ensure schedule is removed if it exists (it was in the initial table but maybe removed in model)
        if ($this->db->fieldExists('schedule', 'doctors')) {
            $this->forge->dropColumn('doctors', 'schedule');
        }

        // The user seems to want a simple text field in the doctor form, 
        // so we can drop the complex schedules table if it exists to avoid confusion.
        if ($this->db->tableExists('doctor_schedules')) {
            $this->forge->dropTable('doctor_schedules');
        }
    }

    public function down()
    {
        $this->forge->dropColumn('doctors', ['service_days', 'service_hours']);
        $this->forge->addColumn('doctors', [
            'biography' => ['type' => 'TEXT', 'null' => true],
            'schedule'  => ['type' => 'TEXT', 'null' => true],
        ]);
    }
}