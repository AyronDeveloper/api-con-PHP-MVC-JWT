<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API PHP Y JAVASCRIPT</title>
    <link rel="stylesheet" href="<?=url("assets/css/style.css")?>">
    <script src="<?=url("helpers/url.js")?>"></script>
    <script src="<?=url("library/jquery-3.7.1.js")?>"></script>
    <script src="<?=url("helpers/vali.js")?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/3e6c73bf33.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>  
</head>
<body>
    <h1>AJAX VS FETCH</h1>

    <div>
        <div class="container__forms">
            <div class="content__post">
                <form id="form_post" class="form_post">
                    <div>
                        <label for="">Nombre</label>
                        <input type="text" id="nombre">
                        <div class="">

                        </div>
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" id="email">
                    </div>
                    <div>
                        <label for="">Contraseña</label>
                        <input type="password" id="password">
                    </div>
                    <button>Registrar</button>
                </form>
            </div>
            <div class="content__put">
                <form id="form_put" class="form_put">
                    <div>
                        <label for="">Nombre</label>
                        <input type="text" id="nombre_put">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" id="email_put">
                    </div>
                    <div>
                        <label for="">Contraseña</label>
                        <input type="password" id="password_put">
                    </div>
                    <button>Actualizar</button>

                </form>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>CONTRASEÑA</th>
                        <th colspan="2">OPCIONES</th>
                    </tr>
                </thead>
                <tbody class="table__data"></tbody>
            </table>
        </div>
    </div>
    <a href="<?=url("login")?>">Login</a>


    <script src="<?=url("assets/js/script.js")?>"></script>
</body>
</html>