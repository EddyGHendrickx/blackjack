<?php
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
        $this->totalValue = array_sum($this->cards);

        if ($_SESSION['player']->totalValue > 21) {
            echo "You lost. Loser. </br>";
            $this->gameOver();
            unset($_SESSION['totalValue']);
            unset($_SESSION['player']);

        }


    }

    function stand()
    {
        echo "You stopped drawing. Your score is <b>" . $this->totalValue . "</b> Good luck</br>";
        $this->gameOver();
    }

    function surrender()
    {
        unset($_SESSION['player']);
    }

    function gameOver()
    {

        $this->enable = "disabled";

    }
}