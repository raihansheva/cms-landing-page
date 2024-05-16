<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeaderArtikel extends Migration
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
            'judul_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('headerartikel');
    }

    public function down()
    {
        $this->forge->dropTable('headerartikel');
    }
}
