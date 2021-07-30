<template>
   <app-layout title="Dashboard">
      <template #header>
         <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
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
               <form @submit.prevent="submitForm" class="p-10">
                  <div class="mb-4 md:mr-2 md:mb-0 w-full text-center">
                     <label class="block mb-2 text-lg font-bold text-gray-700" for="name">Nome Completo</label>
                     
                     <input type="text" id="name" v-model="form.name" style="text-transform: uppercase" class="custom-width px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                     
                  </div>
                  <div class="flex justify-center mt-3 mb-4 md:mr-2 md:mb-0">  
                     <label class="mt-4 block text-lg font-bold text-gray-700" >Nacionalidade</label>
                  </div>
                  <div class="flex justify-center mt-4 mb-4 md:mr-2 md:mb-0">                       
                     <label class="block mb-2 text-sm font-bold text-gray-700 ml-2" >Brasileiro
                     <input type="radio" id="no" value=0 v-model="form.foreign">
                     </label>                 
                     <label class="block mb-2 text-sm font-bold text-gray-700 ml-2" >Estrangeiro
                     <input type="radio" id="yes" value=1 v-model="form.foreign">
                     </label>
                  </div>
                  <div v-if="form.foreign == 0" class="flex justify-between px-6 my-6">
                     <label class="block mb-2 text-lg font-bold text-gray-700">CPF
                     <input  type="text" placeholder="CPF" v-mask="'###.###.###-##'" v-model="form.cpf" class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"/>
                     </label>
                     <label class="block mb-2 text-lg font-bold text-gray-700 pl-2">UF de nascimento
                     <input  type="text" placeholder="UF" maxlength="2" v-model="form.state" style="text-transform: uppercase" class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"/>
                     </label>
                     <label class="block mb-2 text-lg font-bold text-gray-700 pl-2">Município de nascimento
                     <input type="text" v-model="form.birthcity" style="text-transform: uppercase" class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                     </label>                  
                  </div>
                  <div class="flex justify-center mb-4 md:mr-2 md:mb-0 mt-3">
                     <label class="block mb-2 text-lg font-bold text-gray-700 mr-2">Data de nascimento
                     <input type="date" v-model="form.birthdate" class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                     </label> 
                     <label class="block mb-2 text-lg font-bold text-gray-700 ml-2">
                        Nível de formação
                        <select v-model="form.schooling" class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                           <option v-for="(item,index) in options" :keys="index" v-bind:value="item">{{item}}</option>
                        </select>
                     </label>
                  </div>
                  <button type="submit" class="mt-3 w-full px-4 py-2 font-bold text-white custom-button rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">Enviar</button>
               </form>
               <!-- fim -->
            </div>
         </div>
      </div>
   </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { mask } from 'vue-the-mask'

export default {
    components: {
        AppLayout
    },
    props: {
        errors: Object
    },
    data: () => {

        return {
            options: [
                "Nenhum",
                "Fundamental",
                "Médio",
                "Superior",
                "Pós-Graduação (Lato Sensu)",
                "Pós-Graduação (Stricto Sensu - Mestrado)",
                "Pós-Graduação (Stricto Sensu - Doutorado)"
            ],
            form: {
                name: null,
                birthdate: null,
                foreign: null,
                state: null,
                cpf: null,
                schooling: null,
                birthcity: null
            }
        }
    },
    methods: {
        submitForm() {
            this.$inertia.post("/public/inscrever", this.form);
        }
    },
    directives: { mask }
}
</script>
