<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKontak extends Migration
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
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'text',
                'constraint' => '',
            ],
            'nomor_telepon' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'link_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_instagram' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kontak');
    }

    public function down()
    {
        $this->forge->dropTable('kontak');
    }
}
