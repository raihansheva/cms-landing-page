<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBenefit extends Migration
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
            'nama_benefit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('benefit');
    }

    public function down()
    {
        $this->forge->dropTable('benefit');
    }
}