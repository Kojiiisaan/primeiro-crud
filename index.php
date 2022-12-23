<?php
// conexão db
include_once 'php_action/db_connect.php';
// header
include_once 'includes/header.php';
include 'includes/message.php';
include 'includes/function.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Pessoas </h3>
        <table class="striped"> 
            <thead>
                <tr>
                    <th bgcolor="00FFFF">Nome:</th>
                    <th bgcolor="00FFFF">Sexo:</th>
                    <th bgcolor="00FFFF">Idade:</th>
                    <th bgcolor="00FFFF">Comida Preferida:</th>
                <?php
                    $sql = "SELECT * FROM tb_crud";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0) { ?>

                    <th bgcolor="00FFFF"></th>
                    <th bgcolor="00FFFF"></th>
                    </tr>
                    </thead> <?php

                    while($dados = mysqli_fetch_array($resultado)){
                ?>

                <tbody>
                <tr>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php $sexo = sexCheck($dados['sexo']); ?></td>
                    <td><?php $idade = ageCheck($dados['id'], $connect);// echo $dados['idade']; ?></td>
                    <td><?php echo $dados['comida']; ?></td>
                    <td><a href="edit.php?id=<?php echo $dados['id']; ?>" class ="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal <?php echo $dados['id']; ?>" class ="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    <div id="modal <?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esta pessoa?</p>
                        </div>
                        <div class="modal-footer">

                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-del" class="btn red">Sim, deletar</button>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </tr>

                <?php } } else { ?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar pessoa</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>
