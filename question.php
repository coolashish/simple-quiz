    <?php
        session_start();
        $row = $_SESSION['row'];
     ?>
            <form>
                    <p> <?php echo $row['question_text']; ?> </p>
                    <input type="radio" name="Options" value= "1" /> <?php echo $row["option_1"]; ?> <br/>
                    <input type="radio" name="Options" value= "2"/>  <?php echo $row['option_2']; ?><br/>
                    <input type="radio" name="Options" value= "3" />  <?php echo $row['option_3']; ?><br/>
                    <input type="radio" name="Options" value= "4"/> <?php echo $row['option_4']; ?><br/>
                    <p id="answer" hidden> <?php echo $row["answer_option"]; ?></p>
                    <input id="submit" type="button" value="Submit"/>
                    <p id="result"> </p>
                    <br/>
                    <script>
                    console.log("In script tag");
                    document.getElementById("submit").addEventListener("click", checkAnswer, false);

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
                                    //<?php return; ?>
                                }
                                else {
                                    document.getElementById("result").innerHTML = "Wrong Answer!";
                                    //<?php return; ?>
                                }
                            }
                        }
                    }
                    </script>
            </form>
