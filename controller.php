<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'Blackjack.php';
session_start();



if (!(isset($_POST['submit']))) {
    $_POST['submit'] = "";
}

$suits = ["H", "C", "S", "D"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


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
        // Dealer only has to be initiated if player presses stand.
        $dealer = new Blackjack();
        do {

            $dealer->hit();
        } while ($dealer->totalValue < $player->totalValue);

        if ($dealer->totalValue <= 21) {
            $player->endOfGameMessage = "Alas, the dealer won";
        } else {
            $player->endOfGameMessage = "You won, congratz!";
        }


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