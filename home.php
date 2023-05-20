<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <?php session_start(); ?>
    
    <div style="text-align: center;">
        <h1>Home</h1>
        <h2>Login efetuado com sucesso</h2>
        <?php if(isset($_SESSION["id"])): ?>    
            <p>Nome: <?=$_SESSION['nome'] ?></p>
            <form method="post" action="./php/Login.php">
                <input type="hidden" name="query" value="logout" />
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <?php header('Location: index.php'); ?>
        <?php endif; ?>
    </div>
    
</body>

</html>