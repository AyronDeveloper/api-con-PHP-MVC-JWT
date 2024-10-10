<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?=url("helpers/url.js")?>"></script>
    <script src="<?=url("library/jquery-3.7.1.js")?>"></script>
    <title>Login con PHP y JWT</title>
</head>
<body>
    <form id="form">
        <label for="">Usuario</label>
        <input type="text" id="email">
        <br>
        <label for="">Contraseña</label>
        <input type="password" id="password">
        <br>
        <button>Ingresar</button>
    </form>
    
    <script src="<?=url("assets/js/login.js")?>"></script>
</body>
</html>