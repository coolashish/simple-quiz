<html>
<h1> Welcome to the quiz ! </h1>
<body bgcolor="#76b852">
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        //Do nothing
    }
    else {
        //Print "User not logged in";
        die("User not logged in!");

    }
    //session_start();
    $con = new mysqli("localhost", "root", "", "wst");
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $query = "Select * from questions";
    $result = $con->query($query);
    $question_count = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>
            <form id="<?php echo "form" . $question_count; ?>">
                <span> <?php echo 'Subject: ' . $row['subject']; ?> </span>
                <p> <?php echo $row['question_text']; ?> </p>
                <input type="radio" name="Options" value= "1" /> <?php echo $row["option_1"]; ?> <br/>
                <input type="radio" name="Options" value= "2"/>  <?php echo $row['option_2']; ?><br/>
                <input type="radio" name="Options" value= "3" />  <?php echo $row['option_3']; ?><br/>
                <input type="radio" name="Options" value= "4"/> <?php echo $row['option_4']; ?><br/>
                <p id="<?php echo "answer" . $question_count; ?>"  hidden> <?php echo $row["answer_option"]; ?></p>
                <script> console.log("<?php echo "form" . $question_count ?>"); </script>
                <input id="submit" type="button" value="Submit" onclick="checkAnswer('<?php echo $question_count; ?>');"/>
                <p id="<?php echo "result" . $question_count; ?>"> </p>
                <?php $question_count++; ?>
            </form>

<?php
        }
    }
    else {
        print "Empty result from DB";
    }
 ?>
 </body>
 <script>
         function checkAnswer(id) {
             var question = document.getElementById("form" + id);
             console.log(question);
             console.log("id=" + id);
             //var options = question.getElementsByName("Options");
             var options = question.querySelectorAll('[name=Options]');

             for (var i = 0; i < options.length; i++) {
                 if (options[i].checked) {
                     // do whatever you want with the checked radio
                     var calc = options[i].value;
                     calc = parseInt(calc);
                     //var answer = question.getElementsByName("answer").innerHTML;
                     //var answer = question.querySelectorAll('[name=answer]');
                     var answer = document.getElementById("answer" + id).innerHTML;
                     answer = parseInt(answer);

                     //answer = answer.trim();
                     console.log('Answer' + answer);
                     console.log('Choice' + calc);
                     if (calc == answer) {
     //                    question.getElementsByName("result").innerHTML = "Correct Answer!";
                         document.getElementById('result' + id).style.color = 'green';
                         document.getElementById('result' + id).innerHTML = "Congratulations, Correct Answer!";

                     }
                     else {
     //                    question.getElementByName("result").innerHTML = "Wrong Answer!";
                         document.getElementById('result' + id).style.color = 'red';
                         document.getElementById('result' + id).innerHTML = "Oops, Wrong Answer!";
                     }
                 }
             }
         }

 </script>
 </html>
