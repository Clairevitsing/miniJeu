<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
