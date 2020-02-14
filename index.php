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

    <?php for ($i = 0; count($player->cards) > $i; $i++): ?>
        <div id="pCard<?php echo $i ?>">
            <p><?php echo $player->cards[$i]; ?></p>
        </div>
    <?php endfor; ?>
    <div>
        <p><strong> <?php echo $player->totalValue; ?></strong></p>
    </div>

    <p>-----------------------------------------------------------</p>
    <?php

    if (!isset($dealer)) {
        $dealer = [];
    } else {

    for ($i = 0; count($dealer->cards) > $i; $i++): ?>
        <div id="dCard<?php echo $i ?>">
            <p><?php echo $dealer->cards[$i]; ?></p>
        </div>
    <?php endfor; ?>
    <div>
        <p><strong> <?php echo $dealer->totalValue;
                } ?></strong></p>
    </div>

    <form method='post'>
        <button name='submit' value='0'<?php echo $player->enable ?? ""; ?>>HIT ME</button>
        <button name='submit' value='1'<?php echo $player->enable ?? ""; ?>>STAND</button>
        <button name='submit' value='2'>NEW GAME</button>
    </form>
</head>
<body>

</body>
</html>

