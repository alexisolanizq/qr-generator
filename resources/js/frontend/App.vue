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
                    <label
                        class="col-sm-3 control-label text-left"
                        for="email-03"
                        >Imagen:</label
                    >
                    <div class="col-sm-9">
                        <input
                            @input="getImg"
                            ref="inputFile"
                            class="form-control"
                            type="file"
                            accept="image/png, image/jpeg"
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
        <Modal :img="img" :qrValue="qrValue" :url="url" />
    </div>
</template>

<script>
import QrcodeVue from "qrcode.vue";
import Modal from "./components/Modal.vue";
import Alert from './components/Alert.vue';
export default {
    components: { QrcodeVue, Modal, Alert },
    data() {
        return {
            qrValue: null,
            url: null,
            img: null,
            error: false,
            message: ''
        };
    },
    methods: {
        showImg() {
            this.$refs.inputFile.click();
        },
        getImg() {
            const input = this.$refs.inputFile;
            const file = input.files;
            if (file && file[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.img = e.target.result;
                };
                reader.readAsDataURL(file[0]);
                this.$emit("input", file[0]);
            }
        },
        getQr(e) {
            e.preventDefault();
            this.qrValue = this.url;

            if (!this.url.includes('.com')) {
              this.error = true
              this.message = 'Ingrese una url valida'
            } else{
              $("#qrModal").modal("show");
            }
        },
    },
};
</script>
