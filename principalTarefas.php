<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site principal</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: rgb(17, 11, 11);
        }

        /* Telas */
        .main-screen {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 50px 0;
            min-height: 100vh;
        }

        /* Cabeçalho */
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fcee21;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .menu {
            display: flex;
            align-items: center;
        }

        .menu-content,
        .profile-content {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .menu-content a,
        .profile-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .menu-content a:hover,
        .profile-content a:hover {
            background-color: #f0f0f0;
        }

        /* Ajuste dos ícones */
        .stats {
            display: flex;
            align-items: center;
        }

        .stat-bars {
            display: flex;
            flex-direction: column;
        }

        .stat-bar {
            display: flex;
            align-items: center;
            margin: 5px 0;
            position: relative;
        }

        .stats img#avatarImage {
            width: 40px;
            height: 40px;
            margin-right: 20px;
            border-radius: 50%;
        }

        .stat-bar span {
            width: 50px;
            margin-right: 10px;
        }

        .bar {
            width: 200px;
            height: 25px;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .bar-fill {
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: yellow;
        }

        .bar-fill.life {
            background: url('img_principal/corazon.webp') no-repeat left center / contain, red;
        }

        .bar-fill.xp {
            background: url('img_principal/estrela.webp') no-repeat left center / contain, blue;
        }

        .coins {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .coins img {
            width: 20px;
            height: 20px;
            margin-left: 5px;
        }

        /* Colunas */
        .column {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
            padding: 10px;
            box-sizing: border-box;
        }

        .column h2 {
            margin-bottom: 10px;
            color: rgb(0, 0, 0);
        }

        .task-list,
        .rewards {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            background-image: url('img_principal/caderno.png');
            /* Caminho da imagem de fundo */
            background-size: contain;
            /* Ajusta a imagem para caber completamente no elemento */
            background-repeat: no-repeat;
            /* Impede que a imagem se repita */
            background-position: top center;
            /* Centraliza a imagem horizontalmente e alinha ao topo */
            min-height: 400px;
            /* Ajuste a altura mínima para garantir que a imagem apareça */
        }

        .task-item {
            display: flex;
            margin: 5px auto 0 auto;
            justify-content: space-between;
            padding: 3px;
            width: 70%;
            margin: 0 auto;
            /* Diminui o preenchimento */
            border-bottom: 1px solid #555;
            color: #000;
            background-color: rgb(255, 255, 255);
            height: 35px;
            /* Diminui a altura */
            font-size: 20px;
            /* Diminui o tamanho da fonte */
        }

        .task-item:first-child {
            margin-top: 40px;
            /* Ajuste o valor conforme necessário */
        }


        .task-item button {
            padding: 4px 8px;
            /* Diminui o preenchimento dos botões */
            font-size: 12px;
            /* Diminui o tamanho da fonte dos botões */
            margin-left: 5px;
            background-color: yellow;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .task-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            color: #000;
        }

        .task-popup input,
        .task-popup select {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }

        .task-popup button {
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 10px;
            background-color: #086e7d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Botão Adicionar Tarefa */
        #addTaskBtn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #086e7d;
            color: rgb(241, 237, 237);
            border: none;
            border-radius: 1000px;
            cursor: pointer;
            margin-left: 15px;
            transition: background-color 0.3s ease;

        }

        #addTaskBtn:hover {
            background-color: #0b3a55;
        }

        .rewards-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        /* Ajuste do botão do menu */
        #menuToggle {
            font-size: 24px;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            background: none;
            color: #fff;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .column {
                width: 90%;
            }

            .header-content {
                flex-direction: column;
            }

            .menu {
                margin-bottom: 10px;
            }

            .stats {
                flex-direction: column;
                align-items: flex-start;
            }

            .stat-bars {
                margin-bottom: 10px;
            }

            .coins {
                margin-top: 10px;
            }
        }

        /* Novo estilo para os itens de recompensa */
        .reward-item {
            text-align: center;
            padding: 20px;
            border: 2px solid #eee;
            border-radius: 10px;
            background-color: #f8f8f8;
            margin-bottom: 20px;
        }

        .reward-item img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .reward-item h3 {
            margin-bottom: 5px;
            color: #333;
        }

        .reward-item p {
            margin-bottom: 10px;
            color: #555;
        }

        .reward-item button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #086e7d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: rgb(255, 254, 254);
        }

        .reward-item button:hover {
            background-color: #FFDF7F;
        }

        .luckiest-guy-regular {
            font-family: "Luckiest Guy", cursive;
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'fonteFODA';
            src: url('fonte/Best_Sugar.otf') format('opentype'),
                url('fonte/Best_Sugar.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        .fonteFODA {
            font-family: 'fonteFODA', sans-serif;
        }
    </style>
</head>

<body>
    <div class="main-screen">
        <div class="header">
            <div class="header-content">
                <div class="menu">
                    <button id="menuToggle">☰</button>
                    <div class="menu-content" id="menuContent">
                        <a href="criarGP.php" id="createGroupOption">Criar Grupo</a>
                        <a href="entrarGP.php" id="joinGroupOption">Entrar em um Grupo</a>
                    </div>
                </div>
                <div class="stats">
                    <img src="img_principal/pia.jpg" alt="Avatar" id="avatarImage">
                    <div class="stat-bars">
                        <div class="stat-bar">
                            <span>Vida:</span>
                            <div class="bar">
                                <div id="lifeBar" class="bar-fill life" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="stat-bar">
                            <span>XP:</span>
                            <div class="bar">
                                <div id="xpBar" class="bar-fill xp" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="coins">
                        <span>Moedas:</span>
                        <span id="coins">0</span>
                        <img src="img_principal/moeda.webp" alt="Moeda">
                    </div>
                    <button id="addTaskBtn">Adicionar Tarefas</button>
                    <div class="profile-content" id="profileContent">
                        <a href="#" id="avatarOption">Avatar</a>
                        <a href="#" id="settingsOption">Configurações</a>
                        <a href="#" id="privacyOption">Privacidade</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: flex; width: 100%; justify-content: space-around; margin-top: 70px;">
            <div class="column">
                <h2 class="fonteFODA">Tarefas</h2>
                <div class="task-list" id="todoList">
                    <!-- Tarefas de Afazeres serão adicionadas aqui -->
                </div>
            </div>
            <div class="column">
                <h2 class="fonteFODA">Diarias</h2>
                <div class="task-list" id="dailyList">
                    <!-- Tarefas Diárias serão adicionadas aqui -->
                </div>
            </div>
            <div class="column">
                <h2 class="fonteFODA">Recompensas</h2>
                <div class="rewards">
                    <ul id="rewardList">
                        <li data-cost="10">
                            <div class="reward-item">
                                <img src="img_principal/camisetaPreta.webp" alt="Recompensa 1">
                                <h3>Recompensa 1</h3>
                                <p>10 moedas</p>
                                <button onclick="redeemReward(this, 10)">Resgatar</button>
                            </div>
                        </li>
                        <li data-cost="20">
                            <div class="reward-item">
                                <img src="caminho_para_a_imagem2.jpg" alt="Recompensa 2">
                                <h3>Recompensa 2</h3>
                                <p>20 moedas</p>
                                <button onclick="redeemReward(this, 20)">Resgatar</button>
                            </div>
                        </li>
                        <li data-cost="30">
                            <div class="reward-item">
                                <img src="caminho_para_a_imagem3.jpg" alt="Recompensa 3">
                                <h3>Recompensa 3</h3>
                                <p>30 moedas</p>
                                <button onclick="redeemReward(this, 30)">Resgatar</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="task-popup" id="taskPopup">
        <h2>Adicionar Tarefa</h2>
        <input type="text" id="taskName" placeholder="Nome da Tarefa">
        <select id="taskType">
            <option value="todo">Afazer</option>
            <option value="daily">Diária</option>
        </select>
        <select id="taskDifficulty">
            <option value="easy">Fácil</option>
            <option value="medium">Médio</option>
            <option value="hard">Difícil</option>
        </select>
        <button id="saveTaskBtn">Salvar</button>
        <button id="cancelTaskBtn">Cancelar</button>
    </div>
    <div class="overlay" id="overlay"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var menuToggle = document.getElementById("menuToggle");
            var menuContent = document.getElementById("menuContent");
            var profileToggle = document.getElementById("avatarImage");
            var profileContent = document.getElementById("profileContent");
            var addTaskBtn = document.getElementById("addTaskBtn");
            var taskPopup = document.getElementById("taskPopup");
            var overlay = document.getElementById("overlay");

            menuToggle.addEventListener("click", toggleMenu);
            profileToggle.addEventListener("click", toggleProfile);
            addTaskBtn.addEventListener("click", toggleTaskPopup);
            overlay.addEventListener("click", closePopup);
            document.getElementById("saveTaskBtn").addEventListener("click", saveTask);
            document.getElementById("cancelTaskBtn").addEventListener("click", closePopup);

            function toggleMenu() {
                toggleElement(menuContent);
            }

            function toggleProfile() {
                toggleElement(profileContent);
            }

            function toggleTaskPopup() {
                taskPopup.style.display = "block";
                overlay.style.display = "block";
            }

            function closePopup() {
                taskPopup.style.display = "none";
                overlay.style.display = "none";
            }

            function toggleElement(element) {
                if (element.style.display === "block") {
                    element.style.display = "none";
                } else {
                    element.style.display = "block";
                }
            }

            function saveTask() {
                var taskName = document.getElementById("taskName").value;
                var taskType = document.getElementById("taskType").value;
                var taskDifficulty = document.getElementById("taskDifficulty").value;

                if (taskName !== "") {
                    var taskList = taskType === "todo" ? document.getElementById("todoList") : document.getElementById("dailyList");

                    var taskItem = document.createElement("div");
                    taskItem.className = "task-item";
                    taskItem.innerHTML = `<span>${taskName}</span><div><button onclick="completeTask(this, '${taskType}', '${taskDifficulty}')">Completar</button><button onclick="deleteTask(this)">Excluir</button></div>`;
                    taskList.appendChild(taskItem);

                    closePopup();
                } else {
                    alert("Por favor, preencha o nome da tarefa.");
                }
            }
        });

        function completeTask(button, taskType, taskDifficulty) {
            var taskItem = button.closest(".task-item");
            var xpBar = document.getElementById("xpBar");
            var xpWidth = parseInt(xpBar.style.width);
            var points;

            // Calcula os pontos com base na dificuldade da tarefa e no tipo de tarefa
            if (taskType === "todo") {
                points = taskDifficulty === "easy" ? 5 : taskDifficulty === "medium" ? 10 : taskDifficulty === "hard" ? 15 : 0;
            } else {
                points = taskDifficulty === "easy" ? 4 : taskDifficulty === "medium" ? 8 : taskDifficulty === "hard" ? 12 : 0;
            }

            // Adiciona os pontos ao XP
            xpWidth += points;

            // Limita o XP máximo a 100%
            if (xpWidth > 100) xpWidth = 100;

            // Atualiza a largura da barra de XP
            xpBar.style.width = xpWidth + "%";

            // Adiciona os pontos de tarefa às moedas
            var coinsElement = document.getElementById("coins");
            var currentCoins = parseInt(coinsElement.textContent);
            currentCoins += points;
            coinsElement.textContent = currentCoins;

            // Remove a tarefa da lista
            taskItem.remove();
        }

        function deleteTask(button) {
            var taskItem = button.closest(".task-item");
            taskItem.remove();
        }

        function redeemReward(button, cost) {
            var coinsElement = document.getElementById("coins");
            var currentCoins = parseInt(coinsElement.textContent);

            if (currentCoins >= cost) {
                currentCoins -= cost;
                coinsElement.textContent = currentCoins;
                alert("Recompensa resgatada!");
            } else {
                alert("Moedas insuficientes para resgatar esta recompensa.");
            }
        }
    </script>
</body>

</html>