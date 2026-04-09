<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_menu' => ['type' => 'VARCHAR', 'constraint' => 255],
            'url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'isi_konten' => ['type' => 'LONGTEXT'],
            'penulis' => ['type' => 'VARCHAR', 'constraint' => 25, 'null' => true],
            'thumbnail' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_by' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_date' => ['type' => 'DATETIME'],
            'modified_by' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'modified_date' => ['type' => 'DATETIME', 'null' => true],
            'publish' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '0=draft,1=publish'],
            'publish_date' => ['type' => 'DATETIME', 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 1, 'comment' => '1=aktif,0=tdk_aktif'],
            'pembaca' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
        ]);
        $this->forge->addKey('id_menu', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu', true);
    }
}
