<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kepribadian extends Migration
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
            'nomor_soal' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'soal' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jawaban1' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jawaban2' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jawaban3' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'jawaban4' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'jawaban_benar'       => [
                'type'       => 'ENUM',
                'constraint' => ['jawaban1', 'jawaban2', 'jawaban3', 'jawaban4'],
            ],
            'nilai'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'default' => 5
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kepribadian');
    }

    public function down()
    {
        $this->forge->dropTable('kepribadian');
    }
}
