<!DOCTYPE html>
<!--
name: Tengfei
course: cs472 homework 3
descriptio: translate hw2 static html to dynamic php page
-->
<html>
    <head>
        <title>Rancid Tomatoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="movie.css">
        <link rel="shortcut icon" type="image/gif" href="images/rotten.gif"/>
    </head>
    <body>
        <?php
            define('LOCATOR',   "/locator"); 
            $movie = "princessbride";
            $allmovies = scandir("./");
            if (isset($_GET["film"])) {
                $movie = $_GET["film"];
            }
            //$view_map = array();
            $overview_src = $movie."/overview.png";
            $overview = file($movie."/overview.txt");
            $starts = array();
            foreach ($overview as $view_element) {
                $view = explode(":",$view_element);
                if($view[0]=="STARRING"){
                    $starts = explode(",", $view[1]);
                    array_shift($overview);
                    break;
                }
                //$view_map[$view[0]] = $view[1];
            }
            //var_dump($overview);
            $info = file($movie."/info.txt");
        ?>
        <div id="banner"><img src="images/banner.png" alt="banner"/></div>
        <h1><?= $info[0] ?>( <?= $info[1] ?> )</h1> 
        <div id="overall">
            <div id="Overview">
                <img src=<?= $overview_src ?> alt="overview"/>
                <dl class="OverViewdl">
                    <dt>STARRING</dt>
                    <dd>
                        <ul>
                            <?php foreach ($starts as $start) { ?>
                            <li><?= $start ?></li>
                            <?php } ?>
                        </ul> 
                    </dd>
                    <?php
                        foreach ($overview as $view_element) {
                            $view = explode(":",$view_element);
                    ?>
                    <dt><?= $view[0] ?></dt><dd><?= $view[1] ?></dd>
                    <?php } ?>
                    <dt>LINKS</dt>
                    <dd>
                        <ul>
                            <li><a href="http://www.ninjaturtles.com/">The Official TMNT Site</a></li>
                            <li><a href="http://www.rottentomatoes.com/m/teenage_mutant_ninja_turtles/">RT Review</a></li>
                            <li><a href="http://www.rottentomatoes.com/">RT Home</a></li>
                            <li><a href="http://mumstudents.org/cs472/">CS472</a></li>
                        </ul>  
                    </dd>
                </dl>
            </div>
            <div id="reviews">
                <div id="reviewsbar">
                    <img id="reviewsbarimg" src=
                    <?= get_reviewsbar_img_byrate($info[2]) ?> 
                    alt="overview"/> 
                   <div id="rate"><?= $info[2]."%" ?></div>
                </div>
                <?php for($i=1; $i<3; $i++) { ?>
                <div class="reviewcol">
                    <?php 
                    $views = get_reviews($movie, $i);
                    //var_dump($views);
                    foreach ($views as $one_view) {
                        $view_content = file($one_view);
                    ?>
                    <div class="reviewquote">
                        <img class="likeimg" src=<?= get_review_img_bypartname($view_content[1]) ?> alt=<?= trim($view_content[1]) ?>/>
                        <?= $view_content[0] ?>         
                    </div>
                    <div class="personalquote">
                        <img class="personimg" src="images/critic.gif" alt="critic"/>
                        <?= $view_content[2] ?><br> 
                        <?= $view_content[3] ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>         
            <div id="bottombar">
                (1-10) of 8
            </div>   
        </div>
        <div id="w3ccheck">
            <a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5"></a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS"></a>
	</div>
    </body>
</html>
<?php
    function get_reviewsbar_img_byrate($rate) {
      if ((int)$rate>=60) return "images/freshbig.png";
      else return "images/rottenbig.png";
    }
    function get_review_img_bypartname($imgview) {
        $name = strtolower($imgview);
        $name = trim($name);
        $ret = "images/".$name.".gif";
        return $ret;
    }
    function get_reviews($movie_name, $part) {
        $ret = array();
        $views =  glob($movie_name."/review*.txt");
        $count = count($views);
        if($count<1) {
            $ret = NULL;
        }
        else if((int)$part == 1)
        {
            $ret = array_slice($views, 0, ($count+1)/2);
        }
        else if ((int)$part == 2 && $count>1){
            $ret = array_slice($views, -$count/2);
        }
        else {
            $ret = NULL; 
        }
        return $ret;
    }
?>