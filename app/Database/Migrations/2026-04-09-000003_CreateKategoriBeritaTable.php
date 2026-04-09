<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriBeritaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama_kategori' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_by' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_date' => ['type' => 'DATETIME'],
            'modified_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'modified_date' => ['type' => 'DATETIME', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '1=aktif,0=tdk_aktif'],
        ]);
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('kategori_berita');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_berita', true);
    }
}
