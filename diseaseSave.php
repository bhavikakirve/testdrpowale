<?php
    include("sessions.php");
    include "config/connect.php";
    include "header.php";
    
    //Select max symptom Id from sympmtoms
    
//     

    
    $symptomId = mysql_fetch_array(mysql_query("select max(`symtom_id`) as sId from symtoms"));
    $nxtSymptomId = $symptomId['sId'] + 1;
    
    $adduser = mysql_query("insert into symtoms(symtom_id, 	symtom, gender_dependable, symptom_type) values ('".$nxtSymptomId."','".$_POST['name']."','"."','".$_POST['sType']."')");
    
    
    $totQuestion = $_POST['totQuestion'];
    
    for($i=1;$i<=$totQuestion;$i++) {
        $questionId = mysql_fetch_array(mysql_query("select max(`question_id`) as qId from questions"));
        $nxtQuestId = $questionId['qId'] + 1;
        $question = (isset($_POST["question_".$i]) && !empty($_POST["question_".$i])) ? $_POST["question_".$i] : "";
        $totSubQuestion = (isset($_POST["question_".$i."_subquest"]) && !empty($_POST["question_".$i."_subquest"])) ? $_POST["question_".$i."_subquest"]: "0";
        if(isset($i)) {
//             $addQuestion = mysql_query("insert into questions(question_id, symtom_id, parent_qid, question, medicine, medicine_duration, failure, created_by, 
//                 created_on,flower,medicine_copy1,medicine_copy2,flower_flag ) values ('".$nxtSymptomId."','".$nxtSymptomId."','0','".$_POST['question_'".$i.']."')");

            $addQuestion = mysql_query("INSERT INTO  questions (question_id ,symtom_id , parent_qid, question, medicine , medicine_duration , failure , created_by , created_on , flower, medicine_copy1 , medicine_copy2 ,flower_flag
                )  VALUES ('".$nxtQuestId."', '".$nxtSymptomId."',  '0', '".$question."',  '',  '',  '',  '1', CURRENT_TIMESTAMP ,  '',  '',  '',  '')");
            
            if($totSubQuestion > 0) {
                for($j=1;$j<=$totSubQuestion;$j++) {
                    $questSubId = mysql_fetch_array(mysql_query("select max(`question_id`) as qId from questions"));
                    $nxtSubQuestId = $questSubId['qId'] + 1;
                    $subQuestion = (isset($_POST["questionsub_".$i."_".$j]) && !empty($_POST["questionsub_".$i."_".$j])) ? $_POST["questionsub_".$i."_".$j] : "";
                    $medicine = (isset($_POST["quest_".$i."_medicine_".$j]) && !empty($_POST["quest_".$i."_medicine_".$j])) ? $_POST["quest_".$i."_medicine_".$j] : "";
                    $medDuration = (isset($_POST["quest_".$i."_medDuration_".$j]) && !empty($_POST["quest_".$i."_medDuration_".$j])) ? $_POST["quest_".$i."_medDuration_".$j] : "";
                    $medFlower = (isset($_POST["quest_".$i."_flower_".$j]) && ($_POST["quest_".$i."_flower_".$j] == "on")) ? $_POST["quest_".$i."_flower_".$j] : "";
                    
                    $addSubQuest = mysql_query("INSERT INTO  questions (question_id ,symtom_id , parent_qid, question, medicine , medicine_duration , failure , created_by , created_on , flower, medicine_copy1 , medicine_copy2 ,flower_flag
                       )  VALUES ('".$nxtSubQuestId."', '".$nxtSymptomId."',  '".$nxtQuestId."', '".$subQuestion."',  '".$medicine."',  '".$medDuration."',  'Alpha',  '1', CURRENT_TIMESTAMP ,  '',  '',  '',  '".$medFlower."')");
                }
            }
                
        }
    }
    
    header ("Location:diseases.php");
?>