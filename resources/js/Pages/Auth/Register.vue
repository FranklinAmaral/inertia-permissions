<template>
    <Head title="Log in" />
    <AuthLayout>
        <form @submit.prevent="loginForm.post(route('login.register'))">
            <div>
                <!-- Name -->
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">
                        Name
                    </label>
                    <input v-model="loginForm.name" id="name" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus autocomplete="name">
                    <div v-if="errors.name" class="text-red-600">
                        {{ errors.name }}
                    </div>
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700">
                        Email
                    </label>
                    <input v-model="loginForm.email" id="email" type="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus autocomplete="email">
                    <div v-if="errors.email" class="text-red-600">
                        {{ errors.email }}
                    </div>
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">
                        Password
                    </label>
                    <input v-model="loginForm.password" id="password" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autocomplete="current-password">
                </div>
                <!-- Retype Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
                       Password Confirmation
                    </label>
                    <input v-model="loginForm.password_confirmation" id="password_confirmation" type="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autocomplete="password_confirmation">
                </div>
                <!-- Remember me -->
                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" v-model="loginForm.remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end mt-4">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 ml-4">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>

<script>
import AuthLayout from "../../Layouts/Auth"
import { Head, useForm } from "@inertiajs/inertia-vue3"

export default {
    components: {
        AuthLayout, Head
    },
    props: {
        errors: Object
    },
    setup() {
        const loginForm = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            remember: false
        })

        return { loginForm }
    }
}
</script>
