<?php
session_start();
include("top.html"); 
 include ("db-connection.php");
?>

<!-- this page is used for handle requesting for registering user.  -->
<?php
    echo $_GET["Name"];
    exit;
    header('Location: signup.php');
    exit();
    if(false == isset($_GET["Name"]) || strlen($_GET["Name"]) < 1) {
        $_SESSION["error"] = "must input name!";
        header('Location: login.php');
    }
    
    if(false == isset($_GET["password"]) || strlen($_GET["password"]) < 1)  {
        $_SESSION["error"] = "must input password!";
        header('Location: login.php');
    }
    $user_name = $_GET["Name"];
    $stmt = $db->prepare("SELECT * FROM singles WHERE name = :name");
    $stmt->execute(array(':name' => $user_name));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(false != $result){
        $_SESSION["error"] = "user already exist!";
        header('Location: signup.php');
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
    $_SESSION['username'] = $user_name;
    
    $stmt = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
                        AND age >= :min AND age <= :max AND os = :os AND
                        (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
    $stmt->execute(array(':gender' => $result["gender"], ':min' => $result["min"], ':max' => $result["max"], 
                        ':os' => $result["os"], ':type1' => $result["type1"], ':type2' => $result["type2"], 
                        ':type3' => $result["type3"], ':type4' => $result["type4"]));
    $math_uses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($math_uses)>0) $_SESSION['matches'] = $math_uses;

?>
<div>
    <h1>Thank you!</h1>
    <p>welcome to NerdLuv, <?= $user_name ?>!</p>
    <p>Now <a href='view-match.php'>Now continue on to see your matches!</a>   </p>
</div>

<?php include("bottom.html"); ?>
