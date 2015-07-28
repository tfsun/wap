<?php include("top.html"); ?>

<!-- this page is used for posting users searching request using a form. -->
<div>
    <form action="matches-submit.php" method="post">
        <fieldset>
            <legend>Returning User:</legend>
            <strong>Name: </strong><input type="text" name="Name" size="16" />  <br />
            <input type="submit" value="View My Mathes"/>
        </fieldset>
            
    </form>
</div>

<?php include("bottom.html"); ?>
