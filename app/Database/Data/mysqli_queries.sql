-- to get questions selected optio and correct option

SELECT quiz_questions.question_id,quiz_questions.question,`question_attempts`.`option_id` as selected_option_id,
(SELECT option_name from options_table WHERE option_id=`question_attempts`.`option_id`)as selected_option_id ,
(SELECT option_id from options_table WHERE question_id=quiz_questions.question_id AND is_correct=1)as correct_opt_id,
(SELECT option_name from options_table WHERE question_id=quiz_questions.question_id AND is_correct=1)as correct_opt_name
FROM `question_attempts`
INNER JOIN quiz_sessions on quiz_sessions.session_id=question_attempts.session_id
INNER JOIN quiz_questions on quiz_questions.question_id=question_attempts.question_id
WHERE quiz_sessions.session_id=3;