<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'buku_id' => [
                'type'           => 'INT',
                'constraint'     => 64,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nm_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'harga' => [
                'type' => 'INT',
            ],
            'stok' => [
                'type' => 'INT',
            ],
            'penerbit_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('buku_id', true);
        $this->forge->addForeignKey('penerbit_id', 'tb_penerbit', 'penerbit_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_buku');
    }

    public function down()
    {
        $this->forge->dropTable('tb_buku');
    }
}
