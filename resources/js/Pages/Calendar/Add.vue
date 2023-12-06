<template>
    <Head title="Job Vacancy" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Scheduled Job Vacancy</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <form @submit.prevent="submit" class="mt-6 space-y-6">


                            <div>
                                <InputLabel for="user_id" value="Job" />
                                <select id="user_id" v-model="form.user_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="">Select</option>
                                    <option v-for="job in jobs" :value="job.id">{{ job.job_name }}</option>
                                </select>
                                <InputError :message="form.errors.user_id" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="user_id" value="Job" />
                                <select id="user_id" v-model="form.user_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="">Select</option>
                                    <option v-for="vacancy in vacancies" :value="vacancy.id">{{ vacancy.job_id }}</option>
                                </select>
                                <InputError :message="form.errors.user_id" class="mt-2" />
                            </div>

                        </form>
                    </section>
                </div>
            </div>
            </div>


    </AuthenticatedLayout>
</template>


<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';


var props =
    defineProps({
       vacancies: {
            type: Object,
        },
        jobs: {
            type: Object,
        },
        error: {
            type: Object,
        },
        success: {
            type: Object,
        },
    });

    const form = useForm({
        user_id:'',
        vacancy_id:'',
        status:'',
    })
</script>
