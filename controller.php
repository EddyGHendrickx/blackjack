<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'Blackjack.php';
session_start();


var_dump($player ?? "nuttin");


if (!(isset($_POST['submit']))) {
    $_POST['submit'] = "";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

//    if (!(isset($_POST['submit']))) {
//        $_POST['submit'] = "";
//    }
    // HIT ME
    if ($_POST['submit'] == 0) {
        if (!isset($_SESSION['player'])) {
            $player = new Blackjack();
            $_SESSION['player'] = $player;
        } else {
            $player = $_SESSION['player'];
        }
        $_SESSION['player']->hit();

        // STAND
    } else if ($_POST['submit'] == 1) {
        if (!isset($_SESSION['player'])) {
            $player = new Blackjack();
            $_SESSION['player'] = $player;
        } else {
            $player = $_SESSION['player'];
        }

        $_SESSION['player']->stand();

        $dealer = new Blackjack();
        do {

            $dealer->hit();
        } while ($dealer->totalValue < $player->totalValue);

        

        // SURRENDER
    } else if ($_POST['submit'] == 2) {
        if (!isset($_SESSION['player'])) {
            $player = new Blackjack();
            $_SESSION['player'] = $player;
        } else {
            unset($_SESSION['player']);
            $player = new Blackjack();
            $_SESSION['player'] = $player;
        }
//        unset($_SESSION['player']);
    }

} else {
    if (!isset($_SESSION['player'])) {
        $player = new Blackjack();
        $_SESSION['player'] = $player;
    } else {
        unset($_SESSION['player']);
        $player = new Blackjack();
        $_SESSION['player'] = $player;
    }
}