<?php 
    //session_destroy();
    //session_regenerate_id(TRUE); 
    session_start();
    $user_name = "";
    if(isset($_POST["Name"])) {
        $user_name = $_POST["Name"];
    }
    include ("db-connection.php");
    $math_uses = array();
    if(FALSE == isset($user_name) || strlen($user_name) < 1)
    {
        $_SESSION["error"] = "user must has value!";
        unset($_SESSION['username']);
        unset($_SESSION['matches']);
        header('Location: login.php');
        exit();
    }
    $stmt = $db->prepare("SELECT * FROM singles WHERE name = :name");
    $stmt->execute(array(':name' => $user_name));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(false == $result || false == password_verify($_POST["password"], $result["pass"])){
        $_SESSION["error"] = "Invalid username or password!";
        unset($_SESSION['username']);
        unset($_SESSION['matches']);
        header('Location: login.php');
        exit();
    }
    $_SESSION['username'] = $user_name;
    setcookie("user_name", $user_name, time()+60);
    $stmt = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
                            AND age >= :min AND age <= :max AND os = :os AND
                            (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
    $stmt->execute(array(':gender' => $result["gender"], ':min' => $result["min"], ':max' => $result["max"], 
                            ':os' => $result["os"], ':type1' => $result["type1"], ':type2' => $result["type2"], 
                            ':type3' => $result["type3"], ':type4' => $result["type4"]));
    $math_uses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($math_uses)>0) $_SESSION['matches'] = $math_uses;
    header('Location: view-match.php');
?>