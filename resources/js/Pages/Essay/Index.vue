<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="pb-5 sm:flex sm:items-center sm:justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        My Atomic Essays
                    </h3>
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <inertia-link :href="route('essays.create')" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create new essay
                        </inertia-link>
                    </div>
                </div>

                <div>
                    <div class="flow-root mt-10">
                        <ul class="-my-5 divide-y divide-gray-200">

                            <template v-for="essay in essays">
                                <li class="py-4" :key="essay.id">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ essay.title }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate">
                                                <template v-if="$moment(essay.created_at).isBefore($moment().startOf('year'))">
                                                    {{ essay.created_at | moment('MMM D, YYYY') }}
                                                </template>
                                                <template v-else>
                                                    {{ essay.created_at | moment('MMM D') }}
                                                </template>
                                            </p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <inertia-link :href="route('essays.show', { essay: essay })" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                View
                                            </inertia-link>

                                            <inertia-link :href="route('essays.edit', { essay: essay })" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                Edit
                                            </inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </template>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        essays: {
            type: Array,
        }
    },
}
</script>
