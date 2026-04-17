<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAplikasiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aplikasi' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama_aplikasi' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'icon_aplikasi' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'link_aplikasi' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
            'urutan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'created_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_date' => ['type' => 'DATETIME', 'null' => true],
            'modified_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'modified_date' => ['type' => 'DATETIME', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => '1', 'comment' => '1=aktif,0=tdk_aktif'],
        ]);
        $this->forge->addKey('id_aplikasi', true);
        $this->forge->createTable('aplikasi');
    }

    public function down()
    {
        $this->forge->dropTable('aplikasi', true);
    }
}
