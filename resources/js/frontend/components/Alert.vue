<template>
    <div v-if="error" class="alert alert-warning alert-dismissible">
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
            <span aria-hidden="true">&times;</span>
        </button>
        {{ message }}
    </div>
</template>

<script>
export default {
    props: ["error", "message"],
};
</script>
