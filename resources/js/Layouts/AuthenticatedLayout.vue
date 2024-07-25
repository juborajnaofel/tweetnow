<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link, usePage } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
    <div class="fixed top-0 w-full bg-gray-900">
      <nav class="bg-gray-900 border-b border-gray-800">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex items-center">

              <div class="flex-shrink-0">
                <Link :href="route('home.feed')">
                    <ApplicationLogo class="w-12 h-12 fill-current text-gray-500 border border-gray-100" />
                </Link>
              </div>

              <div class="hidden sm:-my-px sm:ml-10 sm:flex space-x-8">
                <Link :href="route('home.feed')" :class="route().current('home.feed') ? 'text-white bg-slate-700' : 'text-slate-200'">
                  Home
                </Link>
                <Link
                  :href="route('profile.view', usePage().props.auth.user.id)"
                  :class="route().current('profile.view', usePage().props.auth.user.id) ? 'text-white bg-slate-700' : 'text-slate-200'"
                >
                  Profile
                </Link>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <button
                    type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-white hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150"
                  >
                    {{ $page.props.auth.user.name }}
                    <svg
                      class="ml-2 -mr-0.5 h-4 w-4 text-gray-400"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </button>
                </template>

                <template #content>
                  <DropdownLink :href="route('profile.edit')">Profile Settings</DropdownLink>
                  <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                </template>
              </Dropdown>
            </div>


            <div class="-mr-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out"
              >
                <svg
                  class="h-6 w-6"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <div
          :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
          class="sm:hidden bg-gray-900"
        >
          <div class="pt-2 pb-3 space-y-1">
            <ResponsiveNavLink :href="route('home.feed')" :active="route().current('home.feed')">
              Home
            </ResponsiveNavLink>
          </div>

          <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
              <div class="font-medium text-base text-white">{{ $page.props.auth.user.name }}</div>
              <div class="font-medium text-sm text-gray-400">{{ $page.props.auth.user.email }}</div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink :href="route('profile.edit')">Profile Settings</ResponsiveNavLink>
              <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
            </div>
          </div>
        </div>
      </nav>


      <header class="bg-gray-900 dark:bg-gray-800 shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>
    </div>


    <main class="mt-[100px]">
      <slot />
    </main>
  </div>
</template>
