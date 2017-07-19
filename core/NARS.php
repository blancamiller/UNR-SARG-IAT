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

   
<div id="surveylist" style="padding-right: 10px; padding-left: 20px;  padding-bottom: 20px; border: double;border-width: 2px;background-color:#BABABA; max-width: 700px; margin-right: 25%;">
	<form id="demographics">
    
    <label  class = "labelClass" style="text-align: center;">
		"Please rate much you agree or disagree with the following statements:<br>
        (1: Strongly Disagree, 2: Disagree, 3: Undecided, 4: Agree, 5:Strongly agree) <br>
</label>
        <br>
        <p>
        <form>
        <div id = "NARSQ01">
       <label class="labelClass">
        I would feel uneasy if robots really had emotions.
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
        <p>Something bad might happen if robots developed into living beings.<br>
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
         <p>I would feel relaxed talking with robots.<br>
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
         <p>I would feel uneasy if I was given a job where I had to use robots.<br>
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
         <p>If robots had emotions, I would be able to make friends with them.<br>
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
         <p>I feel comforted being with robots that have emotions.<br>
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
         <p>The word "robot" means nothing to me.<br>
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
         <p>I would feel nervous operating a robot in front of other people.<br>
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
         <p>I would hate the idea that robots or artificial intelligences were making judgements about things.<br>
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
         <p>I would feel very nervous just standing in front of a robot.<br>
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
         <p>I feel that if I depend on robots too much, something bad might happen.<br>
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
         <p>I would feel paranoid talking with a robot.<br>
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
        <p>I am concerned that robots would be a bad influence on children.<br>
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
        <p>I feel that in a future society will be dominated by robots.<br>
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
        </form>
       
        
    <input type="button" value="Submit Questionairre" style="text-align: center;display: block;margin-left: auto;margin-right: auto;" onclick='checkQuestionairre()'/>
    
  </div>     

</body>

<footer>
Please email David Feil-Seifer, Dave@cse.unr.edu, with any questions regarding the study and iatrobotsurvey@gmail.com for assistance with any technical issues.
</footer>