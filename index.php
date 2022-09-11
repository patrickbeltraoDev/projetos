<?php 

    include_once('Usuarios.php');

    $sgbd = 'mysql';
    $dbname = 'clientes';
    $host = 'localhost:3306';
    $user = 'root';
    $password = 'Paradoxo@555';

    $p = new Usuarios($sgbd, $dbname, $host, $user, $password);
   








?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
        <title>Sistema de Cadastro</title>
    </head>
    <body>

        <div class="container">
            <div class="title">
                <h1>Sistema de Cadastro</h1>
            </div>
            <div class="section">
                <form action="#" method="POST" class="form col-4 border p-3 bg-secondary">

                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">

                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control"> 

                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="form-control">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">

                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control">

                </form>

                <table class="table table-striped col-8">
                    <thead>
                        <tr>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            $dados = $p->buscarDados();
                            var_dump($dados);



                        ?>
                        <tr>
                            <td>

                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>












        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>