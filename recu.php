<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(img/fundo.png);
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 400px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
    }
    
    .form-container {
        width: 100%;
    }
    
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333333;
    }
    
    form {
        display: flex;
        flex-direction: column;
    }
    
    label {
        margin-bottom: 8px;
        color: #333333;
    }
    
    input[type="email"] {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    input[type="email"].invalid {
        border-color: red;
    }
    
    .error-message {
        color: red;
        font-size: 0.875em;
        display: none;
    }
    
    button {
        padding: 10px;
        background-color: #000000;
        color: #eeff00;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #1d1e1f;
    }
    
    img {
        width: 300px;
        height: auto;
        display: block;
        margin-left: auto; 
        margin-right: auto; 
        margin-bottom: 20px; 
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <img src="img/recuperar-senha.png" alt="Imagem do Título">
    <form id="recover-form" action="" method="POST">
    <input type="email" id="email" name="email" placeholder="E-mail:" required>
    <span class="error-message" id="email-error">Por favor, insira um e-mail válido.</span>
    
    <h3>para continuar por favor insira sua data de nascimento cadastrada</h3>
    <input type="date" id="birthdate" name="birthdate" placeholder="Data de Nascimento:" required>
    <span class="error-message" id="birthdate-error">Por favor, insira a data de nascimento correta.</span>
    
    <button type="submit">Verificar</button>
</form>
        </div>
        </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('recover-form');
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('email-error');
        
            form.addEventListener('submit', function (event) {
                const email = emailInput.value.trim();
                if (email === '') {
                    emailInput.classList.add('invalid');
                    emailError.style.display = 'block';
                    event.preventDefault();
                }
            });
        
            emailInput.addEventListener('input', function () {
                if (this.value.trim() === '') {
                    this.classList.add('invalid');
                    emailError.style.display = 'block';
                } else {
                    this.classList.remove('invalid');
                    emailError.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
