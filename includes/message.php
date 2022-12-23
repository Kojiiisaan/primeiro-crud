<?php
session_start();
if(isset($_SESSION['mensagem'])){ ?>

<script>
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    };
</script>

<?php }
session_unset(); ?>

<!-- <div class="row">
    <div class="col s12 m5 push-m3">
        <h3 class="light">
        <?php // if(isset($_SESSION['mensagem'])){
                    // echo $_SESSION['mensagem'];
                  // } ?> 
        </h3>
    </div>
</div> -->