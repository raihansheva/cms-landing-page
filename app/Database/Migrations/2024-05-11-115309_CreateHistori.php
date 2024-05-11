<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'aktivitas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'aksi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'waktu' => [
                'type' => 'TIMESTAMP',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('histori');
    }

    public function down()
    {
        $this->forge->dropTable('histori');
    }
}
