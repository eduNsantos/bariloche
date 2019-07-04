<template>
    <div>
        <h1>Cadastrar usuário</h1>
        <form id="store-form" :action="route" class="col-8" @submit.prevent="submitForm()">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Login</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label>Confirmação de senha</label>
                    <input type="password" name="password_confirm" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar usuário">
            </div>
        </form>
        <table v-if="items">
            <thead>
                <tr>
                    <td>asdasd</td>
                </tr>
            </thead>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            'items': {
                default: false
            },
            'route': {}
        },
        data: function() {
            return {
                form: $('#store-form').serialize()
            }
        },
        methods: {
            submitForm: function() {
                console.log(this.form);
                axios.post(this.route, this.form)
                .then(function(response) {
                    console.log(response);
                });
            }
        }
    }
</script>