<?php
session_start();
include("top.html"); ?>

<!-- this page is used for posting users searching request using a form. -->
<div>
    <div class="err">
    <?php 
        if(isset($_SESSION["error"]) && strlen($_SESSION["error"]) >0) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        $user_name = "input";
        if(isset($_COOKIE["user_name"])) {
            $user_name = $_COOKIE["user_name"];
        }
    ?>
    </div>
    <form action="login-submit.php" method="post">
        <fieldset>
            <legend>Returning User:</legend>
            <strong>Name: </strong><input type="text" name="Name" size="16" placeholder=<?= $user_name ?> />  <br />
            <strong>Password: </strong><input type="password" name="password" size="16" />  <br />
            <input type="submit" value="View My Mathes"/>
        </fieldset>
            
    </form>
</div>

<?php include("bottom.html"); ?>
