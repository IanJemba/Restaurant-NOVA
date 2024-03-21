<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="stylesheet.css">
</head>

<body>
    <form method="post" action="add_dish_process.php">
        <h2>Add Dish</h2>
        <label for="naam">Name:</label><br>
        <input type="text" id="naam" name="naam" required><br>
        <label for="beschrijving">Description:</label><br>
        <textarea id="beschrijving" name="beschrijving" required></textarea><br>
        <label for="inkoopprijs">Purchase Price:</label><br>
        <input type="text" id="inkoopprijs" name="inkoopprijs" required><br>
        <label for="verkoopprijs">Sale Price:</label><br>
        <input type="text" id="verkoopprijs" name="verkoopprijs" required><br>
        <label for="afbeelding">Image URL:</label><br>
        <input type="text" id="afbeelding" name="afbeelding"><br>
        <label for="is_vega">Is Vegetarian:</label><br>
        <select id="is_vega" name="is_vega" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select><br>
        <label for="categorie">Category:</label><br>
        <input type="text" id="categorie" name="categorie" required><br>
        <label for="aantal_voorraad">Stock Quantity:</label><br>
        <input type="number" id="aantal_voorraad" name="aantal_voorraad" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>