<?php
//Based on https://en.wikipedia.org/wiki/Powerball
//generates the correct powerball

function generateUserID(){
    return mt_rand(1000000,100000000);
}

function ballSelection($v)
{
    return(mt_rand(1,69));
}

function generateAllBalls(){
    $whiteballs = range(1, 5);
    $whiteballs = array_map("ballSelection", $whiteballs);
    sort($whiteballs);
    $redball = mt_rand(1,26);
    return array('red' => $redball, 'white' => $whiteballs);
}

function storeBalls($allballs, $expireTime, $userId){
    $json = file_get_contents('php://input');
    $link = mysql_connect('127.0.0.1:3306', 'root', 'root');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    //SQL gods forgive me i know i should make a stored procudure but i am to lazy
    mysql_select_db('lottery', $link) or die('Could not insert database');
    $queryString = "INSERT INTO `powerball`(user, expire, ball_1, ball_2, ball_3, ball_4, ball_5, power) VALUES('$userId', '$expireTime'".
        ", '".$allballs['white'][0].
        "', '".$allballs['white'][1].
        "', '".$allballs['white'][2].
        "', '".$allballs['white'][3].
        "', '".$allballs['white'][4].
        "', '".$allballs['red'].
        "')";
    $result = mysql_query($queryString, $link);
    if (!$result) {
     die('Could not SELECT' . mysql_error());
    }
    mysql_close($link);
}

function retrieveBalls($userid, $contactTime){
    $json = file_get_contents('php://input');
    $link = mysql_connect('127.0.0.1:3306', 'root', 'root');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    //SQL gods forgive me i know i should make a stored procudure but i am to lazy
    mysql_select_db('lottery', $link) or die('Could not select database');
    $result = mysql_query("SELECT * FROM powerball WHERE user = " . mysql_real_escape_string($userid). ";", $link );
    if (!$result) {
     die('Could not SELECT' . mysql_error());
    }
    mysql_close($link);
    $good = null;
    while ($row = mysql_fetch_assoc($result)) {
        $good = array(
            'white' => array($row['ball_1'],$row['ball_2'],$row['ball_3'],$row['ball_4'],$row['ball_5']),
            'red' => $row['power']
            );
    }
    mysql_free_result($result);
    if($good == null)
        die('No rows returned with given userid '. htmlspecialchars($userid));
    return $good;
}

function checkGuess($guess, $real){
    sort($guess['white'][$i]);
    sort($real['white'][$i]);
    //ensure both are sorted
    for ($i=0; $i < 5; $i++) { 
        if($guess['white'][$i] != $real['white'][$i])
            return false;
    }
    return $guess['red'] == $real['red'];
}


//Actual Logic
mt_srand(time()); //cause why not make it easier
$vals = json_decode(file_get_contents('php://input'),true);
$contactTime = time() + 300000;
$flag = "oiuqywerlmkasndfblkasj";
$badGuess = "incorrect";
$expiredTime = "Timeup";
$badRequest = "Bad Request";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($vals['userID'])){
        $correctBalls = retrieveBalls($vals['userID'], $contactTime);
        if($correctBalls == null){
            return $expiredTime;
        }
        if(isset($vals['guess'])){
            if(checkGuess($vals['guess'],$correctBalls)){
                echo $flag;
                exit;
            }
            else{
                echo $badGuess;
                exit;
            }
        }
    }
    echo $badRequest;
    exit;
}
else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $userId = generateUserID();
    echo json_encode(array('userID' => $userId, 'expires' => $contactTime));
    $balls = generateAllBalls();
    storeBalls($balls, $contactTime, $userId);
    exit;
}
echo $badRequest;
exit;
?>