<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HasilTesKepribadian extends Migration
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
            'nama_peserta' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'nilai' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'waktu_pengerjaan' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addkey('id', true);
        $this->forge->createTable('hasil_tes_kepribadian');
    }

    public function down()
    {
        $this->forge->dropTable('hasil_tes_kepribadian');
    }
}
