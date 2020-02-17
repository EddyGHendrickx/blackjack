<?php
require 'controller.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>BLACKJACK BABY</title>
</head>
<body>


<div id="container">

    <?php for ($i = 0; count($player->cards) > $i; $i++): ?>
        <div id="pCard<?php echo $i ?>" class="cards">

            <img src="image/<?php

            if ($player->cards[$i] == 1 || $player->cards[$i] == 11){
                echo "A";
            } elseif ($player->cards[$i] == 10){
                echo "Q";
            } else {
                echo $player->cards[$i];
            }

           ?>H.png" alt="">
        </div>
    <?php endfor; ?>

    <div id="pTotal">
        <strong> <?php echo $player->totalValue; ?></strong>
    </div>

    <div id="endOfGameMessage">
        <strong><?php echo $player->endOfGameMessage; ?></strong>
    </div>

    <div id="awaitingDealerMessage">
        <strong> <?php echo $player->awaitingDealerMessage; ?> </strong>
    </div>
    <?php

    if (!isset($dealer)) {
        $dealer = [];
    } else {

    for ($i = 0; count($dealer->cards) > $i; $i++): ?>
        <div id="dCard<?php echo $i ?>" class="cards">

            <img src="image/<?php

            if ($dealer->cards[$i] == 1 || $dealer->cards[$i] == 11) {
                echo "A";
            } elseif ($dealer->cards[$i] == 10) {
                echo "Q";
            } else {
                echo $dealer->cards[$i];
            }

            ?>S.png" alt="">
        </div>
    <?php endfor; ?>
    <div id="dTotal">

        <strong>
            <?php echo $dealer->totalValue;
            } ?>
        </strong>

    </div>
</div>
</br></br></br>
<form method='post' id="form">
    <button name='submit' value='0'<?php echo $player->enable ?? ""; ?>>HIT ME</button>
    <button name='submit' value='1'<?php echo $player->enable ?? ""; ?>>STAND</button>
    <button name='submit' value='2'>NEW GAME</button>
</form>

</body>
</html>

