<?php include "header.php" ?>
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


<body>

<section class="mt-2 pb-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> 
                <h4 class="text-center mb-4" style="color: #021c0e;">Cadastro de Usuário:</h4>

                <form action="actionUsuario.php" method="POST" class="was-validated" enctype="multipart/form-data">
                    
                    <label>Escolha o seu perfil:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoPerfil" id="perfil1" value="Doador" required>
                        <label class="form-check-label" for="perfil1">Sou Doador</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoPerfil" id="perfil2" value="Voluntario" required>
                        <label class="form-check-label" for="perfil2">Sou Voluntário</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoPerfil" id="perfil3" value="Beneficiario_Normal">
                        <label class="form-check-label" for="perfil3">Sou Beneficiário</label>
                    </div>


                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome" name="nomeUsuario" required>
                        <label for="nomeUsuario">Nome Completo</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="date" class="form-control" id="dataNascimentoUsuario" name="dataNascimentoUsuario" required>
                        <label for="dataNascimentoUsuario">Data de Nascimento</label>
                    </div>

                    <div class="form-floating mt-3 mb-3" id="divLocalColeta" style="display: none;">
                        <select class="form-select" id="localColeta" name="localColeta">
                            <option value="IFPR">IFPR - Campus Telêmaco Borba</option>
                            <option value="Prefeitura">Prefeitura Municipal</option>
                            <option value="CRAS">CRAS</option>
                        </select>
                        <label for="localColeta">Local de Coleta Preferencial</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
                        <label for="telefone">WhatsApp/Telefone</label>
                    </div>

                    <div class="form-floating mt-3 mb-3" id="divHorarioVoluntario" style="display: none;">
                    <select class="form-select" id="horarioVoluntario" name="horarioVoluntario">
                        <option value="Manhã">Manhã (08h - 12h)</option>
                        <option value="Tarde">Tarde (13h - 17h)</option>
                        <option value="Quando solicitado">Quando solicitado</option>
                    </select>
                    <label for="horarioVoluntario">Horário de Disponibilidade</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required>
                        <label for="emailUsuario">Email</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha" name="senhaUsuario" required>
                        <label for="senhaUsuario">Senha</label>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="confirmarSenhaUsuario" placeholder="Confirmar Senha" name="confirmarSenhaUsuario" required>
                        <label for="confirmarSenhaUsuario">Confirmar Senha</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php" ?>

<!-- essa parte em js foi a gemini que me ajudou, pq eu queria que essas infos só aparecessem quando fizessem sentido, quando o campo de voluntario ou doador fossem selecionados--->
<script>
    const radioDoador = document.getElementById('perfil1');
    const radioVoluntario = document.getElementById('perfil2'); // ID do Voluntário

    const divLocal = document.getElementById('divLocalColeta');
    const divHorario = document.getElementById('divHorarioVoluntario');

    const selectLocal = document.getElementById('localColeta');
    const selectHorario = document.getElementById('horarioVoluntario');

    document.querySelectorAll('input[name="tipoPerfil"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Lógica do Doador
            if (radioDoador.checked) {
                divLocal.style.display = 'block';
                selectLocal.setAttribute('required', 'required');
            } else {
                divLocal.style.display = 'none';
                selectLocal.removeAttribute('required');
            }

            // Lógica do Voluntário
            if (radioVoluntario.checked) {
                divHorario.style.display = 'block';
                selectHorario.setAttribute('required', 'required');
            } else {
                divHorario.style.display = 'none';
                selectHorario.removeAttribute('required');
            }
        });
    });
</script>

</body>
</html>