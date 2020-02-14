<?php
class Blackjack
{
    public $totalValue = 0;
    public $cards = [];
    public $enable = "";
    public $endOfGameMessage = "";
    public $awaitingDealerMessage = "";

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
            $this->endOfGameMessage = "You busted. Loser.";
            $this->gameOver();
            unset($_SESSION['totalValue']);
            unset($_SESSION['player']);

        }


    }

    function stand()
    {
        $this->awaitingDealerMessage = "Dealers Turn. Your score is <b>" . $this->totalValue . "</b>";
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