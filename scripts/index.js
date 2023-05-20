const { createApp } = Vue;

    const App = {
        data() {
            return {
                query: 'login',
                erros : false,
                matricula : '',
                senha : '',
                mensagem : '',
                ano: ''
            }
        },
        components: {
            "p-panel": primevue.panel,
            "p-fieldset": primevue.fieldset,
            "p-inputmask": primevue.inputmask,
            "p-password": primevue.password,
            "p-button": primevue.button,
            "p-message": primevue.message,
        },
        mounted() {
            this.ano = new Date().getFullYear()
        },
        methods: {
            logar() {
                var form = document.querySelector('#form');
                form.onsubmit = function(e) {
                    e.preventDefault();
                }
                this.matricula = this.matricula.toUpperCase()
                if(this.matricula === '') {
                    this.erros = true
                    this.mensagem = 'Informe a matrícula'
                    return
                }
                if(this.senha === '') {
                    this.erros = true
                    this.mensagem = 'Informe a senha'
                    return
                }
                else {
                    const csrf_token = document.querySelector('#csrf_token').value
                    fetch('php/login.php', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json, text/plain, */*',
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'query='+this.query+'&matricula='+this.matricula+'&senha='+this.senha+'&csrf_token='+csrf_token
                    })
                    .then((res) => res.json())
                    .then((data) => {
                        if(data == false) {
                            this.erros = true
                            this.mensagem = 'Matrícula e/ou senha incorretos'
                        }
                        else {
                            this.erros = false
                            window.location.href = 'home.php'
                        }
                    })
                }
            }
        }
    };

    createApp(App)
        .use(primevue.config.default)
        .mount("#app");
