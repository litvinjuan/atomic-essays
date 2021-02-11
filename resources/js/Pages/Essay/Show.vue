<template>

    <app-layout>

        <div class="py-10">
            <!-- Page header -->
            <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8 mb-8">
                <div class="flex items-center space-x-5">
                    <div>
                        <template v-if="essay.titlte">
                            <h1 class="text-2xl font-bold text-gray-900">{{ essay.title }}</h1>
                        </template>
                        <template v-else>
                            <h1 class="text-2xl font-bold text-gray-500">Untitled</h1>
                        </template>
                        <p class="text-sm font-medium text-gray-500">
                            <template v-if="$moment(essay.created_at).isBefore($moment().startOf('year'))">
                                {{ essay.created_at | moment('MMM D, YYYY') }}
                            </template>
                            <template v-else>
                                {{ essay.created_at | moment('MMM D') }}
                            </template>
                        </p>
                    </div>
                </div>
                <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
<!--                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">-->
<!--                        Disqualify-->
<!--                    </button>-->
<!--                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">-->
<!--                        Advance to offer-->
<!--                    </button>-->
                </div>
            </div>

            <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl mb-6">

                <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
                          <span class="flex p-2 rounded-lg bg-indigo-800">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
                            </svg>
                          </span>
                            <p class="ml-3 font-medium text-white truncate flex flex-col leading-tight">
                                <span class="hidden md:inline">You made some changes that haven't been saved.</span>
                                <span class="font-normal text-sm text-gray-300">Last saved {{ essay.updated_at | moment('from') }}</span>
                            </p>
                        </div>
                        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto flex items-center space-x-4">
                            <button @click.prevent="discard" class="inline-flex items-center px-4 py-2 border-2 border-white text-white text-sm font-medium rounded-md bg-transparent hover:bg-white hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Discard
                            </button>

                            <button @click.prevent="save" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                                Save
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                    <section>

                        <div class="rounded-2xl bg-yellow-100 text-gray-900 shadow-lg w-full max-w-3xl flex flex-col px-6 group">

                            <div class="px-1 pt-6">
                                <div contenteditable @input="form.title = $event.target.innerText" class="bg-transparent focus:outline-none text-5xl font-semibold leading-tight">{{ form.title }}</div>
                            </div>

                            <vue-editor
                                class="hidden group-hover:block"
                                placeholder="Write your essay..."
                                v-model="form.body"
                                :editor-toolbar="[['bold', 'italic', 'underline', 'link'], [{ font: [] }, { size: ['small', false, 'large', 'huge'] }], [{ list: 'ordered' }, { list: 'bullet' }, { list: 'check' }], [{ indent: '-1' }, { indent: '+1' }], [{ color: [] }], ['blockquote', 'code-block'] ]"
                            />

                            <div class="block group-hover:hidden" style="padding: 50px 15px 12px 15px;" v-html="form.body"></div>

                            <div class="px-1 pb-6 pt-12">
                                <div class="bg-white px-4 py-4 rounded-lg flex items-center justify-between">
                                    <div class="flex flex-col items-start">
                                        <a href="">@dickibush</a>
                                        <a href="">ship30for30.com</a>
                                    </div>

                                    <span class="font-semibold text-lg">#Ship30For30</span>
                                </div>
                            </div>

                        </div>

                        <span class="mt-5 text-sm text-gray-500 flex items-center space-x-2">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                              <path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />
                            </svg>
                            <span>Hover your mouse over your essay to modify it</span>
                        </span>

<!--                        <div class="rounded-lg bg-yellow-100 text-gray-900 shadow-lg w-full max-w-3xl px-12 py-12 flex flex-col" contenteditable="true">-->

<!--                            <div class="text-5xl leading-snug font-bold focus:outline-none">Untitled</div>-->

<!--                            <template v-for="paragraph in form.paragraphs">-->

<!--                                {{ parseParagraph(paragraph) }}-->

<!--                            </template>-->

<!--                        </div>-->

                    </section>
                </div>

                <section aria-labelledby="distribute-title" class="lg:col-start-3 lg:col-span-1">
                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                        <h2 id="distribute-title" class="text-lg font-medium text-gray-900">Distribute</h2>

                        <!-- Export Actions -->
                        <div class="mt-6 flow-root">
                            <div class="flex flex-col space-y-4">
                                <button type="button" class="w-full inline-flex items-center justify-center text-center px-4 py-2 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Download as PNG
                                </button>

                                <button type="button" class="w-full inline-flex items-center justify-center text-center px-4 py-2 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Copy Image to Clipboard
                                </button>

                                <button type="button" class="w-full inline-flex items-center justify-center text-center px-4 py-2 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Share on Twitter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6 mt-6">
                        <h2 id="links-title" class="text-lg font-medium text-gray-900">Links</h2>

                        <!-- Link Form -->
                        <div class="mt-6 flow-root">
                            <div class="flex flex-col space-y-6">
                                <div>
                                    <label for="twitter" class="block text-sm font-medium text-gray-700">Tweet Link</label>
                                    <div class="mt-1">
                                        <input type="text" name="twitter" id="twitter" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="https://twitter.com/username/status/tweet">
                                    </div>
                                </div>

                                <div>
                                    <label for="medium" class="block text-sm font-medium text-gray-700">Medium Link</label>
                                    <div class="mt-1">
                                        <input type="text" name="medium" id="medium" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="https://medium.com/@username/story">
                                    </div>
                                </div>

                                <div>
                                    <label for="website" class="block text-sm font-medium text-gray-700">Website/Blog Link</label>
                                    <div class="mt-1">
                                        <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="https://example.com/">
                                    </div>
                                </div>

                                <button type="button" class="w-full inline-flex items-center justify-center text-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save Links
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </app-layout>

</template>

<script>
const types = {
    link: 0,
    bold: 1,
    italic: 2,
}

export default {
    data() {
        return {
            form: this.$inertia.form({
                title: 'This is my first Atomic Essay',
                body: '<p><u>asda<strong>s<em>das</em>das</strong>dasd</u>asd</p>',
            }),
        }
    },
    props: {
        essay: {
            type: Object,
        }
    },
    methods: {
        save() {

        },
        discard() {

        },
    },
}
</script>
