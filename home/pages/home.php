<div id="welcome" class="container">
<div class="container">
<div class="icons-nima npc">&nbsp;</div>
<h1><?php echo $hmessage ?></h1>
</div>
</div>


<div id="content" class="container">
<div id="register" class="block-50">
<form action="?page=register" method="POST">
<?php
        if (isset($_POST['register'])) {
            $username = $mysqli->real_escape_string($_POST['musername']);
            $password = $mysqli->real_escape_string($_POST['mpass']);
            $email = $mysqli->real_escape_string($_POST['memail']);
            $birth = $mysqli->real_escape_string($_POST['mbirth']);

            $ucheck = $mysqli->query("SELECT * FROM `accounts` WHERE `name`='" . $username . "'") or die(mysql_error());
            if ($username == "") {
                echo "Please enter in a username.";
            } elseif (mysqli_num_rows($ucheck) >= 1) {
                echo "</br>Username is already being used.";
            } elseif ($password == "") {
                echo "Please enter in a password.";
            } elseif ($email == "") {
                echo "Please enter in an email.";
            } elseif (strlen($username) < 4) {
                echo "Username must be between 4 and 12 characters!";
            } elseif (strlen($username) > 12) {
                echo "Username must be between 4 and 12 characters!";
            } elseif (strlen($password) < 6) {
                echo "Password must be between 6 and 12 characters!";
            } elseif (strlen($password) > 12) {
                echo "Password must be between 6 and 12 characters!";
            } elseif (strlen($birth) > 10) {
                echo "Please enter in a username.";
            } else {
                $ia = $mysqli->query("INSERT INTO `accounts` (`name`,`password`,`birthday`,`email`) VALUES ('" . $username . "','" . sha1($password) . "','" . $birth . "','" . $email . "')") or die(mysql_error());
                echo "</br>You are now registered to ".$servername."!";
            }
        }
    ?>
<span class="nt-medium info" data-bind="text: register_notice, css: { 'success': register_success, 'error': !register_success() && !register_info() }">A valid e-mail address is required to activate your account.</span>
<td class="list"><input type="text" name="musername" placeholder="Username" maxlength="12" class="in-large" required autocomplete="off"></td></tr>
<td class="list"><input type="password" name="mpass" placeholder="Password" maxlength="30" class="in-large" required autocomplete="off"></i></td></tr>

<div id="dob-block">
<td><input id="datepicker" type="text" maxlength="10" class="in-large" title="Please enter the date of your birth. Example: YYYY/MM/DD" name="mbirth" placeholder="Date Of Birth" required></td>
</div>
<td class="list"><input type="text" name="memail" class="in-large" placeholder="Email" maxlength="50" required autocomplete="off"></td></tr>
<input type="hidden" name="athion_key" value="b85d2be6cbd1f8f3f4a04f2feb4231ce235c1795">
<center><input type="submit" class="btn-large success" name="submit" value="Register"/> 
<input type="hidden" name="register" value="1" /></td></tr></center>
</form>
</div>
<div id="download" class="block-50">
<p class="uppercase">
Simply download the Ethereal All in One:
<a href="<?php echo $client ?>" title="<?php echo $servername ?> Client" target="_athion" class="btn-large warning">Client Download <i class="ico icons-retard">&nbsp;</i></a>
<a href="<?php echo $setup ?>" title="MapleStory" target="_athion" class="btn-large">Ethereal All in One<i class="ico icons-jews">&nbsp;</i></a>
</p>
</div> </div> </div>