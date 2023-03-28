<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Acceso</h3>
        </div>
        <div class="panel-body">
            <form @submit.prevent="login" class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="email-03"
                        >Correo:</label
                    >
                    <div class="col-sm-9">
                        <input
                            class="form-control"
                            id="email-03"
                            placeholder="Correo electrónico"
                            type="text"
                            v-model="email"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="password-03"
                        >Contraseña:</label
                    >
                    <div class="col-sm-9">
                        <input
                            class="form-control"
                            id="password-03"
                            placeholder="Contraseña"
                            type="password"
                            v-model="password"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label>
                                <input v-model="keepSigned" type="checkbox" />
                                Recordarme
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button class="btn btn-primary" type="submit">
                            Enviar
                        </button>
                        <button class="btn btn-link" type="submit">
                            ¿Olvidaste tu contraseña?
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "jvasquez@outlook.com",
            password: "password",
            keepSigned: false,
        };
    },
    methods: {
        async login() {
            const user = {
                email: this.email,
                password: this.password,
                keepSigned: this.keepSigned,
            };
            await axios
                .post("/login", user)
                .then((response) => {
                    if (response.status === 200) {
                        window.localStorage.setItem("isLogged", true);
                        this.$router.push("/");
                    }
                })
                .catch((error) => {
                    return Promise.reject("error");
                });
        },
    },
};
</script>

<style></style>
