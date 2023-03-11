<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttemptsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'attempt_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'question_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'option_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'null'=>false,
            ],
            'session_id'=>[
                'type' => 'INT',
                'constraint' => '11',
                'null'=>false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'delete_at'=>[
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('attempt_id', true);
        $this->forge->createTable('question_attempts');
        $this->forge->addForeignKey('student_id', 'students', 'student_id');
        $this->forge->addForeignKey('option_id', 'options_table', 'option_id');
        $this->forge->addForeignKey('question_id', 'quiz_questions', 'question_id');
        $this->forge->addForeignKey('session_id', 'quiz_sessions', 'session_id');
    }

    public function down()
    {
        $this->forge->dropTable('question_attempts');
    }
}
