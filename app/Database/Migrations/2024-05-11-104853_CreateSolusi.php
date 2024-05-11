<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSolusi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
              'type'           => 'INT',
              'constraint'     => 5,
              'unsigned'       => true,
              'auto_increment' => true,
            ],
            'nama_solusi'       => [
              'type'           => 'VARCHAR',
              'constraint'     => '255',
            ],
            'deskripsi'       => [
              'type'           => 'text',
              'constraint'     => '',
            ],
            'gambar'       => [
              'type'           => 'varchar',
              'constraint'     => '255',
            ],
          ]);
          $this->forge->addKey('id', true);
          $this->forge->createTable('solusi');
    }

    public function down()
    {
        $this->forge->dropTable('solusi');
    }
}
