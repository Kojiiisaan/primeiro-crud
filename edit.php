<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';

if(isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM tb_crud WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>

<div class="row">
    <div class="col s12 m5 push-m3">
        <h3 class="light"> Editar Cliente </h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="comida" id="comida" value="<?php echo $dados['comida']; ?>">
                <label for="email">Comida Preferida</label>
            </div>

            <div class="input-field col s12">
                <input type="date" name="idade" id="idade" value="<?php echo $dados['idade']; ?>">
                <label for="idade">Idade</label>
            </div>

            <label>
            <div class="input-field col s12">
            <input type="radio" id="sexo" name="sexo" value="0" 
            <?php if($dados['sexo'] <> 1){echo "checked";} else {echo "";} ?>>
            <span for="sexom">Masculino</span><br>
            </div>
            </label>
            
            <label>
            <div class="input-field col s12">
            <input type="radio" id="sexo" name="sexo" value="1" 
            <?php if($dados['sexo'] <> 0){echo "checked";} else {echo "";} ?>>
			<span for="sexof">Feminino</span><br>
            </div>
            </label>

            <button type="submit" name="btn-edit" class="btn blue"> Concluir Edição </button>
            <a href="index.php" type="submit" class="btn green"> Lista de Clientes </a>
        </form>    
    </div>
</div>
<hr>

<?php
include_once 'includes/footer.php';
?>
