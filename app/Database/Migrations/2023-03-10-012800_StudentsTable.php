<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'student_id'=> [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'student_name'=>[
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique'=>true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'=>[
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('student_id');
        $this->forge->createTable('students_table');
    }

    public function down()
    {
        $this->forge->dropTable('student_table');
    }
}
