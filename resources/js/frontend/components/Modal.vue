<template>
    <div id="qrModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Código QR Generado</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div id="qrCodeImage" class="relative in-block">
                            <img class="qr-image" :src="logoImg" alt="" />
                            <Qrcode
                                v-if="qrValue"
                                :value="url"
                                :foreground="color"
                                level="H"
                                :size="size"
                                render-as="svg"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a
                        type="button"
                        class="btn btn-primary"
                        id="downloadBtn"
                        @click="download"
                    >
                        Descargar
                    </a>
                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Qrcode from "qrcode.vue";
import html2canvas from "html2canvas";
import img from "../assets/images/UNADM.jpeg";

export default {
    props: ["qrValue", "url"],
    data() {
        return {
            size: 450,
            color: "#33594C",
            logoImg: img,
        };
    },
    components: { Qrcode },
    methods: {
        download() {
            html2canvas(document.querySelector("#qrCodeImage")).then(
                (canvas) => {
                    const a = document.createElement("a");
                    a.href = canvas.toDataURL("image/png");
                    a.download = ` ${new Date()}-qr-generator.png`;
                    a.click();
                }
            );
        },
        closeModal(){
            $('#qrModal').modal('hide')
        }
    },
};
</script>
