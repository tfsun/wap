<?php include("top.html"); ?>

<!-- error.php. handle error logic -->
<div>
    <h1 class="err">Error!</h1>
    <div class="err">
    <?php
        if(isset($_GET["err"] )) echo $_GET["err"];
    ?>
    </div>
</div>

<?php include("bottom.html"); ?>
