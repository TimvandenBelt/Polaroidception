<template>
    <Card>
        <div
            class="overflow-hidden rounded-t-lg border border-slate-200 shadow-md"
        >
            <table
                class="w-full table-auto"
                aria-label="Table containing the pages of the website"
            >
                <thead
                    class="rounded-lg bg-primary-100 text-lg font-semibold text-gray-600"
                >
                    <tr>
                        <th
                            v-for="col in cols"
                            :key="col"
                            :scope="col"
                            class="border-l border-slate-300 py-2 first:border-l-0"
                        >
                            {{ col }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="page in pages"
                        :key="page.id"
                        class="border-b border-primary-50 odd:bg-white even:bg-primary-50 hover:bg-primary-100 hover:text-black"
                    >
                        <template v-for="col in cols" :key="col">
                            <td
                                class="border-l border-slate-300 p-3 first:border-l-0"
                            >
                                <div v-if="col === 'tags'" class="flex">
                                    <div
                                        v-for="tag in page.tags"
                                        :key="tag"
                                        class="tag flex items-center bg-gray-100 text-xs text-gray-900 hover:bg-gray-300"
                                    >
                                        <div
                                            class="mr-2 h-1.5 w-1.5 rounded-full bg-gray-400"
                                        ></div>
                                        {{ tag }}
                                    </div>
                                </div>
                                <div
                                    v-else-if="col === 'edit'"
                                    class="justify-between text-center"
                                >
                                    <span
                                        class="tag rounded bg-yellow-100 p-2 p-2 text-sm text-yellow-900 hover:bg-yellow-300"
                                        >Edit</span
                                    >
                                    <span
                                        class="tag bg-red-100 p-2 text-sm text-red-900 hover:bg-red-300"
                                        @click="deletePage(page.id)"
                                        @keypress="deletePage(page.id)"
                                        >Delete</span
                                    >
                                </div>
                                <template v-else>
                                    {{ page[col] }}
                                </template>
                            </td>
                        </template>
                    </tr>
                </tbody>
            </table>
        </div>
        <TransitionRoot appear :show="showDialog" as="template">
            <Dialog :open="showDialog" @close="toggleDialog(false)">
                <div class="fixed inset-0 z-30 overflow-y-auto">
                    <div class="min-h-screen px-4 text-center">
                        <TransitionChild
                            as="template"
                            enter="transition-opacity duration-300 ease-out"
                            enter-from="opacity-0"
                            enter-to="opacity-30"
                            leave="transition-opacity duration-200 ease-in"
                            leave-from="opacity-30"
                            leave-to="opacity-0"
                        >
                            <DialogOverlay
                                class="fixed inset-0 bg-black opacity-40"
                            />
                        </TransitionChild>
                        <span
                            class="inline-block h-screen align-middle"
                            aria-hidden="true"
                        >
                            &#8203;
                        </span>
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <div
                                class="my-8 inline-block w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                            >
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Payment successful
                                </DialogTitle>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Your payment has been successfully
                                        submitted. We’ve sent you an email with
                                        all of the details of your order.
                                    </p>
                                </div>
                            </div>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </Card>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout";
import Card from "@/Components/Card";
import {
    Dialog,
    DialogDescription,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

export default {
    name: "PagesIndex",
    components: {
        Card,
        TransitionRoot,
        DialogDescription,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
    },
    layout: AdminLayout,
    data() {
        return {
            cols: ["image", "title", "tags", "edit"],
            pages: [
                {
                    id: 1,
                    title: "Polaroid #1",
                    image: "Polaroid #1",
                    tags: [1, 2, 3],
                },
                {
                    id: 2,
                    title: "Polaroid #1",
                    image: "Polaroid #1",
                    tags: ["Tag 1", "Tag 2", "Tag 3", "Tag 4", "Tag 5"],
                },
            ],
            showDialog: false,
            deletePageId: null,
        };
    },
    methods: {
        deletePage(id) {
            this.showDialog = true;
        },
        toggleDialog(value) {
            this.showDialog = value;
        },
    },
};
</script>
