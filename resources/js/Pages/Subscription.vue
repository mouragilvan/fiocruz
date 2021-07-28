<template>
    <layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formulário de inscrição
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- inicio -->
                    <div v-for="(erro,index) in errors" :keys="index">
                    {{erro}}
                    </div>
                    <form @submit.prevent="submitForm">
                        <input type="text" v-model="form.name">
                        <button type="submit">Enviar</button>
                    </form>
                     <!-- fim -->
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Layouts/Layout.vue'

    export default {
        components : {
            Layout
        },
        props : {
            errors : Object
        },
        data : ()=>{

            return {
                form : {
                    name: null
                }
            }
        },
        methods : {
             submitForm(){
                   this.$inertia.post("/public/inscrever", this.form);
             }
        }
    }
</script>
