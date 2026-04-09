<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailBeritaKategoriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_news_kategori' => ['type' => 'VARCHAR', 'constraint' => 255],
            'id_news' => ['type' => 'VARCHAR', 'constraint' => 255],
            'id_kategori' => ['type' => 'VARCHAR', 'constraint' => 255],
        ]);
        $this->forge->addKey('id_news_kategori', true);
        $this->forge->createTable('detail_berita_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('detail_berita_kategori', true);
    }
}
