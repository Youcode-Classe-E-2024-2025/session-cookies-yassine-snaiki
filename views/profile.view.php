<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?= isset($message) ? $message : $welcomeMessage; ?><?=$_SESSION['username']?></p>

    <form action="" method = 'POST'>
        <input type="text" placeholder='language' name='language'>
    </form>
    <a href="/logout" style="padding: 4px; background-color : blue; color:white;display:inline-block;margin-top:50px">Logout</a>
</body>
</html>