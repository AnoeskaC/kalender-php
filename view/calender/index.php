<?php 
    
    $maanden = array(null,"januari","febuari","maart","april","mei","juni","juli","augustus","september","otktober",
        "november","december");

    $maand = null;
    $dag = null;

    foreach ($persons as $person) {
        if ($maand !== $person["month"]){
            ?>
            <h1><?= $maanden[$person["month"]] ?></h1>

            <?php
            $maand = $person["month"];
        }
        if ($dag !== $person["day"]){
            ?>
            <h2><?= $person["day"] ?></h2>

            <?php
            $dag = $person["day"];
        }
        echo "<p><a href=\"" . URL . "calender/edit/" . $person['id'] . "\">".$person["person"]." (".$person["year"].")"."</a><a href=\"" . URL . "calender/deleteConfirm/" . $person['id'] . "\">x</a></p>";
    }
?>
  
<p><a href="<?= URL ?>calender/create">+ toevoegen</a></p>