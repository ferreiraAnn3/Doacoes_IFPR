<?php include "header.php"?>

<style>
    #mainNav {
        background-color: #212529 !important;

        
    }
    body {
        background: linear-gradient(180deg, #ffffff 0%, #b8dbbb 100%) !important;
        background-attachment: fixed !important;
        min-height: 100vh !important;
        margin: 0 !important;
    }
</style>
    <!-- Seção para conteúdo da página -->
    <section class="mt-1 pb-2 padding-bottom: 20px min-height: 20vh align-items: flex-start">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            </div>
    </div>

        <div class="d-flex align-items-center justify-content-center" style="min-height: 40vh;">

            <div class="row">
                <div class="col">

                    <?php

                        if(isset($_GET['erroLogin'])){
                            $erroLogin = $_GET['erroLogin'];

                            if($erroLogin == 'dadosInvalidos'){
                                echo "<div class='alert alert-warning text-center'><strong>USUÁRIO ou SENHA</strong> inválidos!</div>";
                            }
                        }

                    ?>
                    
                    
                    <div class="card shadow p-4" style="border-radius: 15px; border: none;">
                    <h2>Acessar o Sistema:</h2>

                    <form action="actionLogin.php" method="POST" class="was-validated">

                        <div class="form-floating mt-1 mb-1">
                            <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required>
                            <label for="emailUsuario">Email</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            <input type="password" class="form-control" id="senhaUsuario" placeholder="Email" name="senhaUsuario" required>
                            <label for="senhaUsuario">Senha</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-lg text-white" style="background-color: #00873E;">Login</button>
                        </div>
                    </form>

                    <hr class="my-3">
                    <br>
                    <p>Ainda não é cadastrado? <a href="cadastroUsuario.php" title="Cadastrar-se">Clique aqui!</a>&nbsp<i class="bi bi-emoji-smile"></i></p>

                </div>
            </div>

        </div>

    </section>

<?php include "footer.php" ?>