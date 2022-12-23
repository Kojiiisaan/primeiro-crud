<?php
include_once 'includes/header.php';
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m5 push-m3">
        <h3 class="light"> Novo Cadastro </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="date" name="idade" id="idade">
                <label for="idade">Data de Nascimento</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="comida" id="comida">
                <label for="idade">Comida Preferida</label>
            </div>

            <label>
            <div class="input-field col s12">
            <input type="radio" id="sexo" name="sexo" value="0">
            <span for="sexom">Masculino</span><br>
            </div>
            </label>
            
            <label>
            <div class="input-field col s12">
            <input type="radio" id="sexo" name="sexo" value="1">
			<span for="sexof">Feminino</span><br>
            </div>
            </label>
            

            <button type="submit" name="btn-cad" class="btn blue"> Cadastrar </button>
            <a href="index.php" type="submit" class="btn green"> Lista de Pessoas </a>
        </form>    
    </div>
</div>
<hr>

<?php
// include './index.php';
include_once 'includes/footer.php';
?>
