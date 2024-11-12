<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Grupo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url(img_principal/tela.png);
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .form-group label {
            flex: 1;
            margin-right: 10px;
        }
        .form-group input[type="text"],
        .form-group textarea {
            flex: 2;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="file"] {
            display: none;
        }
        .form-group img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            cursor: pointer;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-left: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .user-list {
            margin-top: 20px;
        }
        .user-list ul {
            list-style: none;
            padding: 0;
        }
        .user-list li {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        .toggle-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            cursor: pointer;
            color: #007BFF;
        }
        .user-info {
            display: flex;
            align-items: center;
            margin-top: 10px;
            gap: 10px;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .error-message {
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Criar Grupo</h2>
        <form action="controller/salvar_grupo.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <img id="group-photo-preview" src="img_pag2/perfil.jpg" 
                     onclick="document.getElementById('group-photo').click()">
                <input type="text" id="group-name" name="nome_grupo" placeholder="Nome do grupo" required>
                <input type="file" id="group-photo" name="foto_grupo" accept="image/*" onchange="previewPhoto()">
            </div>

            <div class="form-group">
                <textarea id="group-description" name="descricao_grupo" rows="3" 
                          placeholder="Digite a descrição do grupo"></textarea>
            </div>

            <div class="form-group">
                <label for="user-email">Adicionar Usuário</label>
                <input type="email" id="user-email" placeholder="Email do usuário" 
                       onchange="verificarEmail(this.value)">
                <select id="user-role">
                    <option value="user">Usuário Comum</option>
                    <option value="admin">Administrador</option>
                </select>
                <small id="email-error" class="error-message">Email não encontrado!</small>
            </div>

            <div class="user-info" id="user-info" style="display:none;">
                <img id="user-photo" src="" alt="Foto do Usuário">
                <span id="user-name"></span>
            </div>

            <div class="form-group">
                <button type="button" onclick="addUser()">Adicionar Usuário</button>
            </div>

            <div class="user-list">
                <ul id="user-list"></ul>
            </div>

            <div class="form-group">
                <button type="submit">Finalizar Criação do Grupo</button>
            </div>

            <a class="toggle-link" href="entrarGP.php">Entrar em Grupo</a>
        </form>
    </div>

    <script>
        let emailValido = false; // Variável para armazenar se o email é válido

        function verificarEmail(email) {
            if (email) {
                fetch(`verificar_email.php?email=${email}`)
                    .then(response => response.json())
                    .then(data => {
                        const emailError = document.getElementById('email-error');
                        const userInfo = document.getElementById('user-info');

                        if (data.existe) {
                            emailValido = true; // Email existe
                            emailError.style.display = 'none';
                            // Atualize as informações do usuário (exemplo fictício)
                            document.getElementById('user-photo').src = data.foto_usuario || 'default.png';
                            document.getElementById('user-name').textContent = data.nome_usuario || email;
                            userInfo.style.display = 'flex';
                        } else {
                            emailValido = false; // Email não existe
                            emailError.style.display = 'block';
                            userInfo.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Erro ao verificar email:', error));
            }
        }

        function previewPhoto() {
            const photoInput = document.getElementById('group-photo');
            const file = photoInput.files[0];
            const preview = document.getElementById('group-photo-preview');

            const reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function addUser() {
            const userEmail = document.getElementById('user-email').value;
            const userRole = document.getElementById('user-role').value;

            if (userEmail && emailValido) { // Verifica se o email é válido
                const userList = document.getElementById('user-list');
                const listItem = document.createElement('li');
                listItem.textContent = `${userEmail} - ${userRole === 'admin' ? 'Administrador' : 'Usuário Comum'}`;
                userList.appendChild(listItem);

                document.getElementById('user-email').value = '';
                document.getElementById('user-role').value = 'user';
                document.getElementById('user-info').style.display = 'none'; // Esconde informações do usuário
            } else {
                alert('Por favor, insira um email de usuário válido.');
            }
        }
    </script>
</body>
</html>
