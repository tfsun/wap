<?php include("top.html"); 
 include ("db-connection.php");
?>

<!-- this page is used for handle requesting for registering user.  -->
<?php
    if(false == isset($_GET["Name"]) || strlen($_GET["Name"]) < 1) {
        header('Location: error.php?err=must input name!');
    }
    if(false == isset($_GET["password"]) || strlen($_GET["password"]) < 1)  {
        header('Location: error.php?err=must input password!');
    }
    $user_name = $_GET["Name"];
    $stmt = $db->prepare("SELECT * FROM singles WHERE name = :name");
    $stmt->execute(array(':name' => $user_name));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(false != $result){
        header('Location: error.php?err=user already exist!');
    }
    $pass_hash = password_hash($_GET["password"], PASSWORD_DEFAULT);
    $Personalitytype =  $_GET["Personalitytype"];
    $Personalitytype0 = substr($Personalitytype,0,1);
    $Personalitytype1 = substr($Personalitytype,1,1);
    $Personalitytype2 = substr($Personalitytype,2,1);
    $Personalitytype3 = substr($Personalitytype,3,1);

    $stmt = $db->prepare("INSERT INTO singles VALUES (NULL, :name, :pass_hash, :gender, :age, :type1,
                        :type2, :type3, :type4, :os, :min, :max)");
    $stmt->execute(array(':name' => $user_name, ':pass_hash' => $pass_hash, ':gender' => $_GET["Gender"], ':age' => $_GET["Age"], 
                ':type1' => $Personalitytype0, ':type2' => $Personalitytype1, ':type3' => $Personalitytype2, 
                ':type4' => $Personalitytype3, ':os' => $_GET["FavoriteOS"], ':min' => $_GET["min"], ':max' => $_GET["max"]));

?>
<div>
    <h1>Thank you!</h1>
    <p>welcome to NerdLuv, <?= $_GET["Name"] ?>!</p>
    <p>Now <a href='matches.php'>log in to see your matches!</a>   </p>
</div>

<?php include("bottom.html"); ?>
