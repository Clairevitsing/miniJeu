<?php

require_once 'hero.php';

final class Mage extends Hero 
{
    private string $magicPower;

    public function __construct(string $name)
    {
        $baseStrength = (int)(20 * rand(90, 110) / 100);
        $baseHealth = (int)(180 * rand(90, 110) / 100);
        $defense = (int)(20 * rand(90, 110) / 100);

        // Ensure that values are at least 1 to avoid 0 values
        $baseStrength = max($baseStrength, 1);
        $baseHealth = max($baseHealth, 1);
        $defense = max($defense, 1);
        parent::__construct($name, $baseStrength, $baseHealth, $defense, 1);
        $this->magicPower = "strong";
    }

    public function display(): string
    {
        $displayMage =  parent::display() . " MagicPower: " . $this->magicPower . "<br>";
        //echo $displayMage;
        return $displayMage;
    }

    // public function attack($opponent)
    // {
    //     $damage = $this->getDamage();
    //     $opponent->setDamage($damage);
    //     return "{$this->name} casts a spell on {$opponent->getName()} and deals {$damage} points of damage.<br>";
    // }

     public function updateStats()
    {
        parent::updateStats();

        // Increase base strength and health based on the level.
        $this->baseStrength += 5 * $this->level;
        $this->baseHealth += 10 * $this->level;
    }

    // Add a method to get remaining health
    public function getRemainingHealth(): int
    {
        return $this->baseHealth;
    }

    //  public function getDamage(): int
    // {
    //     return (int)($this->getBaseStrength() * 0.2);
    // }
}

