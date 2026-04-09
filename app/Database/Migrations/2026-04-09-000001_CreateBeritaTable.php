<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => ['type' => 'VARCHAR', 'constraint' => 255],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'deskripsi' => ['type' => 'VARCHAR', 'constraint' => 255],
            'isi_konten' => ['type' => 'TEXT'],
            'penulis' => ['type' => 'VARCHAR', 'constraint' => 255],
            'thumbnail' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'src_image_lama' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_by' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_date' => ['type' => 'DATETIME'],
            'modified_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'modified_date' => ['type' => 'DATETIME', 'null' => true],
            'publish' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '0=draft,1=publish'],
            'publish_date' => ['type' => 'DATETIME', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '1=aktif,0=tdk_aktif'],
            'pembaca' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'rating' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita', true);
    }
}
