<template>
    <header class="z-10 h-16 bg-white py-4 shadow-md">
        <div class="items center container mx-auto flex h-full justify-between">
            <h2 class="text-2xl font-semibold text-gray-800">
                {{ title }}
            </h2>
            <ul class="flex flex-shrink-0 items-center space-x-4">
                <li class="align-items-center flex">
                    <UserCircleIcon class="inline-block h-5 w-5" />
                </li>
                <li>Hi, Tim</li>
                <LinkButton @click.passive="profileToggle">
                    Profile
                    <i
                        class="pi pi-chevron-down"
                        style="font-size: 0.75rem"
                    ></i>
                </LinkButton>
                <LinkButton :url="route('index')">
                    <small class="text-sm">Back to site</small>
                </LinkButton>
            </ul>
        </div>
    </header>
</template>
<script>
import { UserCircleIcon } from "@heroicons/vue/outline";

export default {
    name: "AdminHeader",
    components: {
        UserCircleIcon,
    },
    props: {
        title: {
            type: String,
            default: "Polaroidception",
        },
    },
    data() {
        return {
            profileMenuItems: [
                {
                    label: "Profile",
                    url: route("admin.profile.index"),
                },
                {
                    separator: true,
                },
                {
                    label: "Settings",
                    url: route("admin.settings.index"),
                },
                {
                    separator: true,
                },
                {
                    label: "Logout",
                    // eslint-disable-next-line no-undef
                    url: route("logout"),
                    method: "POST",
                },
            ],
        };
    },
    methods: {
        profileToggle(event) {
            this.$refs.profileMenu.toggle(event);
        },
    },
};
</script>
