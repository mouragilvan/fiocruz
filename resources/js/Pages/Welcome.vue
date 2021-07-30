<template>
    <Head title="Bem vindos!" />
        
    <jet-authentication-card>

        <template #logo>
            <jet-authentication-card-logo />
        </template>
        
        <Link :href="route('login')" class="text-sm font-semibold">
            ENTRAR
        </Link>

        <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold">
            CADASTRE-SE
        </Link>   
        
    </jet-authentication-card>

</template>



<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'

export default {
    components: {
        Head,
        Link,
        JetAuthenticationCard,
        JetAuthenticationCardLogo
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    }
}
</script>
