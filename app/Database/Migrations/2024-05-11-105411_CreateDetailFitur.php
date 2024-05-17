<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailFitur extends Migration
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
            'judul_detail'       => [
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
            'id_fitur'       => [
                'type'           => 'int',
                'constraint'     => 5,
              ],
            
          ]);
          $this->forge->addKey('id', true);
          $this->forge->createTable('detail_fitur');
          $this->forge->addForeignKey('id_fitur', 'fitur', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('detail_fitur');
    }
}
