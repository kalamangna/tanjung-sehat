<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        // Roles Table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 50],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // Add role_id to users
        $fields = [
            'role_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'after' => 'id', 'null' => true],
        ];
        $this->forge->addColumn('users', $fields);
        
        // Add Foreign Key (Manual query to avoid forge limitations in some drivers)
        // If MySQL:
        if ($this->db->getPlatform() === 'MySQLi') {
            $this->db->query('ALTER TABLE users ADD CONSTRAINT fk_user_role FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL ON UPDATE CASCADE');
        }
    }

    public function down()
    {
        if ($this->db->getPlatform() === 'MySQLi') {
            $this->db->query('ALTER TABLE users DROP FOREIGN KEY fk_user_role');
        }
        $this->forge->dropColumn('users', 'role_id');
        $this->forge->dropTable('roles');
    }
}
