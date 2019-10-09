<div class="container-fluid">
    <div class="row">
        
        <?php 
            include("model/database.php");
       
       
       ?>
        <div class="col-md-12 p-5 text-right">
            <h2 id="time" class="text-danger"></h2>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 p-5" id="test">

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

<script>

//SOurce: W3Schools
// Set the date we're counting down to
var countDownDate = new Date().getTime() + <?php echo(Test::getRow($test_id)['test_max_mins']); ?> * 60 * 1000;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("time").innerHTML =  minutes + ":" + seconds ;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    document.getElementById("time").innerHTML = "Completed";
    clearInterval(x);
    submit();
  }
}, 1000);


function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}


<?php
    $array = Question::questionsForTest($test_id);
    for($i=0;$i<count($array);$i++)
    {
        
        $array[$i]["answers"] = array();
    }for($i=0;$i<count($array);$i++)
    {
        $qid =$array[$i]["question_id"];

        $answers  = Answer::answersForQuestion($qid);
        //var_dump($answers);
        for($j=0;$j<count($answers);$j++)
        {
            $array[$i]["answers"][] = $answers[$j]["answer"];
        }
        //$array[$i]["answers"][] = $answers["answer_id"];
    }


?>
    var questions = shuffle(<?php echo(json_encode($array)); ?>);

        var questions_container = "<div id='questions-container'></div>"
        $("#test").append(questions_container);

        for(var i=0;i<questions.length;i++)
        {
            var question= "<div id='question"+i+"' class='question'></div>"
            $("#questions-container").append(question);
            
            var questionText = "<h3 id='question-text'>Q."+(i+1)+" "+questions[i]["question"]+"</h3>";
            $("#question"+i).append(questionText);

            var answers = "<div id='answer"+i+"'></div>";
            $("#question"+i).append(answers);

            for(var j =0;j<questions[i]["answers"].length;j++)
            {
                console.log();
                var answerOption = "<input type='checkbox'  class='answerfor"+i+"' ; id='answerfor"+i+j+"' name='answerfor'"+i+"/> <label for='answerfor"+i+j+"'>"+questions[i]["answers"][j]+"</label><br/>"
                $("#answer"+i).append(answerOption);
            
            }
            var nextButton = "<button class='btn btn-success'onclick='openNext(this)' id='next"+i+"'>Next</button";
            $("#question"+i).append(nextButton);

            $("#question"+i).hide(); 
     }
     $("#question0").slideDown();

     $("#next"+(questions.length-1)).text("Submit");
     result = []

     function submit()
     {
         $.ajax(
             {
                 url:'controller/check-test.php',
                 method:'GET',
                 data:{
                     testId:<?php echo($test_id); ?>,
                     result:result,
                 },
                 success:function(data){
                     console.log(data);
                    window.location.href=".?action=results&test-id=<?php echo($test_id);?>";
                 },
                 error:function(){
                    alert("Internal Server Error");  
                 },

             }
         );
     }
     function openNext(element)
     {
         var num = parseInt(element.id.substring(4));
         if(num==questions.length-1)
         {
            if(isAnswered(num))
             {

                var object = {
                    questionId:questions[num]['question_id'],
                    answers:getAnswerIDs(getAnswerIndices(num),num),
                };

                result.push(object);
                
                
                
                submit();
             }
             else
             {
                 alert("Please Answer This Question First");
             }  
         }
         
         else{

             if(isAnswered(num))
             {

                var object = {
                    questionId:questions[num]['question_id'],
                    answers:getAnswerIDs(getAnswerIndices(num),num),
                };

                result.push(object);

                
             
                $("#question"+(num)).slideUp();
                $("#question"+(num+1)).slideDown();
             }
             else
             {
                 alert("Please Answer This Question First");
             }
         }
     }
     function getAnswerIDs(answers, num)
     {
        var returner = []
         for(i =0;i<answers.length;i++)
         {
            returner.push(questions[num]['answers'][answers[i]]);
         }
         return returner;
     }
     function getAnswerIndices(num)
     {
            var array = document.getElementsByClassName("answerfor"+num);
            //console.log(array);
            returner = [];
          
            for(var i=0;i<array.length;i++)
            {
                if($("#"+array[i].id).is(":checked"))
                {
                    returner.push(i);// = i;
                }
            }
            return returner;
     }
     
     function isAnswered(num)
     {
            var array = document.getElementsByClassName("answerfor"+num);
            //console.log(array);
            returner = false;
          
            for(var i=0;i<array.length;i++)
            {
                if($("#"+array[i].id).is(":checked"))
                {
                    returner = true;
                }
            }
            return returner;
     }

</script>