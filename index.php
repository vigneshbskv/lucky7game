<!DOCTYPE html>
<html>

<body>
    <?php
        $dice1_val = 0;
        $min = 1; $max = 6;
        $dice2_val = 0;
        $dice_total = 0;
        $balanceAmt = 100;
        if (isset($_POST['balanceAmt']) && !empty($_POST['balanceAmt'])) {
            $balanceAmt = $_POST['balanceAmt'];
            ?>
            <h1>Welcome to lucky 7 game</h1>
            <form name="lucky7" method="post">
            <input type="hidden" name="form_name" value="form_1">
                <p>Place your bet (Rs.10):<br>[below 7] [7] [above 7]</p>
                <input type="text" name="bet_choice"/><br>
                <input type="hidden" name="balanceAmt" value="<?php echo $balanceAmt; ?>">
                <br>
                <input type="submit" name="submit_btn" />
            </form>
            <?php
        } elseif (empty($_POST) || ($_POST['form_name'] == 'reset_play') || $_POST['form_name'] == 'form_1') {
            ?>
            <h1>Welcome to lucky 7 game</h1>
            <form name="lucky7" method="post">
            <input type="hidden" name="form_name" value="form_1">
                <p>Place your bet (Rs.10):<br>[below 7] [7] [above 7]</p>
                <input type="text" name="bet_choice"/><br>
                <br>
                <input type="submit" name="submit_btn" />
            </form>
            <?php
        }

        if (isset($_POST['bet_choice'])) {
            $balanceAmt = $balanceAmt-10;
            $bet_choice = $_POST['bet_choice'];
            $dice1_val = random_int($min,$max);
            $dice2_val = random_int($min,$max);
            $dice_total = $dice1_val + $dice2_val;
            ?>
            <h3>Game Results</h3>
            <br>
            <p>Dice 1: <?php echo $dice1_val; ?></p>
            <p>Dice 2: <?php echo $dice2_val; ?></p>
            <p>Total: <?php echo $dice_total; ?></p>
            <?php
            if ($bet_choice == 'below 7' && $dice_total < 7) {
                $balanceAmt = $balanceAmt+20;
                echo "congratulations! you Win! your balance is now ".$balanceAmt." Rs.";
            } elseif ($bet_choice == '7' && $dice_total == 7) {
                $balanceAmt = $balanceAmt+30;
                echo "congratulations! you Win! your balance is now ".$balanceAmt." Rs.";
            } elseif ($bet_choice == 'above 7' && $dice_total > 7) {
                $balanceAmt = $balanceAmt+20;
                echo "congratulations! you Win! your balance is now ".$balanceAmt." Rs.";
            } else {
                echo "game lost. your balance is now ".$balanceAmt." Rs.";
            }
            ?>
            <br>
            <form name="game_reply" method="post">
                <input type="hidden" name="form_name" value="reset_play">
                <input type="submit" value="Reset and Play Again"/>
            </form><br>
            <form name="game_reply" method="post">
                <input type="hidden" name="balanceAmt" value="<?php echo $balanceAmt;?>">
                <input type="hidden" name="form_name" value="continue_play">
                <input type="submit" value="Continue Playing"/>
            </form>
            <?php
        }
    ?>

</body>

</html>