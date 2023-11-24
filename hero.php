<?php
abstract class Hero
{
    
    public function __construct(
        protected string $name,
        protected int $baseStrength,
        protected int $baseHealth,
        protected int $defense,
        protected int $level
    ) {
        
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBaseStrength()
    {
        return $this->baseStrength;
    }
    
    public function getBaseHealth()
    {
        return $this->baseHealth;
    }

   public function attack($opponent)
    {
        // Check for a critical hit (20% chance)
        $isCriticalHit = rand(0, 4) === 0;

        // Calculate damage based on attacker's strength and level
        $damage = rand(1, 10) * $this->level;

        // Double the damage for a critical hit
        if ($isCriticalHit) {
            $damage *= 2;
            return "{$this->name} is angry and makes a critical hit! Damage doubled: ";
        }

        // Inflict the damage on the opponent
        $opponent->setDamage($damage);

        // Output the attack message
        return "{$this->name} attacks {$opponent->getName()} and deals {$damage} points of damage.<br>";
    }



    public function display(): string
    {
        $display = $this->name . ' strength: ' . $this->baseStrength. ' health:' . $this->baseHealth . ' defense:' . $this->defense;
        echo $display. "<br>";
        return $display;
    }

    public function updateStats()
    {
        // Save the current level before updating
        $loadedLevel = $this->level;

        // Increase base strength and health based on the level.
        $this->baseStrength += 5 * $this->level;
        $this->baseHealth += 10 * $this->level;

        // Always increase the level, regardless of whether it's loaded from a cookie
        $this->level++;
       
    }



    public function setDamage($damage)
    {
        // Generates a random number between 0.8 and 1.2
        $randomFactor = rand(80, 120) / 100; 
        $damage = $damage * $randomFactor;

        $damage = max($damage, 0);

        $this->baseHealth -= $damage;
        if ($this->baseHealth <= 0) $this->baseHealth = 0;

        return "{$this->name} takes {$damage} points of damage. Remaining health: {$this->baseHealth}<br>";
    }

    public function getLevel()
    {
        return $this->level;
    }

     public function getDefense()
    {
        return $this->defense;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function subit(): string
    {
        return $this->name . " is attacked";
    }


}
