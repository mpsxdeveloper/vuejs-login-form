<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/primevue/resources/themes/nova-alt/theme.css" rel="stylesheet">
    <link href="https://unpkg.com/primevue/resources/primevue.min.css" rel="stylesheet">
    <link href="https://unpkg.com/primeicons/primeicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/primeflex@3.1.2/primeflex.css">
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/primevue/core/core.min.js"></script>
    <script src="https://unpkg.com/primevue@^3/panel/panel.min.js"></script>
    <script src="https://unpkg.com/primevue@^3/fieldset/fieldset.min.js"></script>
    <script src="https://unpkg.com/primevue@^3/inputmask/inputmask.min.js"></script>
    <script src="https://unpkg.com/primevue@^3/password/password.min.js"></script>
    <title>PrimeVue Components - Login</title>
</head>

<body>
    
    <div id="app" style="width: 70%; margin: 0 auto;">

    <p-panel header="VueLogin" style="font-size: 32px;">
        <p style="font-size: 14px; margin: 0; padding: 0; text-align: end;">
            <i class="pi pi-prime"></i>
            Login - Desenvolvido com VueJS 3 e PrimeVue - <span>{{ ano }}</span>
        </p>
    </p-panel>

        <?php
            session_start();
            if(!isset($_SESSION["csrf_token"])) {
                $_SESSION["csrf_token"] = md5(time() . rand(0, 9999));
            }
            if(!isset($_SESSION["owner"])) {
                $addr = filter_input(INPUT_SERVER, "REMOTE_ADDR");
                $agent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
                $_SESSION["owner"] = md5($addr . $agent);
            }
        ?>

        <div class="grid" style="margin-top: 5%;">
            <div class="col">
                <div class="card">
                    <img src="images/image.jpg" style="width: 450px; height: auto;" />
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h1>Login</h1>
                    <form method="post" action="controllers/LoginController.php" id="form">
                        <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" />
                        <div class="field">
                            <label for="matricula">Matrícula</label>
                            <p-inputmask id="matricula" v-model="matricula" mask="999.999-9 a" placeholder="000.000-0 A" class="w-full"></p-inputmask>
                        </div>
                        <div class="field">
                            <label for="senha">Senha</label>
                            <p-password id="senha" v-model="senha" :feedback="false" style="width: 100%;"></p-password>
                        </div>
                        <div class="field">
                            <p-button icon="pi pi-lock" label="Login" @click="logar" type="submit"></p-button>
                        </div>
                        <div class="field" v-if="erros">
                            <p-message severity="error">{{mensagem}}</p-message>
                        </div>
                    </form>            
                </div>
            </div>
        </div>

    </div>

    <script src="scripts/index.js"></script>
    <style>
        .p-password input {
            width: 100%
        }
    </style>

</body>

</html>