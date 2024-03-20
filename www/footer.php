<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    footer {
        background-color: #333;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .footer-content p {
        margin: 5px 0;
    }
</style>

<body>
    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date("Y"); ?> Viva La Vida, Alkmaar</p>
            <p>Designed and developed by Ian, 2021.</p>
            <p>Contact: vivalavida@restaurant.nl</p>
            <p><?php echo date("Y-m-d H:i:s"); ?></p>
        </div>
    </footer>

</body>

</html>