<template>
    <Head title="Edit user" />
    <AppLayout>
        <form @submit.prevent="form.put(route('users.update', form.id))">
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

                <div class="mt-4">
                    <label for="profile_id" class="block font-medium text-sm text-gray-700">
                        Profile
                    </label>
                    <div v-for="(profile, key) in profiles" >
                        <input type="checkbox" id="profile_id" name="profile_id" :value="key"> {{ profile.name }}<br/>
                    </div>
                    <div v-if="errors.profile_id" class="text-red-600">
                        {{ errors.profile_id }}
                    </div>

                </div>

            </div>

            <div class="py-4">
                <button type="submit" :disabled="form.processing" class="inline-block px-4 py-3 bg-blue-500 text-white rounded">
                    Save post
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
        user: Object,
        profiles: Object,
        errors: Object
    },
    setup(props) {
        const form = useForm(props.user)

        return { form }
    }
}
</script>
