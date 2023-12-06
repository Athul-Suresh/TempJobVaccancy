<template>
    <Head title="Job Vacancy" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="/vacancies/create"  as="button" type="button" class="mb-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Add Vacancy</Link>
                    <div
        class="inline-block min-w-full shadow-md rounded-lg overflow-hidden"
      >
                <table class="min-w-full leading-normal w-full">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Job Name</th>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Start Date</th>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">End Date</th>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Description</th>
                            <th class="px-5 py-3 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="vacancy in vacancies">
                            <td class="x-5 px-6 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ vacancy.job.job_name }}
                            </td>
                            <td class="x-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ vacancy.status==1?"Active":"Inactive" }}
                            </td>
                            <td class="x-5  py-5 border-b border-gray-200 bg-white text-sm">
                                {{ vacancy.start_date }}
                            </td>
                            <td class="x-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ vacancy.end_date }}
                            </td>
                            <td class="x-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ vacancy.description }}
                            </td>
                            <td class="x-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="dropdown">
                                                    <button class="btn btn-white" type="button" id="dropdownMenuIconButton1"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-more"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                                                        <Link class="dropdown-item"
                                                            :href="route('vacancies.edit',vacancy)">
                                                        <font class="text-primary">Edit</font>
                                                        </Link>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            @click.prevent="confirmDeletion(vacancy.id)">
                                                            <font color="red">Delete</font>
                                                        </a>

                                                    </div>
                                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>


        </div>

        <Modal :show="confirmingDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete
                </h2>
                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteVacancy()"
                    >
                        Delete
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { ref } from 'vue';



defineProps({
    vacancies: {
        type: Object,
    },
    jobs: {
        type: Object,
    },
});

const confirmingDeletion = ref(false);
const  form = useForm({id:'',});

const confirmDeletion = (id) => {
    confirmingDeletion.value = true;
    form.id=id;
};

const deleteVacancy = () => {
    form.delete(route('vacancies.destroy',form.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingDeletion.value = false;
    form.reset();
};

</script>

<style lang="scss" scoped></style>
