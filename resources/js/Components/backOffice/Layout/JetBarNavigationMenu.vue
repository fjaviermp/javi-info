<template>
    <header class="hidden lg:flex justify-end items-center py-4 px-6 bg-white border-b border-gray-200">

        <div class="flex items-center">
            <!-- Dropdown Menu -->
            <div class="relative">
                <button v-if="$page.props.jetstream.managesProfilePhotos" @click="showingUserDropdown = ! showingUserDropdown" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                </button>
                <span v-else @click="showingUserDropdown = ! showingUserDropdown" class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        Usuario

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>

                <div v-show="showingUserDropdown" @click="showingUserDropdown = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                <!-- User menu links -->
                <div v-show="showingUserDropdown"
                     class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl border border-gray-200 z-10"
                     style="display: none;">

                    <template v-if="$page.props.jetstream.hasTeamFeatures">

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Team
                        </div>

                        <inertia-link :href="route('teams.show', $page.props.user.current_team)" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Team Settings</inertia-link>
                        <inertia-link :href="route('teams.create')" v-if="$page.props.jetstream.canCreateTeams" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Create New Team</inertia-link>
                        <div class="border-t border-gray-100"></div>
                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Switch Teams
                        </div>

                        <template v-for="team in $page.props.user.all_teams" :key="team.id">
                            <form @submit.prevent="switchToTeam(team)">
                                <button class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out w-full">
                                    <div class="flex items-center">
                                        <svg v-if="team.id == $page.props.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <div>{{ team.name }}</div>
                                    </div>
                                </button>
                            </form>
                        </template>

                        <div class="border-t border-gray-100"></div>

                    </template>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Administrar Cuenta
                    </div>

                    <inertia-link :href="route('profile.show')" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">Mi perfil</inertia-link>

                    <inertia-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures" class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">API Tokens</inertia-link>

                    <form @submit.prevent="logout">
                        <button class="block px-4 py-2 text-sm text-gray-500 hover:bg-gray-100 w-full text-left focus:outline-none">
                            Desconectarse
                        </button>
                    </form>
                </div>
                <!-- End User menu links -->
            </div>
            <!-- End Dropdown Menu -->
        </div>
    </header>
</template>

<script>
export default {
    name: "JetBarNavigationMenu",
    data() {
        return {
            showingNotificationDropdown: false,
            showingUserDropdown: false,
        }
    },
    methods: {
        switchToTeam(team) {
            this.$inertia.put(route('current-team.update'), {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
}
</script>
