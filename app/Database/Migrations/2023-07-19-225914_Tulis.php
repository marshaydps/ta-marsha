<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tulis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'teks' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tulis');
    }

    public function down()
    {
        $this->forge->dropTable('tulis');
    }
}
