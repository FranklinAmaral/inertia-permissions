<template>
    <Head title="Edit profile" />
    <AppLayout>
        <form @submit.prevent="form.put(route('profiles.update', form.id))">
            <div>
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">
                        Name Profile
                    </label>
                    <input v-model="form.name" type="text" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <div v-if="errors.name" class="text-red-600">
                        {{ errors.name }}
                    </div>
                </div>

                <div class="mt-4">
                    <label for="status" class="block font-medium text-sm text-gray-700">
                        Status
                    </label>
                    <!-- PRIMEIRA TENTATIVA -->
                    <input v-if="form.status == 1 "  checked type="checkbox" name="status" v-model="form.status">
                    <input v-else type="checkbox" name="status"  v-model="form.status"> {{ form.status_name }}

                    <div v-if="errors.status" class="text-red-600">
                        {{ errors.status }}
                    </div>

                </div>
            </div>

            <div class="py-4">
                <button type="submit" :disabled="form.processing" class="inline-block px-4 py-3 bg-blue-500 text-white rounded">
                    Save post
                </button>
                <Link :href="route('profiles.index')" class="ml-2 inline-block px-4 py-3 bg-gray-100 rounded">
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
        profile: Object,
        errors: Object
    },
    setup(props) {
        const form = useForm(props.profile)

        return { form }
    }
}
</script>
