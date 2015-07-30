<?php include("top.html"); ?>

<!-- this page is used for register user using a form with get method. -->
<div>
    <form action="signup-submit.php">
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
                <input type="submit" value="Sign Up"/>
        </fieldset>
            
    </form>
</div>

<?php include("bottom.html"); ?>
