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
                'constraint'     => '11',
              ],
            'icon'       => [
              'type'           => 'varchar',
              'constraint'     => '255',
            ],
          ]);
          $this->forge->addKey('id', true);
          $this->forge->createTable('fitur');
    }

    public function down()
    {
        $this->forge->dropTable('fitur');
    }
}
