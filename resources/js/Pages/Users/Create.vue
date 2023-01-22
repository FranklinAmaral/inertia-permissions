<template>
    <Head title="New user" />
    <AppLayout>
        <form @submit.prevent="form.post(route('users.store'))">
            <div>
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">
                        Name
                    </label>
                    <input v-model="form.name" type="text" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <div v-if="errors.name" class="text-red-600">
                        {{ errors.name }}
                    </div>
                </div>
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700">
                        Email
                    </label>
                    <input v-model="form.email" type="text" id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <div v-if="errors.email" class="text-red-600">
                        {{ errors.email }}
                    </div>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">
                        Password
                    </label>
                    <input v-model="form.password" id="password" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autocomplete="current-password">
                </div>
                <!-- Retype Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
                       Password Confirmation
                    </label>
                    <input v-model="form.password_confirmation" id="password_confirmation" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autocomplete="password_confirmation">
                    <div v-if="errors.password_confirmation" class="text-red-600">
                        {{ errors.password }}
                    </div>
                </div>
            </div>

            <div class="py-4">
                <button type="submit" :disabled="form.processing" class="inline-block px-4 py-3 bg-blue-500 text-white rounded">
                    Save
                </button>
                <Link :href="route('users.index')" class="ml-2 inline-block px-4 py-3 bg-gray-100 rounded">
                    Cancel
                </Link>
            </div>
        </form>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/App"
import { Head, Link, useForm } from "@inertiajs/inertia-vue3"

export default {
    components: {
        AppLayout, Head, Link
    },
    props: {
        errors: Object
    },
    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        })

        return { form }
    }
}
</script>
