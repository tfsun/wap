<?php include("top.html"); ?>
<!-- this page is used for handle requesting for registering user.  -->
<?php
    if(isset($_GET["Name"]))
    {
        $info = $_GET["Name"].",".$_GET["Gender"].",".$_GET["Age"].",".$_GET["Personalitytype"].
        ",".$_GET["FavoriteOS"].",".$_GET["min"].",".$_GET["max"]."\n";
        file_put_contents("singles.txt",$info,FILE_APPEND);
    }
?>
<div>
    <h1>Thank you!</h1>
    <p>welcome to NerdLuv, Roy McElmurry!</p>
    <p>Now <a href='matches.php'>log in to see your matches!</a>   </p>
</div>

<?php include("bottom.html"); ?>
