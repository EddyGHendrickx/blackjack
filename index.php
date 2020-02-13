<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

class Blackjack
{
    public $totalValue = 0;
    public $cards = [];
    public $enable = "";

    function __construct()
    {
        array_push($this->cards, rand(1, 11), rand(1, 11));
        $this->totalValue = array_sum($this->cards);
    }

    function hit()
    {

        $randomGenerator = rand(1, 11);


        array_push($this->cards, $randomGenerator);
        $_SESSION['totalValue'] = array_sum($this->cards);
        $this->totalValue = $_SESSION['totalValue'];
        if ($this->totalValue > 21) {
            echo 'You lost. Try again';
            unset($_SESSION['totalValue']);
            unset($_SESSION['player']);

        }


    }

    function stand()
    {
        echo "You stopped drawing. Your score is <b>" . $_SESSION['totalValue'] . "</b> Good luck";

    }

    function surrender()
    {
        echo "The dealer won";
        unset($_SESSION['player']);
    }

    function gameOver()
    {

    }
}

if (!isset($_SESSION['player'])) {
    $player = new Blackjack();
    $_SESSION['player'] = $player;
} else {
    $player = $_SESSION['player'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!(isset($_POST['submit']))) {
        $_POST['submit'] = "";
    }

    if ($_POST['submit'] == 0) {
        $_SESSION['player']->hit();
    } else if ($_POST['submit'] == 1) {
        $_SESSION['player']->stand();

    } else if ($_POST['submit'] == 2) {
        $_SESSION['player']->surrender();

    }

}

var_dump($player ?? "nuttin");

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <div>
        <p><?php echo $player->cards[0]; ?> </p>
        <p><?php echo $player->cards[1]; ?> </p>
        <p><?php echo array_sum($player->cards); ?> </p>

    </div>

    <form method='post'>
        <button name='submit' value='0'>HIT ME</button>
        <button name='submit' value='1'>STAND</button>
        <button name='submit' value='2'>SURRENDER</button>
    </form>
</head>
<body>

</body>
</html>
