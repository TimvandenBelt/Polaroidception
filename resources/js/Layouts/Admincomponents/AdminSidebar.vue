<template>
    <nav class="z-20 block w-60 flex-shrink-0 overflow-y-auto bg-white">
        <div class="py-5">
            <Link
                class="pointer block w-full text-center text-xl font-bold text-gray-800"
                >{{ appName }}
            </Link>
            <ul class="mt-4 text-gray-600">
                <linkButton
                    :url="route('admin.index')"
                    is-active-through-component="Admin/AdminIndex"
                    is-menu-item
                    text="Dashboard"
                >
                    <template #icon>
                        <HomeIcon></HomeIcon>
                    </template>
                </linkButton>
                <linkButton
                    :url="route('admin.pages.index')"
                    is-menu-item
                    text="Pages"
                >
                    <template #icon>
                        <DocumentIcon></DocumentIcon>
                    </template>
                </linkButton>
                <linkButton
                    :url="route('admin.photos.index')"
                    is-menu-item
                    text="Photos"
                >
                    <template #icon>
                        <PhotographIcon></PhotographIcon>
                    </template>
                </linkButton>
                <linkButton
                    :url="route('admin.tags.index')"
                    is-menu-item
                    text="Tags"
                >
                    <template #icon>
                        <TagIcon></TagIcon>
                    </template>
                </linkButton>
            </ul>
        </div>
    </nav>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import {
    DocumentIcon,
    HomeIcon,
    PhotographIcon,
    TagIcon,
} from "@heroicons/vue/outline";

export default {
    name: "AdminSidebar",
    components: {
        Link,
        PhotographIcon,
        HomeIcon,
        TagIcon,
        DocumentIcon,
    },
    data() {
        return {
            appName: window.appName,
        };
    },
};
</script>
