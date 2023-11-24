<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Combat Game</title>
</head>
<body>
    <h1>Choose Your Hero</h1>
    <form action="combat.php" method="post">
        <label for="hero">Select your hero:</label>
        <select name="hero" id="hero">
            <option value="Warrior">Warrior</option>
            <option value="Mage">Mage</option>
        </select>

        <br>

        <label for="opponent">Select your opponent:</label>
        <select name="opponent" id="opponent">
            <option value="Warrior">Warrior</option>
            <option value="Mage">Mage</option>
        </select>

        <br>

        <input type="submit" value="Start Combat">
    </form>
</body>
</html>
