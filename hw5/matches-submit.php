<?php 
include("top.html"); 
include ("db-connection.php");
?>
<!-- this page is used for hanle user searing request -->
<h1>Matches for <?= $_POST["Name"] ?></h1>
<?php
    $users = get_mathes($db, $_POST["Name"], $_POST["password"]);
    foreach ($users as $cur_user)
    {
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
<?php } ?>
<?php include("bottom.html"); ?>
<?php 
//get all satisfied users
    function get_mathes($dbconn, $user_name, $pwd){
        $math_uses = array();
        if(FALSE == isset($_POST["Name"]))
        {
            return $math_users;
        }
        $stmt = $dbconn->prepare("SELECT * FROM singles WHERE name = :name");
        $stmt->execute(array(':name' => $user_name));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(false == $result){
            header('Location: error.php?err=user not exist!');
        }
        else if(false == password_verify($pwd, $result["pass"]) ){
            header('Location: error.php?err=password error!');
        }
        $stmt = $dbconn->prepare("SELECT * FROM singles WHERE gender <> :gender
                                AND age >= :min AND age <= :max AND os = :os AND
                                (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
        $stmt->execute(array(':gender' => $result["gender"], ':min' => $result["min"], ':max' => $result["max"], 
                                ':os' => $result["os"], ':type1' => $result["type1"], ':type2' => $result["type2"], 
                                ':type3' => $result["type3"], ':type4' => $result["type4"]));
        $math_uses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $math_uses;
    }
?>