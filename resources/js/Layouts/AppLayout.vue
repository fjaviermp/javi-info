<template>
    <div class="font-sans antialiased bg-gray-100">
        <jet-banner />

        <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">

            <!-- Sidebar -->
            <jet-bar-sidebar />
            <!-- End Sidebar -->

            <div class="w-full">

                <!-- Top Navbar -->
                <jet-bar-navigation-menu />
                <!-- End Top Navbar -->

                <!-- Content Container -->
                <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0">
                    <div v-if="this.$slots.header" class="max-w-7xl mx-auto pt-3 px-4 sm:px-6 lg:px-8">
                        <!-- Title -->
                        <h1 class="text-lg font-semibold tracking-widest text-gray-900 uppercase dark-mode:text-white">
                            <slot name="header"></slot>
                        </h1>
                        <!-- End Title -->
                    </div>
                    <!-- Replace with your content -->
                    <div>
                        <!-- Content -->
                        <div class="min-h-full lg:min-h-96 px-4 sm:px-0">
                            <slot></slot>
                        </div>
                        <!-- End Content -->
                    </div>
                    <!-- /End replace -->
                </main>
                <!-- Content Container -->

            </div>

        </div>

    </div>
</template>

<script>
import JetApplicationMark from '@/Components/ApplicationMark.vue'
import JetBanner from '@/Components/Banner.vue'
import JetDropdown from '@/Components/Dropdown.vue'
import JetDropdownLink from '@/Components/DropdownLink.vue'
import JetNavLink from '@/Components/NavLink.vue'
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import JetBarNavigationMenu from "@/Components/JetBarNavigationMenu.vue";
import JetBarSidebar from "@/Components/JetBarSidebar.vue";

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
