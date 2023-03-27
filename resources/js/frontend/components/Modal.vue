<template>
    <div id="qrModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Código QR Generado</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center vertical-buffer">
                        <div class="relative in-block">
                            <img class="qr-image" src="../assets/images/UNADM.jpeg" alt="">
                            <Qrcode
                                v-if="qrValue"
                                :value="url"
                                :foreground="color"
                                :level="level"
                                :size="size"
                                render-as="svg"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</template>

<script>
import Qrcode from "qrcode.vue";

export default {
    props: ["img", "qrValue", "url"],
    data() {
        return {
            level: "H",
            size: 200,
            color: "#33594C",
        };
    },
    components: { Qrcode },
};
</script>

<style></style>
