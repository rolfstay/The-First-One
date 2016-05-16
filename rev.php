<?php
	
	 	 //easy Calendar
	 $year=$_GET['y']?$_GET['y']:date('Y');
	 $month=$_GET['n']?$_GET['n']:date('n');
	
	 $days=date('t',strtotime("$year-$month-1"));
	 
	 $week=date('w',strtotime("$year-$month-1"));
	


	 echo "<center>";
	 echo "<h2>{$year}-{$month}</h2>";

	 echo "<table width='700px' border='0px'>";
	 echo "<tr>";
	 echo "<th>Sunday</th>";
	 echo "<th>Monday</th>";
	 echo "<th>Tuesday</th>";
	 echo "<th>Wednesday</th>";
	 echo "<th>Thursday</th>";
	 echo "<th>Friday</th>";
	 echo "<th>Saturday</th>";
	 echo "</tr>";

	 for ($i=1-$week; $i<=$days; ) { 
	 	echo "<tr>";
	 	for ($j=0; $j <7 ; $j++) { 
	 		if ($i>$days) {
	 			echo "<td>&nbsp</td>";
	 		}
	 		else if ($i<=0) {
	 			echo "<td>&nbsp</td>";
	 		}
	 		else if ($i==1) {
	 			echo "<td bgcolor='66ccff'>{$i}</td>";
	 		}
	 		else
	 			echo "<td>{$i}</td>";
	 		$i++;
	 	}
	 	echo "</tr>";
	 }

	 echo "</table>";

	 if ($month==1) {
	 	$preyear=$year-1;
	 	$premonth=12;
	 }else{
	 	$preyear=$year;
	 	$premonth=$month-1;
	 }
 	if ($month==12) {
	 	$nextyear=$year+1;
	 	$nextmonth=1;
	 }else{
	 	$nextyear=$year;
	 	$nextmonth=$month+1;
	 }
	

	 echo "<h2><a href='rev.php?y={$preyear}&n={$premonth}'>Last month</a>|<a href='rev.php?y={$nextyear}&n={$nextmonth}'>Next month</a></h2>";

	 echo "</center>";
  ?>