<template>
    <app-layout title="Dashboard">
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
                  <label>Brasileiro
                  <input type="radio" id="no" value=0 v-model="form.foreign">
                  </label>
                  <br>
                  <label>Estrangeiro
                  <input type="radio" id="yes" value=1 v-model="form.foreign">
                  </label>
                  <br>
                  <label v-if="form.foreign== 0">CPF
                  <input  type="text" placeholder="CPF" v-mask="'###.###.###-##'" v-model="form.cpf"/>
                  </label>
                  <br>
                  <label v-if="form.foreign == 0">UF de nascimento
                  <input  type="text" placeholder="UF" maxlength="2" v-model="form.state" style="text-transform: uppercase"/>
                  </label>
                  <br>    
                  <label v-if="form.foreign == 0">Município de nascimento
                  <input type="text" v-model="form.birthcity" style="text-transform: uppercase">
                  </label>                  
                  <br>              
                  
                  <label>Nome Completo
                  <input type="text" v-model="form.name" style="text-transform: uppercase">
                  </label>
                  <br>
                  <label>Data de nascimento
                  <input type="date" v-model="form.birthdate" >
                  </label> 
                  <br>                  
                  <label>Nível de formação
                  <select v-model="form.schooling">
                   <option v-for="(item,index) in options" :keys="index" v-bind:value="item">{{item}}</option>
                  </select>
                  </label>  
                  <button type="submit">Enviar</button>
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
