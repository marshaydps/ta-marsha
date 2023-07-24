<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengaturanTes extends Migration
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
            'waktu_pengerjaan_tes_kepribadian' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'waktu_pengerjaan_tes_tulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaturan_tes');
    }

    public function down()
    {
        $this->forge->dropTable('pengaturan_tes');
    }
}
