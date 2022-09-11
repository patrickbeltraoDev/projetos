<?php 

    include_once('Usuarios.php');

    $sgbd = 'mysql';
    $dbname = 'clientes';
    $host = 'localhost:3306';
    $user = 'root';
    $password = 'Paradoxo@555';

    $p = new Usuarios($sgbd, $dbname, $host, $user, $password);

    if(isset($_POST['name'])){
        $name = addslashes($_POST['name']);
        $lastName = addslashes($_POST['lastName']);
        $cpf = addslashes($_POST['cpf']);
        $password = addslashes($_POST['password']);
        $email = addslashes($_POST['email']);

        if(!empty($name) && !empty($lastName) && !empty($cpf) && !empty($password) && !empty($email)){
           if(!$p->cadastrarUsuarios($name, $lastName, $cpf, $email, $password)){
            echo "CPF já Cadastrado!";
           }
        }else{
            echo "Preencha todos os Campos!!!";
        }
    }
   
    if(isset($_GET['id_btn'])){
        $id_btn = addslashes($_GET['id_btn']);
        $p->excluirUsuarios($id_btn);
        header("location: index.php");
    }








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

        <div class="">
            <div class="container-fluid">
                <div class="title">
                    <h1>Sistema de Cadastro</h1>
                </div>
                <div class="section">
                    <form action="#" method="POST" class="form border col-3 p-3 me-3 rounded shadow">

                        <label for="name" class="form-label mt-3">Name</label>
                        <input type="text" name="name" id="name" class="form-control">

                        <label for="lastName" class="form-label mt-3">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control"> 

                        <label for="cpf" class="form-label mt-3">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control">

                        <label for="password" class="form-label mt-3">Password</label>
                        <input type="password" name="password" id="password" class="form-control">

                        <label for="email" class="form-label mt-3">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">

                        <div class="d-grid gap-2 col-6 mx-auto pt-3">
                            <input type="submit" value ="Cadastrar" class="btn btn-outline-success">
                        </div>

                    </form>

                    <table class="table table-striped">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">NAME</th>
                                <th scope="col">LAST NAME</th>
                                <th scope="col">CPF</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">SENHA</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                                $dados = $p->buscarDados();
                                if(count($dados)>0){
                                    for ($i=0; $i < count($dados); $i++) { 
                                        echo '<tr scope="row">';
                                        foreach($dados[$i] as $k => $v){
                                            if($k != 'id'){
                                                echo '<td>' . $v . '</td>';
                                            }
                                            
                                        }
                                        ?>
                                        <td><a href="index.php?id_btn=<?php echo $dados[$i]['id']?>">Excluir</a></td>
                                        <?php
                                        echo '</tr>';
                                    }
                                }else{
                                    echo "Ainda não há Pessoas Cadastradas!!!";
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>












        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>