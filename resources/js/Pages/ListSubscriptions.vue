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
                <table class="table-auto border w-full">
                    <thead>
                    <tr>
                        <th class="border p-3">ID</th>
                        <th class="border p-3">Nome</th>
                        <th class="border p-3">Nacionalidade</th>
                        <th class="border p-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in list.data" :key="item.id">
                        <td class="border p-3">{{ item.id }}</td>
                        <td class="border p-3">{{ item.name }}</td>
                        <td v-if="item.foreign == 1" class="border p-3">Estrangeiro</td>
                        <td v-if="item.foreign == 0" class="border p-3">Brasileiro</td>
                        <td class="border p-3">
                            <inertia-link :href="route('details',item.id)" as="button" class="custom-button cursor-pointer  py-2 px-4 rounded inline-flex items-center">
                                  Detalhes                                
                            </inertia-link>
                        </td>
                    </tr>
                    </tbody>
                </table>


               <!-- fim -->
            </div>
         </div>
        </div>
        <div class="bg-white py-5" style="text-align: center !important;">
            <pagination class="mt-6" :links="list.links" />
        </div>
   </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Pagination.vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';

export default {
    components: {
        AppLayout,
        Pagination,
        InertiaLink
    },
    props: {
        list: Object
    }
}
</script>
