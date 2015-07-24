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
                ?>
                <li><a href=<?= "http://music.yahoo.com/news/archive/$i.html" ?>>Page <?= $i ?></a></li>
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
                ?>
                <li><a href=<?= "http://music.yahoo.com/videos/$artistlower/" ?>><?= $artist ?></a></li>
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
                        <li class="mp3item">
                                <a href="http://mumstudents.org/cs472/Labs/3/songs/be-more.mp3">be-more.mp3</a>
                        </li>

                        <li class="mp3item">
                                <a href="http://mumstudents.org/cs472/Labs/3/songs/just-because.mp3">just-because.mp3</a>
                        </li>

                        <li class="mp3item">
                                <a href="http://mumstudents.org/cs472/Labs/3/songs/drift-away.mp3">drift-away.mp3</a>
                        </li>

                        <!-- Exercise 8: Playlists (Files) -->
                        <li class="playlistitem">472-mix.m3u:
                                <ul>
                                        <li>Hello.mp3</li>
                                        <li>Be More.mp3</li>
                                        <li>Drift Away.mp3</li>
                                        <li>190M Rap.mp3</li>
                                        <li>Panda Sneeze.mp3</li>
                                </ul>
                        </li>
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

