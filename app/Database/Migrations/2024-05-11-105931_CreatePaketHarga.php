<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaketHarga extends Migration
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
            'nama_paket' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kategori_harga' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'text',
                'constraint' => '',
            ],
            'harga' => [
                'type' => 'int',
                'constraint' => '11',
            ],
            'id_solusi' => [
                'type' => 'int',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('paket_harga');
        $this->forge->addForeignKey('id_solusi', 'solusi', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('paket_harga');
    }
}
