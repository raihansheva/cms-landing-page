<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutUs extends Migration
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
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'text',
                'constraint' => '',
            ],
            'misi' => [
                'type' => 'text',
                'constraint' => '',
            ],
            'visi' => [
                'type' => 'text',
                'constraint' => '',
            ],
            'histori' => [
                'type' => 'text',
                'constraint' => '',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('about_us');
    }

    public function down()
    {
        $this->forge->dropTable('about_us');
    }
}
