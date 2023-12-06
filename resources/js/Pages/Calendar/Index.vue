<template>
    <Head title="Job Vacancy" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Scheduled Job Vacancy</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <Link href="/scheduled_vacancies/create" as="button" type="button"
                    class="mb-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Schedule Job </Link>
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    User</th>
                                <th
                                    class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Vacancy</th>
                                <th
                                    class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Status</th>
                                <!-- <th
                                    class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="scheduledVacancy in scheduledVacancies" :key="scheduledVacancy.id">
                                <td class="x-5 px-6  py-5 border-b border-gray-200 bg-white text-sm">{{
                                    scheduledVacancy.user.name }}</td>
                                <td class="x-5 px-6  py-5 border-b border-gray-200 bg-white text-sm">{{
                                    scheduledVacancy.vacancy.job_name }}</td>
                                <td class="x-5 px-6  py-5 border-b border-gray-200 bg-white text-sm">{{
                                    scheduledVacancy.status == 1 ? "Active" : "Inactive" }}</td>
                                   <!--<td class="x-5 px-6  py-5 border-b border-gray-200 bg-white text-sm">

                                  <div class="dropdown">
                                        <button class="btn btn-white" type="button" id="dropdownMenuIconButton1"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-more"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                            <Link class="dropdown-item"
                                                :href="route('scheduled_vacancies.edit', scheduledVacancy)">
                                            <font class="text-primary">Edit</font>
                                            </Link>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"
                                                @click.prevent="confirmDeletion(scheduledVacancy)">
                                                <font color="red">Delete</font>
                                            </a>

                                        </div>
                                    </div>
                                </td>-->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { ref } from 'vue';


var props =
    defineProps({
        scheduledVacancies: {
            type: Object,
        },
        error: {
            type: Object,
        },
        success: {
            type: Object,
        },
    });



const confirmDeletion = function (id) {

}


</script>
