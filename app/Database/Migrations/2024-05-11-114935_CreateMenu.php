<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenu extends Migration
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
            'id_parent' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'nama_menu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'urutan' => [
                'type' => 'int',
                'constraint' => '11',
            ],
            'histori' => [
                'type' => 'text',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
