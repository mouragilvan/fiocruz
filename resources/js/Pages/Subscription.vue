<template>
    <app-layout title="Dashboard">
        <template #header>
             <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                Detalhes da inscrição do(a) {{subs.name}}
             </h2>
        </template>

        <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
               <!-- inicio -->
                <p v-if="subs.cpf != ''">CPF: {{subs.cpf}}</p>
                <p>Estado natal: {{subs.birthdate}}</p>
                <p v-if="subs.state != ''">Estado natal: {{subs.state}}</p>
                <p v-if="subs.birthcity != ''">Cidade natal: {{subs.birthcity}}</p>
                <p>Nível de formação: {{subs.schooling}}</p>
                <br/>
                <inertia-link :href="route('home')" >
                <div class="w-full">
                    <div class="flex-1 h-full w-96 mx-auto">
                        <div class="flex w-full bg-white shadow rounded-lg py-4 px-16">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                </svg>
                            </div>
                            <p class="m-auto inset-0 text-xl font-semibold leading-7 text-center text-gray-800">Voltar</p>
                        </div>
                    </div>
                </div>
                </inertia-link>
               <!-- fim -->
            </div>
         </div>
        </div>

   </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'

import { InertiaLink } from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout,
        InertiaLink
    },
    props: {
        subs: Object
    }
}
</script>
