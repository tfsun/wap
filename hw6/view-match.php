<?php 
    session_start();
    if(!isset($_SESSION['username'])) {
        $_SESSION["error"] = "Please login first";
        header('Location: login.php');
    }
    $match = 0;
    if(isset($_GET['match']) && $_GET['match'] >= 0) {
        $match = (int)$_GET['match'];
    }
    include("top.html"); 
?>
<!-- this page is used for hanle user searing request -->
<h1>Matches for <?= $_SESSION['username'] ?></h1>
<?php
    if(isset($_SESSION["matches"])){
        $users = $_SESSION["matches"];
    }
    $count = count($users);
    if($count > 0 && $match< $count)
    {
        $cur_user = $users[$match];
    }    
?>
<div class="match">
    <p><img src="images/user.jpg" alt="user" /><?= $cur_user["name"] ?></p>  
    <ul>
        <li><strong>gender:</strong> <?= $cur_user["gender"] ?></li>
        <li><strong>age:</strong><?= $cur_user["age"] ?></li>
        <li><strong>type:</strong><?= $cur_user["type1"].$cur_user["type2"].$cur_user["type3"].$cur_user["type4"] ?></li>
        <li><strong>OS:</strong><?= $cur_user["os"] ?></li>
    </ul>
</div>
<div id="nav">
    <?php
        if($match>0 && $count > 0) {
            $pmatch = $match - 1;
    ?>
    <a href=<?= "view-match.php?match=".$pmatch ?> >Previous Match</a>
    <?php } else { ?>
    <span class="invalidhref">Previous Match</span>
    <?php }
        if($match>-1 && $match < $count - 1) {
            $nmatch = $match + 1;
    ?>
    <a href=<?= "view-match.php?match=".$nmatch ?> >Next Match</a>
    <?php } else { ?>
    <span class="invalidhref">Next Match</span>
    <?php } ?>
</div>
<?php include("bottom.html"); ?>