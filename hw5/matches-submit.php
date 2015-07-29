<?php include("top.html"); ?>
<!-- this page is used for hanle user searing request -->
<h1>Matches for <?= $_POST["Name"] ?></h1>
<?php
    $users = get_mathes();
    foreach ($users as $cur_user)
    {
?>
<div class="match">
    <p><img src="images/user.jpg" alt="user" /><?= $cur_user[0] ?></p>  
    <ul>
        <li><strong>gender:</strong> <?= $cur_user[1] ?></li>
        <li><strong>age:</strong><?= $cur_user[2] ?></li>
        <li><strong>type:</strong><?= $cur_user[3] ?></li>
        <li><strong>OS:</strong><?= $cur_user[4] ?></li>
    </ul>
</div>
<?php } ?>
<?php include("bottom.html"); ?>
<?php 
//get all satisfied users
    function get_mathes(){
        if(FALSE == isset($_POST["Name"]))
        {
            exit();
        }
        $users = file("singles.txt");
        $Name=NULL;
        $Gender=NULL; 
        $Age=NULL;
        $Personalitytype=NULL;
        $FavoriteOS=NULL;
        $min=NULL;
        $max=NULL;
        $math_uses = array();
        foreach ($users as $value) {
            list($Name, $Gender, $Age,$Personalitytype,$FavoriteOS,$min,$max) = explode(",", $value); 
            if(strcmp($_POST["Name"], $Name) ==0) {
                break;
            }
        }
        foreach ($users as $value) {
            list($tName, $tGender, $tAge,$tPersonalitytype,$tFavoriteOS,$tmin,$tmax) = explode(",", $value); 
            if(strcmp($Gender, $tGender)!=0 
                    && $tAge <= $max && $tAge >= $min
                    && strcmp($FavoriteOS, $tFavoriteOS)==0) {
                        for ($index = 0;$index < strlen($tPersonalitytype);$index++) {
                            if($Personalitytype[$index]==$tPersonalitytype[$index]){
                                $tuser = array($tName,$tGender,$tAge,$tPersonalitytype,$tFavoriteOS);
                                array_push($math_uses, $tuser);
                                break;
                            }
                        }
            }
        }
        return $math_uses;
    }
?>