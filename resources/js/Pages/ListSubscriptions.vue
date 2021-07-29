<template>
    <app-layout title="Dashboard">
        <template #header>
             <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                Inscrições
             </h2>
        </template>

        <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- inicio -->
                <table class="table border w-full">
                    <thead>
                    <tr>
                        <th class="border p-3">ID</th>
                        <th class="border p-3">Nome</th>
                        <th class="border p-3">Nacionalidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in list.data" :key="item.id">
                        <td class="border p-3">{{ item.id }}</td>
                        <td class="border p-3">{{ item.name }}</td>
                        <td v-if="item.foreign == 1" class="border p-3">Estrangeiro</td>
                        <td v-if="item.foreign == 0" class="border p-3">Brasileiro</td>
                    </tr>
                    </tbody>
                </table>

                <pagination class="mt-6" :links="list.links" />
               <!-- fim -->
            </div>
         </div>
        </div>
   </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Pagination.vue';

export default {
    components: {
        AppLayout,
        Pagination
    },
    props: {
        list: Object
    }
}
</script>
