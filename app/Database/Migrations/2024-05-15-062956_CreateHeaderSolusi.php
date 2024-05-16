<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeaderSolusi extends Migration
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
            'judul_solusi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'text',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('headersolusi');
    }

    public function down()
    {
        $this->forge->dropTable('headersolusi');
    }
}
