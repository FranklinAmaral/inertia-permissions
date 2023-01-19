<template>
    <Head title="Profile list" />
    <AppLayout>
        <Link v-if="permissions.posts_create" :href="route('profiles.create')" class="inline-block px-4 py-3 bg-blue-500 text-white rounded mb-4">Add new profile</Link>

        <table v-if="permissions.posts_view" class="mt-4 min-w-full divide-y divide-gray-200 border">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created at</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left">
                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Options</span>
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <tr v-for="profile in profiles">
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ profile.id }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ profile.name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ profile.status_name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ profile.created_at }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    <Link v-if="permissions.posts_edit" :href="route('profiles.edit', profile.id)" class="px-2 py-1 bg-blue-600 text-white rounded font-bold uppercase mr-2">Edit</Link>
                    <button v-if="permissions.posts_edit" @click="destroy(profile.id)" type="button" class="px-2 py-1 bg-red-600 text-white rounded font-bold uppercase">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/App"
import { Head, Link } from "@inertiajs/inertia-vue3"
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {
        AppLayout, Head, Link
    },
    props: {
        profiles: Object,
        permissions: Object,
    },
    setup() {
        const destroy = (id) => {
            if (confirm('Are you sure?')) {
                Inertia.delete(route('profiles.destroy', id))
            }
        }

        return { destroy }
    }
}
</script>
