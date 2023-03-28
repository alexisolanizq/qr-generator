<template>
    <div class="container vertical-buffer">
        <router-view />
    </div>
</template>

<script>
import LoginForm from '../components/LoginForm.vue';
export default {
  components: { LoginForm },};
</script>
