<?php 
session_start();
include("top.html"); 
?>

<!-- this page is used for register user using a form with get method. -->
<div>
    <div class="err">
    <?php 
        if(isset($_SESSION["error"]) && strlen($_SESSION["error"]) >0) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }

    ?>
        <ul>
  <?php foreach (scandir("./") as $filename) { ?>
    <li>I found a file: <?= $filename ?></li>
  <?php } ?>
</ul>
    </div>
    <a href="signup-submit1.php?key=aaa bbb$*8">ssssssss</a>
    <form action="signup-submit.php" method="get">
        <fieldset>
            <legend>New User Signup</legend>
            <strong>Name: </strong><input type="text" name="Name" size="16" />  <br />
            <strong>Password: </strong><input type="password" name="password" size="16" />  <br />
            <strong>Gender: </strong>
                <label><input type="radio" name="Gender" value="M" /> Male</label>
                <label><input type="radio" name="Gender" value="F" checked /> Female</label>
             <br />
            <strong>Age: </strong><input type="text" name="Age" size="6" maxlength="2"/> <br />
            <strong>Personality type: </strong><input type="text" name="Personalitytype" size="6" maxlength="4"/> 
                (<a href='http://www.humanmetrics.com/cgi-win/jtypes2.asp'>Don't know your type?</a>)<br />
            <strong>Favorite OS:</strong>
                <select name="FavoriteOS" > 
                    <option selected>Windows</option>
                    <option>Mac OS X</option>
                    <option>Linux</option>
                </select> <br />
            <strong>Seeking age: </strong>
                <input type="text" name="min" size="6" placeholder="min"/> to 
                <input type="text" name="max" size="6" placeholder="max"/> <br />
            <strong>type:</strong><input type="radio" name="cc" />aaa   
                <input type="radio" name="cc" />bbb
                <input type="radio" name="cc" />ccc <br />
                <input type="submit" value="Sign Up"/>

        </fieldset>
            
    </form>
</div>

<?php include("bottom.html"); ?>
