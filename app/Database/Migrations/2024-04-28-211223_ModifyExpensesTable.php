<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyExpensesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('expenses', [
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('expenses', 'title');
    }
}
