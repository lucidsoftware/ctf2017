<?php
//Based on https://en.wikipedia.org/wiki/Powerball
//generates the correct powerball

function generateUserID(){
    return mt_rand(1000000,9999999);
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
echo "before";
    $link = mysql_connect('localhost', 'lottery', 'password');
echo "after";
    if (!$link) {
	echo 'Could not connect: ' . mysql_error();
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
    $link = mysql_connect('localhost', 'lottery', 'password');
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
    sort($guess['white']);
    sort($real['white']);
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
$timeToGuess = 300000;
$contactTime = time() + $timeToGuess;
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
    $balls = generateAllBalls();
    storeBalls($balls, $contactTime, $userId);
    echo json_encode(array('userID' => $userId, 'expires' => $contactTime));
    exit;
}
echo $badRequest;
exit;
?>

<!--This File Contians the Logic for the lottery game
using mt_rand(val1,val2) we generate the userid for each game, and then that userid's corresponding lottery balls,

We ensure that the seed is new every time the user visits the page by using mt_srand() at the top of the request.
-->
