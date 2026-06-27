document.addEventListener('DOMContentLoaded', () => {

    // Navbar (Padrão)
    const navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) return;
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink');
        } else {
            navbarCollapsible.classList.add('navbar-shrink');
        }
    };
    navbarShrink();
    document.addEventListener('scroll', navbarShrink);


    // Formulário de doação
    const formDoacao = document.getElementById("formDoacao");
    const msgDoacao = document.getElementById("mensagemDoacao");

    if (formDoacao) {
        formDoacao.addEventListener("submit", (evento) => {
            evento.preventDefault();

            const nome = document.getElementById("name").value.trim();
            const telefone = document.getElementById("telefone").value.trim();
            const bairro = document.getElementById("bairro").value;
            const tipo = document.getElementById("tipoDoacao").value;
            const mensagem = document.getElementById("message").value.trim();

            // Verifica se está vazio
            if (nome === "" || bairro === "" || tipo === "" || mensagem === "" || telefone === "") {
                msgDoacao.textContent = "Preencha todos os campos.";
                msgDoacao.style.color = "red";
                alert("Preencha todos os campos.");
            }

            // Verifica o tamanho do telefone 
            else if (telefone.length < 11) {
                msgDoacao.textContent = "Telefone inválido (muito curto).";
                msgDoacao.style.color = "orange";
                alert("Número de telefone muito curto. Verifique se digitou certo.");
            }

            // Sucesso
            else {
                msgDoacao.textContent = "Obrigado, " + nome + "! Doação registrada.";
                msgDoacao.style.color = "green";
                alert("Obrigado pela sua doação.");
                formDoacao.reset();
            }
        });
    }


    // Formulário de voluntários
    const formVoluntario = document.getElementById("formVoluntario");
    const msgVoluntario = document.getElementById("mensagemVoluntario");
    const secaoVoluntario = document.getElementById("voluntario");

    if (formVoluntario) {
        formVoluntario.addEventListener("submit", (evento) => {
            evento.preventDefault();

            const nomeVol = document.getElementById("nomeVoluntario").value.trim();
            const zapVol = document.getElementById("zapVoluntario").value.trim();
            const missaoVol = document.getElementById("missaoVoluntario").value;

            // Verifica se vazio
            if (nomeVol === "" || zapVol === "" || missaoVol === "") {
                msgVoluntario.textContent = "Preencha todos os dados.";
                msgVoluntario.style.color = "red";
                alert("Faltam dados na inscrição.");
            }

            // Verifica Tamanho do numero
            else if (zapVol.length < 11) {
                msgVoluntario.textContent = "WhatsApp inválido.";
                msgVoluntario.style.color = "orange";
                alert("WhatsApp digitado muito curto.");
            }

            // Sucesso
            else {
                msgVoluntario.textContent = "Inscrição realizada com sucesso!";
                msgVoluntario.style.color = "green";

                alert("Ho Ho Ho! Bem-vindo ao time, " + nomeVol + "!");

                formVoluntario.reset();

                setTimeout(() => {
                    secaoVoluntario.style.display = "none";
                    msgVoluntario.textContent = "";
                }, 3000);
            }
        });
    }


    // 4. Botões modais
   
    const botoesParticipar = document.querySelectorAll(".btn-participar");
    const selectMissao = document.getElementById("missaoVoluntario");

    botoesParticipar.forEach((botao) => {
        botao.addEventListener("click", () => {
            const missao = botao.getAttribute("data-missao");

            if (secaoVoluntario) {
                secaoVoluntario.style.display = "block";
                setTimeout(() => {
                    secaoVoluntario.scrollIntoView({ behavior: "smooth", block: "center" });
                }, 300);
            }

            if (selectMissao) {
                selectMissao.value = missao;
                selectMissao.style.border = "3px solid red";
                setTimeout(() => {
                    selectMissao.style.border = "1px solid #ced4da";
                }, 2000);
            }
        });
    });
});