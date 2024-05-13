$(document).ready(function() {
    $('#formLogin').submit(function(event) {
        event.preventDefault();
 
        const email = $('#email').val();
        const senha = $('#senha').val();
 
        // Validação de login (substitua com sua lógica de autenticação)
        if (email === 'usuario@exemplo.com' && senha === 'senha123') {
            alert('Login efetuado com sucesso!');
            // Redirecionar para página principal
            window.location.href = 'pagina-principal.html';
        } else {
            $('#mensagemErro').html('Email ou senha inválidos.');
        }
    });
});