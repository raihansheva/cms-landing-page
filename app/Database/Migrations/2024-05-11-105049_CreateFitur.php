<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFitur extends Migration
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
            'nama_fitur'       => [
              'type'           => 'VARCHAR',
              'constraint'     => '255',
            ],
            'deskripsi'       => [
                'type'           => 'text',
                'constraint'     => '',
            ],
            'id_solusi'       => [
                'type'           => 'int',
                'constraint'     => 5,
              ],
            'icon'       => [
              'type'           => 'varchar',
              'constraint'     => '255',
            ],
          ]);
          $this->forge->addKey('id', true);
          $this->forge->createTable('fitur');
          $this->forge->addForeignKey('id_solusi', 'solusi', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('fitur');
    }
}
