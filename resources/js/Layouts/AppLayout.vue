<template>
    <div class="font-sans antialiased bg-gray-100">
        <jet-banner />

        <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">
            <jet-bar-sidebar v-bind:options="options" />

            <div class="w-full">
                <jet-bar-navigation-menu />
                <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0">
                    <div v-if="this.$slots.header" class="max-w-7xl mx-auto pt-3 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-lg font-semibold tracking-widest text-gray-900 uppercase dark-mode:text-white">
                            <slot name="header"></slot>
                        </h1>
                    </div>
                    <div>
                        <div class="min-h-full lg:min-h-96 px-4 sm:px-0">
                            <slot></slot>
                        </div>
                    </div>
                </main>
            </div>

        </div>

    </div>
</template>

<script setup>
    const props = defineProps({
        options: Object,
    });
</script>

<script>
import JetApplicationMark from '@/Components/backOffice/Layout/ApplicationMark.vue'
import JetBanner from '@/Components/backOffice/Layout/Banner.vue'
import JetDropdown from '@/Components/backOffice/Layout/Dropdown.vue'
import JetDropdownLink from '@/Components/backOffice/Layout/DropdownLink.vue'
import JetNavLink from '@/Components/backOffice/Layout/NavLink.vue'
import JetResponsiveNavLink from '@/Components/backOffice/Layout/ResponsiveNavLink.vue'
import JetBarNavigationMenu from "@/Components/backOffice/Layout/JetBarNavigationMenu.vue";
import JetBarSidebar from "@/Components/backOffice/Layout/JetBarSidebar.vue";

export default {
    components: {
        JetBarSidebar,
        JetBarNavigationMenu,
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },
}
</script>
