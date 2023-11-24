<?php
ob_start(); // Start output buffering
require_once 'Warrior.php';
require_once 'Mage.php';

// Function to create a hero based on the selected type
function createHero($type)
{
    return match($type) {
        'Warrior' => new Warrior('Bruce Lee'),
        'Mage' => new Mage('Jackie Chan'),
        default => null,
    };
}

// Function to simulate combat between two heroes
function simulateCombat($hero, $opponent)
{
    $attacker = rand(0, 1) == 0 ? $hero : $opponent;
    $defender = $attacker === $hero ? $opponent : $hero;

    $round = 1;
    $combatResults = [];

    // Simulate combat until one of the participants runs out of health
    while ($hero->getBaseHealth() > 0 && $opponent->getBaseHealth() > 0) {
        $roundResults = [];

        // Calculate damage using the formula: damage = attacker.strength - defender.defense
        $damage = $attacker->getBaseStrength() - $defender->getDefense();
        // Call setDamage on the defender to apply the damage
        $defender->setDamage($damage);

        $roundResults[] = "Round $round";
        //$roundResults[] = $defender->subit();
        $roundResults[] = $defender->subit();
        $roundResults[] = $attacker->attack($defender);
        $roundResults[] = "{$hero->getName()}'s Remaining Health: {$hero->getRemainingHealth()}";
        $roundResults[] = "{$opponent->getName()}'s Remaining Health: {$opponent->getRemainingHealth()}";

        // Store round results in the combat results array
        $combatResults[] = $roundResults;

        // Swap attacker and defender
        $temp = $attacker;
        $attacker = $defender;
        $defender = $temp;

        $round++;
    }

 
    // Display combat results in a table
    echo "<table border='1' style='table-layout: fixed; width: 100%;'>";
    echo "<tr><th>Round</th><th>Attacker</th><th>Defender</th><th>Attacker's Remaining Health</th><th>Defender's Remaining Health</th></tr>";

    foreach ($combatResults as $roundResults) {
        echo "<tr>";
        foreach ($roundResults as $result) {
            echo "<td style='word-wrap: break-word;'>$result</td>";
        }
        echo "</tr>";
    }

   echo "</table>";

    var_dump($roundResults);
    echo "</table>";
   // Display the final result after combat
    echo "<b>Combat Results</b><br>";

    displayResults($hero, $opponent);
     // Cookie valid for one day
    setcookie('heroLevel', $hero->getLevel(), time() + 86400, "/");
}


function displayResults($hero, $opponent)
{
    echo "<div style='border: 1px solid #ddd; padding: 10px; margin-top: 20px;'>";

    // Level up the hero after victory
    if ($hero->getBaseHealth() > 0) {
        echo "<p style='color: green;'>Your hero {$hero->getName()} won!</p>";

        // Update stats and display final health
        $hero->updateStats();

        // Display additional information
        echo "<p>{$hero->getName()}'s final health: {$hero->getBaseHealth()}</p>";
        echo "<p style='color: red;'>Your opponent {$opponent->getName()} lost.</p>";
    } else {
        echo "<p style='color: red;'>Your hero {$hero->getName()} lost.</p>";
        echo "<p style='color: green;'>Your opponent {$opponent->getName()} won.</p>";
    }

    // Check if the hero's level cookie exists
    if (isset($_COOKIE['heroLevel'])) {
        // Initialize the hero with the level from the cookie
        // Convert to integer
        $heroLevelFromCookie = intval($_COOKIE['heroLevel']);
        $hero->setLevel($heroLevelFromCookie);
        echo "<p>{$hero->getName()}'s level loaded from cookie: $heroLevelFromCookie</p>";
    }

    echo "</div>";
}

// Get selected hero and opponent types from the form or set defaults
$heroType = isset($_POST['hero']) ? $_POST['hero'] : 'default';
$opponentType = isset($_POST['opponent']) ? $_POST['opponent'] : 'default';

// Create instances of the Hero and Opponent classes based on choices
$hero = createHero($heroType);
$opponent = createHero($opponentType);

// Check if hero and opponent instances are created successfully
if ($hero !== null && $opponent !== null) {
    // Display hero and opponent details
    $hero->display();
    $opponent->display();

    // Randomly determine the initial attacker and defender
    $attacker = rand(0, 1) == 0 ? $hero : $opponent;
    $defender = $attacker === $hero ? $opponent : $hero;

    echo "<b> Combat Details</b><br>";

    // Simulate combat
    simulateCombat($attacker, $defender);

} else {
    echo "Error creating hero or opponent.";
}
// Flush output
ob_end_flush(); 
?>
