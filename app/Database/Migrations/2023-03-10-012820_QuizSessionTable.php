<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuizSessionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'session_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'student_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'started_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'ended_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'score' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'is_completed' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('session_id', true);
        $this->forge->addForeignKey('student_id', 'students_table', 'student_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('quiz_sessions');
    }

    public function down()
    {
        $this->forge->dropTable('quiz_sessions');
    }
}
