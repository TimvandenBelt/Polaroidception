<template>
    <Head :title="title" />
    <div class="flex h-screen w-full">
        <AdminSidebar />
        <div class="flex w-full flex-1 flex-col bg-primary-0">
            <AdminHeader :title="title" />
            <main class="h-full overflow-y-auto">
                <div class="container mx-auto mt-8 grid px-8">
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AdminSidebar from "@/Layouts/Admincomponents/AdminSidebar";
import AdminHeader from "@/Layouts/Admincomponents/AdminHeader";

export default {
    name: "AdminLayout",
    components: {
        AdminHeader,
        AdminSidebar,
        Head,
    },
    props: {
        title: {
            type: String,
            default: "Polaroidception",
        },
    },
};
</script>
