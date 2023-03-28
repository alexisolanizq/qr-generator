<template>
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="/"><i class="icon icon-home"></i></a>
            </li>
            <li><a href="/">Inicio</a></li>
            <li class="active">Generador de QR</li>
        </ol>
        <h2>Generador de QR</h2>
        <hr class="red" />
        <Alert :error="error" :message="message" />
        <div class="vertical-buffer">
            <form v-on:submit.prevent class="form-horizontal" role="form">
                <div class="form-group">
                    <label
                        class="col-sm-3 control-label text-left"
                        for="email-03"
                        >Enlace:</label
                    >
                    <div class="col-sm-9">
                        <input
                            v-model="url"
                            class="form-control"
                            placeholder="Ingresa tu URL"
                            type="text"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button
                            @click="getQr"
                            class="btn btn-primary pull-right"
                            type="submit"
                        >
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <Modal :qrValue="qrValue" :url="url" />
    </div>
</template>

<script>
import Modal from "../components/Modal.vue";
import Alert from "../components/Alert.vue";
export default {
    components: { Modal, Alert },
    data() {
        return {
            qrValue: null,
            url: null,
            error: false,
            message: "",
        };
    },
    methods: {
        getQr(e) {
            e.preventDefault();
            this.qrValue = this.url;
            $("#qrModal").modal("show");
        },
    },
};
</script>
