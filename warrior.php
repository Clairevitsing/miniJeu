<?php

require_once "hero.php";

final class Warrior extends Hero 
{
    private string $weapon;

    public function __construct(string $name)
    {
           $baseStrength = (int)(25 * rand(90, 110) / 100);
            $baseHealth = (int)(120 * rand(90, 110) / 100);
            $defense = (int)(15 * rand(90, 110) / 100);

            // Ensure that values are at least 1 to avoid 0 values
            $baseStrength = max($baseStrength, 1);
            $baseHealth = max($baseHealth, 1);
            $defense = max($defense, 1);

        parent::__construct($name, $baseStrength, $baseHealth, $defense, 1);

        $this->weapon = 'Sword';
    }
   public function display(): string
    {
        $parentDisplay = parent::display();
        $displayWarrior = $parentDisplay . $this->getName() . ' uses Weapon: ' . $this->weapon . "<br>";
        return $displayWarrior;
    }
     public function updateStats()
    {
        parent::updateStats();
        // Increase base strength and health based on the level.
        $this->baseStrength += 5 * $this->level;
        $this->baseHealth += 10 * $this->level;
    }

}
