<html>
<?php
    /*
    //TODO Fix this issue
    if (isset($_SESSION['user'])) {
        //Do nothing
    }
    else {
        //Print "User not logged in";
        die("User not logged in!");

    }
    */
    session_start();
    $con = new mysqli("localhost", "root", "", "wst");
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $query = "Select * from questions";
	$result = $con->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            show_question($row);
            //Print '<script>window.location.assign("question.php");</script>'; // redirects to question.php
            //header("question.php");
        }
    }
    else {
        print "Empty result from DB";
    }


    function show_question ($row) {
        //<h3>  <?php echo $row['question_text'];
        //<script> console.log("In show_question function"); </script>
        $_SESSION['row'] = $row;
        include('question.php');
    }
?>
<script>
function checkAnswer() {
    var options = document.getElementsByName("Options");

    for (var i = 0; i < options.length; i++) {
        if (options[i].checked) {
            // do whatever you want with the checked radio
            var calc = options[i].value;
            var answer = document.getElementById("answer").innerHTML;
            answer = answer.trim();
            console.log('Answer' + answer);
            console.log('Choice' + calc);
            if (calc == answer) {
                document.getElementById("result").innerHTML = "Correct Answer!";
                <?php return; ?>
            }
            else {
                document.getElementById("result").innerHTML = "Wrong Answer!";
                <?php return; ?>
            }
        }
    }
}
</script>
</html>
