<template>
    <Head title="Add Job Vacancy" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Job Vacancy</h2>
        </template>



        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <form @submit.prevent="submit" class="mt-6 space-y-6">


                            <div>
                                <InputLabel for="job_id" value="Job" />
                                <select id="job_id" v-model="form.job_id"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="">Select</option>
                                    <option v-for="job in jobs" :value="job.id">{{ job.job_name }}</option>
                                </select>
                                <InputError :message="form.errors.job_id" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="status" value="Status" />
                                <select id="status" v-model="form.status"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <InputError :message="form.errors.status" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="start_date" value="Start Date" />
                                <TextInput id="start_date" ref="StartDateInput" v-model="form.start_date" type="date"
                                    class="mt-1 block w-full" />
                                <InputError :message="form.errors.start_date" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="end_date" value="End Date" />
                                <TextInput id="end_date" ref="StartDateInput" v-model="form.end_date" type="date"
                                    class="mt-1 block w-full" />
                                <InputError :message="form.errors.end_date" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />
                                <TextArea id="description" ref="StartDateInput" v-model="form.description"
                                    class="mt-1 block w-full"></TextArea>
                                <InputError :message="form.errors.description" class="mt-2" />
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
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
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Link, useForm, usePage, Head } from '@inertiajs/vue3';

var props =
defineProps({
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
const currentDate = new Date().toISOString().split('T')[0];
const tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
const tomorrowDate = tomorrow.toISOString().split('T')[0];

const form = useForm({
    job_id: '',
    status: '1',
    start_date: currentDate,
    end_date: tomorrowDate,
    description: '',
});


function submit() {
    form.post(route('vacancies.store'), {
        preserveScroll: true,
        onSuccess: () => {
            if (props.success) {
                form.clearErrors();
            }
        },
    })
}

</script>

<style lang="scss" scoped></style>
