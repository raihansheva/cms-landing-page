<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeaderAboutUs extends Migration
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
            'judul_banner' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'constraint' => '',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('headeraboutus');
    }

    public function down()
    {
        $this->forge->dropTable('headeraboutus');
    }
}
