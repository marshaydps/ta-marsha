<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HasilTesTulis extends Migration
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
            'tulis_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'   => true,
            ],
            'filejawaban'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'waktu_pengerjaan'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addkey('id', true);
        $this->forge->addForeignKey('tulis_id', 'tulis', 'id');
        $this->forge->createTable('hasil_tes_tulis');
    }

    public function down()
    {
        $this->forge->dropTable('hasil_tes_tulis');
    }
}
