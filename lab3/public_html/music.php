<!DOCTYPE html>
<html>
<!--
Web Programming Step by Step
Lab #3, PHP
-->
    <head>
        <title>Music Viewer</title>
        <meta charset="utf-8" />
        <link href="viewer.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h1>My Music Page</h1>
        <!-- Exercise 1: Number of Songs (Variables) -->
        <?php
            $number_songs = 5678;
            $hour_songs = $number_songs / 10;
        ?>
        <p>
            I love music.
            I have <?= $number_songs ?> total songs,
            which is over <?= $hour_songs ?> hours of music!
        </p>

        <!-- Exercise 2: Top Music News (Loops) -->
        <!-- Exercise 3: Query Variable -->
        <div class="section">
            <h2>Yahoo! Top Music News</h2>
            <ol>
                <?php
                    $newspages = 5;
                    if (isset($_GET["newspages"])) {
                        $newspages = (int)$_GET["newspages"];
                    }
                    for($i=1; $i<=$newspages; $i++) {
                        $page_url = "http://music.yahoo.com/news/archive/$i.html"
                ?>
                <li><a href=<?= $page_url ?> >Page <?= $i ?></a></li>
                <?php
                    }
                ?>
            </ol>
        </div>
        <!-- Exercise 4: Favorite Artists (Arrays) -->
        <!-- Favorite Artists complete, you can uncomment it to check this version
        <div class="section">
            <h2>My Favorite Artists</h2>
            <ol>
                <?php
                    $fav_artists = array("Britney Spears", "Christina Aguilera", "Justin Bieber", "Lady Gaga");
                    foreach ($fav_artists as $artist){       
                ?>
                <li><?= $artist ?></li>
                
                <?php
                    }
                ?>
            </ol>
        </div>
        -->
        <!-- Exercise 5: Favorite Artists from a File (Files) -->
        <div class="section">
            <h2>My Favorite Artists</h2>
            <ol>
                <?php
                    $fav_artists = file("favorite.txt");
                    foreach ($fav_artists as $artist)   {
                        $artistlower = strtolower($artist);
                        $artistlower = str_replace(" ","-",$artistlower);
                ?>
                <li><a href=<?php print "http://music.yahoo.com/videos/".$artistlower ?>><?= $artist ?></a></li>
                <?php
                    }
                ?>
            </ol>
        </div>
        <!-- Exercise 6: Music (Multiple Files) -->
        <!-- Exercise 7: MP3 Formatting -->
        <div class="section">
            <h2>My Music and Playlists</h2>
            <ul id="musiclist">
                <?php
                    $songs_list = glob("songs/*.mp3"); 
                    $songs_with_size = array();

                    foreach ($songs_list as $song) { 
                        $song_size = filesize($song);
                        $songs_with_size[$song] = $song_size;
                    }
                    arsort($songs_with_size);
                    foreach ($songs_with_size as $key => $val) {
                        $song_name = basename($key).PHP_EOL;
                        $song_name = $song_name. " (" . (int)($val/1024) . ' kb)';
                        $song_url = str_replace(" ", "%20", $key);
                ?>
                <li class="mp3item">
                    <!--<a href=<?= $song_url ?>><?= $song_name ?></a>-->
                    <a href=<?= $song_url ?>><?= $song_name ?></a><br>
                    <audio src=<?= $song_url ?> controls="controls">Your browser does not support the audio tag.</audio>       
                </li>
                <?php
                    }
                    $m3u_list = glob("songs/*.m3u"); 
                    foreach ($m3u_list as $m3u_element) { 
                        $m3u_element_base = basename($m3u_element).PHP_EOL;
                ?>
                <li class="playlistitem"><?= $m3u_element_base ?>
                    <ul>
                    <?php
                        $m3u_songs = file($m3u_element);
                        foreach ($m3u_songs as $song_element)  {
                            if($song_element[0]=='#') continue;
                    ?>  
                        <li><?= $song_element ?></li>
                    <?php
                        }
                    ?>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div>
                <a href="http://validator.w3.org/check/referer">
                        <img src="http://mumstudents.org/cs472/Labs/3/w3c-html.png" alt="Valid HTML5" />
                </a>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img src="http://mumstudents.org/cs472/Labs/3/w3c-css.png" alt="Valid CSS" />
                </a>
        </div>
    </body>
</html>

