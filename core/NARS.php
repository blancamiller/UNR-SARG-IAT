<?php 
require_once("IATname.inc"); 
require_once('locations.php');
?>
<html>
<head>
<title><?php echo $IATname; ?> IAT Survey</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css"> @import "core/css/iat.css";
.labelClass {
    border: 1px rgb(128,227,132);
    min-width: 100%;
}</style> 
<script type="text/javascript" src="core/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="core/js/IAT.js"></script>
<script type="text/javascript" src="core/js/IAT.js"></script>
</head>
<header>
<img src= "core/unr.png"> 
<br>Robotics Implicit Association Test
</header>



<body >

   
<div id="surveylist" style="padding-right: 10px; padding-left: 20px;  padding-bottom: 20px; border: double;border-width: 2px;background-color:#BABABA; ">
	<form id="demographics">
    
    <label  class = "labelClass" style="text-align: center;">
	<strong>	"Please rate much you agree or disagree with the following statements:<br>
        (1: Strongly Disagree, 2: Disagree, 3: Undecided, 4: Agree, 5:Strongly agree) <br>
</strong>
</label>
        <br>
        <p>
        <form>
        <div id = "NARSQ01">
       <label class="labelClass">
        <strong>I would feel uneasy if robots really had emotions.</strong>
        <br>
        <label>
        <input type="radio" name="NARS-Q01" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q01" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q01" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q01" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q01" value="5"/>Strongly Agree
        </label>
        </div>
      </label>
      <div id = "NARSQ02">
        <p><strong>Something bad might happen if robots developed into living beings.</strong><br>
        <label>
        <input type="radio" name="NARS-Q02" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q02" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q02" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q02" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q02" value="5"/>Strongly Agree
        </label>
        </p>
        </div> 
        <div id = "NARSQ03">
         <p><strong>I would feel relaxed talking with robots.</strong><br>
        <label>
        <input type="radio" name="NARS-Q03" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q03" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q03" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q03" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q03" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ04">
         <p><strong>I would feel uneasy if I was given a job where I had to use robots.</strong><br>
        <label>
        <input type="radio" name="NARS-Q04" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q04" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q04" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q04" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q04" value="5"/>Strongly Agree
        </label>
        </p>
        </div> 
        <div id = "NARSQ05">
         <p><strong>If robots had emotions, I would be able to make friends with them.</strong><br>
        <label>
        <input type="radio" name="NARS-Q05" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q05" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q05" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q05" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q05" value="5"/>Strongly Agree
        </label>
        </p>
        </div> 
        <div id = "NARSQ06">
         <p><strong>I feel comforted being with robots that have emotions.</strong><br>
        <label>
        <input type="radio" name="NARS-Q06" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q06" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q06" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q06" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q06" value="5"/>Strongly Agree
        </label>
        </p>
        </div> 
        <div id = "NARSQ07">
         <p><strong>The word "robot" means nothing to me.</strong><br>
        <label>
        <input type="radio" name="NARS-Q07" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q07" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q07" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q07" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q07" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ08">
         <p><strong>I would feel nervous operating a robot in front of other people</strong>.<br>
        <label>
        <input type="radio" name="NARS-Q08" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q08" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q08" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q08" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q08" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ09">
         <p><strong>I would hate the idea that robots or artificial intelligences were making judgements about things.</strong><br>
        <label>
        <input type="radio" name="NARS-Q09" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q09" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q09" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q09" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q09" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ10">
         <p><strong>I would feel very nervous just standing in front of a robot.</strong><br>
        <label>
        <input type="radio" name="NARS-Q10" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q10" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q10" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q10" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q10" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ11">
         <p><strong>I feel that if I depend on robots too much, something bad might happen.</strong><br>
        <label>
        <input type="radio" name="NARS-Q11" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q11" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q11" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q11" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q11" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ12">
         <p><strong>I would feel paranoid talking with a robot.</strong><br>
        <label>
        <input type="radio" name="NARS-Q12" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q12" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q12" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q12" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q12" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ13">
        <p><strong>I am concerned that robots would be a bad influence on children.</strong><br>
        <label>
        <input type="radio" name="NARS-Q13" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q13" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q13" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q13" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q13" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ14">
        <p><strong>I feel that in a future society will be dominated by robots.</strong><br>
        <label>
        <input type="radio" name="NARS-Q14" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q14" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q14" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q14" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q14" value="5"/>Strongly Agree
        </label>
        </p> 
        </div>
        <div id = "NARSQ15">
        <p><strong>Please tell me whether you are interested, moderatley interested, or not at all interested in scientific discoveries and technological developments.</strong><br>
        <label>
        <input type="radio" name="NARS-Q15" value="1">Not at all interested
        </label>
        <label>
        <input type="radio" name="NARS-Q15" value="2"/>Interested very little
        </label>
        <label>
        <input type="radio" name="NARS-Q1" value="3"/>Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q15" value="4"/>Moderatley interested
        </label>
        <label>
        <input type="radio" name="NARS-Q15" value="5"/>Very Interested
        </label>
        </p> 
        </div>
        <div id = "NARSQ16">
        <p><strong>Generally speaking, what is your opinion of robots?</strong><br>
        <label>
        <input type="radio" name="NARS-Q16" value="1"/>Very Negative
        </label>
        <label>
        <input type="radio" name="NARS-Q16" value="2"/>Negative
        </label>
        <label>
        <input type="radio" name="NARS-Q16" value="3">/Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q16" value="4"/>Positive
        </label>
        <label>
        <input type="radio" name="NARS-Q16" value="5"/>Very positive
        </label>
        </p> 
        </div>
        <div id = "NARSQ17">
        <p><strong>Please rate to what extent you agree or disagree with each of the following statements about robots.</strong><br>
        <p> a. Robots are a good thing for society because they help people.
        <br>
        <label>
     <input type="radio" name="NARS-Q17" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q17" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q17" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q17" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q17" value="5"/>Strongly Agree
        </label>
        </p>
        <div id = "NARSQ18">
        <p> b. Robots steal people's jobs.
        <br> 
        <label>
        <input type="radio" name="NARS-Q18" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q18" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q18" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q18" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q18" value="5"/>Strongly Agree
        </label>
        </p>
        </div>
        <div id = "NARSQ19">
        <p> c.Robots are necessary as they can do jobs that are too hard or too dangerous for people.
        <br>
        <label>
        <input type="radio" name="NARS-Q19" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q19" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q19" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q19" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q19" value="5"/>Strongly Agree
        </label>
        </p>
        
        </div>
        <div id = "NARSQ20">
        <p> d. Robots are a form of technology that requires careful management.
        <br>
        <label>
        <input type="radio" name="NARS-Q20" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q20" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q20" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q20" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q20" value="5"/>Strongly Agree
        </label>
        </p>

        </div>
        <div id = "NARSQ21">
        <p> e. Widespread use of robots can boost job oppurtunities.
        <br>
        <label>
        <input type="radio" name="NARS-Q21" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q21" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="NARS-Q21" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="NARS-Q21" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="NARS-Q21" value="5"/>Strongly Agree
        </label>
        </p>
        </p> 
        </div>
        <div id = "NARSQ22">
        <p><strong>The list below describes tasks that could be done by robots. Please rate your level of comfort with each task.</strong><br>
        <p> a. Having a medical operation performed on you by a robot.    <br>
        <label>
        <input type="radio" name="NARS-Q22" value="1"/>Very Uncomfortable
                </label>
        <label>
        <input type="radio" name="NARS-Q22" value="2"/>Uncomfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q22" value="3"/>Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q22" value="4"/>Comfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q22" value="5"/>Very Comfortable
        </label>
        </p>

        </div>
        <div id = "NARSQ23">
        <p> b. Having your dog walked by a robot<br>
        <label>
        <input type="radio" name="NARS-Q23" value="1"/>Very Uncomfortable
                </label>
        <label>
        <input type="radio" name="NARS-Q23" value="2"/>Uncomfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q23" value="3"/>Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q23" value="4"/>Comfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q23" value="5"/>Very Comfortable
        </label>
        </p>

        </div>
        <div id = "NARSQ24">
        <p> c. Having a robot assist you at work(e.g in manufacturing).    <br>
        <label>
        <input type="radio" name="NARS-Q24" value="1"/>Very Uncomfortable
                </label>
        <label>
        <input type="radio" name="NARS-Q24" value="2"/>Uncomfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q24" value="3"/>Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q24" value="4"/>Comfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q24" value="5"/>Very Comfortable
        </label>
        </p>

        </div>
        <div id = "NARSQ25">
        <p> d. Having your children or elderly parent minded by a robot.    <br>
        <label>
        <input type="radio" name="NARS-Q25" value="1"/>Very Uncomfortable
                </label>
        <label>
        <input type="radio" name="NARS-Q25" value="2"/>Uncomfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q25" value="3"/>Indifferent
        </label>
        <label>
        <input type="radio" name="NARS-Q25" value="4"/>Comfortable
        </label>
        <label>
        <input type="radio" name="NARS-Q25" value="5"/>Very Comfortable
        </label>
        </p>
        </p> 
        </div>
        </form>
       
        
    <input type="button" value="Submit Questionairre" style="text-align: center;display: block;margin-left: auto;margin-right: auto;" onclick='checkQuestionairre()'/>
    
  </div>     

</body>

<footer>
Please email David Feil-Seifer, Dave@cse.unr.edu, with any questions regarding the study and iatrobotsurvey@gmail.com for assistance with any technical issues.
</footer>