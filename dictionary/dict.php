<?php
    //$ret = array('Chianti', 'Barolo', 'Pinot Noir');
    //echo json_encode($ret);
    $word = $_POST["word"];
    //$dbconn = new PDO("mysql:dbname=entries;host=localhost", "root", "root");
    $dbconn = new PDO("mysql:dbname=dictionary;host=localhost", "BigWords", "Rconfusing");
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbconn->prepare("SELECT * FROM entries WHERE word = :word");
    $stmt->execute(array(':word' => $word));
    $math_defs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($math_defs);
?>