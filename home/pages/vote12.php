<?php
	if(basename($_SERVER["PHP_SELF"]) == "vote.php"){
		die("403 - Access Forbidden");
	}
	error_reporting(0);
    $earnedpoints = false;
	$insertnew = false; 
    $time = $mysqli->real_escape_string(time());  
    $getaccount = $mysqli->real_escape_string($_POST['name']);  
	$account = preg_replace("/[^A-Za-z0-9 ]/", '', $getaccount);
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	if ($account == '' && isset($_POST['submit'])) {$funct_error = 'You need to put in a username!';} 
	
    elseif(isset($_POST['submit'])) { 
        $result = $mysqli->query("SELECT *, SUM(times) as amount FROM votingrecords WHERE NOT account='' AND NOT account='0' AND account='".$account."' OR ip='".$ipaddress."'") or die('Error - Could not look up vote record!');  
        $row = $result->fetch_assoc();
        $timecalc = $time - $row['date']; 

        if ($row['amount'] == '' || $timecalc > $vtime) { 
            if($row['amount'] == '') { 
                $result = $mysqli->query("INSERT INTO votingrecords (ip, account, date, times) VALUES ('".$ipaddress."', '".$account."', '".$time."', '1')") or die ('Error - Could not update vote records!'); 
            } 
            else { 
                $result = $mysqli->query("UPDATE votingrecords SET ip='".$ipaddress."', account='".$account."', date='".$time."', times='1' WHERE ip='".$ipaddress."' OR account='".$account."'") or die ('Error - Could not update vote records!'); 
            } 
            $earnedpoints = true;  
            if ($earnedpoints == true) { 
                if ($account != '') {$result = $mysqli->query("UPDATE accounts SET $colvp = $colvp + $gvp, $colnx = $colnx + $gnx WHERE name='".$account."'") or die ('Error - Could not update vote points!');} 
                $funct_msg = '<meta http-equiv="refresh" content="0; url='.$vlink.'">'; 
                $redirect = true; 
            } 
        } 
        elseif($timecalc < $vtime && $row['amount'] != '') { 
            $funct_msg = 'You\'ve already voted within the last 6 hours!'; 
            $funct_msg .= '<br />Vote time: '. date('M d\, h:i A', $row['date']); 
        } 
        else { 
            $funct_error = 'Unknown Error'; 
        } 
    } 
    
	if($redirect == true) { 
        echo $funct_msg; 
    } 
     
    else { ?> 
<h2 class="text-center">Vote for <?php echo $servername; ?></h2>
<hr/>
<div class="alert alert-info">You can vote 1 time every 6 hours for 1 VP and 10k NX. Make sure to be logged off while voting!</div>
<form action="?page=vote" method="post">  
	<?php  
		if($funct_msg != '') {echo '<div class="alert alert-danger">'.$funct_msg.'</div>';}  
		if($funct_error != '') {echo '<div class="alert alert-danger">'.$funct_error.'</div>';}  
	?>
	<input type="text" name="name" maxlength="15" class="form-control" placeholder="Username" required autocomplete="off"/><br/>
	<input type="submit" name="submit" value="Submit &raquo;" class="btn btn-primary"/>
</form> 
<br/>
<?php } ?>