<!DOCTYPE HTML>
<html>
<head>
<title>Introduction to PHP</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
echo "<h1>Welcome to PHP</h1>";

/*
1.
a) Upload this page to the selene web server. View the page in a browser. Make sure you can see the welcome message.
b) Modify the message so that it appears as a <h1> heading.
*/


/*
2. Uncomment the following three PHP variables.
a) Using these variables and a PHP echo statement output the message 'Hi Fred. Your favourite colour is red. Your favourite website is http://www.hud.ac.uk.'
b) Use HTML <em> tags to italicise the word Fred.
c) Use an HTML anchor element to make the text http://www.hud.ac.uk into an actual hyperlink that links to the University homepage. Again, this should all be done using a PHP echo statement.
*/

 $name = "Fred";
 $colour = "red";
 $url="http://www.hud.ac.uk";

 echo "<p>Hi <em>{$name}</em>. Your favourite colour is {$colour}. Your favourite website is <a href='{$url}'>{$url}</a>.</p>";
/*
3. Uncomment following two PHP variables.
a) Create a third variable, name it $total. $total should be assigned a value that is the sum of $num1 and $num2. Using these variables and a PHP echo output the value of $total e.g. '10 + 20 = 30'
b) Create another variable, call it $average. $average should be assigned a value that is the mean average of $num1 and $num2. Again, use a PHP echo statement to output the value of $average.
*/

 $num1 = 10;
 $num2 = 20;
 
 $total = $num1 + $num2;
 echo "<p>{$num1} + {$num2} = {$total}</p>";
 
 $average = ($num1 + $num2) / 2;
 echo "<p>The average of {$num1} and {$num2} is {$average}</p>";
 
/*
4. Uncomment following three PHP variables.
The variables $assign1, $assign2 and $assign3 store the marks out of 100 for a student for three different assignments. Assignment 1 has a weighting of 40%, Assignment 2 has a weighting of 25% and Assignment 3 has a weighting of 35%. Create another PHP variable called $overall. Using PHP mathematical operators, calculate an overall mark for the student and assign this value to the variable $overall. Use an echo statement to print this mark into the HTML page.
*/

 $assign1 = 56;
 $assign2 = 78;
 $assign3 = 68;
 
 $overall = ($assign1 * 0.4) + ($assign2 * 0.25) + ($assign3 * 0.35);
 echo "<p>The overall mark for the student is {$overall}</p>";

/*
5.
a) In order to pass a module students must get an overall mark that is greater or equal to 40. Write a PHP if statement that will test if $overall is greater than or equal to 40. If it is, use an echo statement to output "passed". If it isn't use an echo statement to output "failed"
b) Write another if statement. This time it should test the value of $overall and output if the student has an A, B, C, D etc.
*/
$status = "";
if($overall >= 40) $status = "passed";
else $status = "failed";
echo "<p>Status: {$status}</p>";

$grade = "";
if($overall < 35) $grade = "F";
else if($overall >= 35 && $overall < 40) $grade = "E";
else if($overall >= 40 && $overall < 50) $grade = "D";
else if($overall >= 50 && $overall < 65) $grade = "C";
else if($overall >= 65 && $overall < 70) $grade = "B";
else if($overall >= 70 && $overall <= 100) $grade = "A";
echo "<p>Grade: {$grade}</p>";

/*
6.
The Kaboom Gas company charge their customers for gas as follows:
Units of Gas Used Cost(£)
Units of Gas:0 to 500 Cost:£10
Units of Gas:501 to 1000 Cost:£10 + 5p for each unit over 500
Units of Gas:Over 1000 Cost:£35 + 3p for each unit over 1000

The following PHP code will assign a random number value to the variable $units. Uncomment the code and write some additional PHP code that will calculate and output the cost of a gas cost based on the value of $units.
*/

 $units=rand(0,2000); 
 $cost = 0; $cap = 0; $extra = 0;
 echo "<p>Units has a value of {$units}.</p>";

 if($units <= 500)
 {
	$cost = 10;
 }
 else if($units > 500 && $units <= 1000)
 {
	$cost = 10; $cap = 500; $extra = 5/100;
 }
 else if($units > 1000)
 {
	$cost = 35; $cap = 1000; $extra = 3/100;
 }
 
 if($cap > 0 && $extra > 0)
 {
	 
	$extraUnits = $units - $cap;
	$cost += ($extra * $extraUnits);
 }
 
 echo "<p>Cost: £{$cost}</p>";
 $cost = 0;


?>
</body>
</html>
