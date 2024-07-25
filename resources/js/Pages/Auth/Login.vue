<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">
      <div class="max-w-md w-full sm:max-w-lg bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="flex justify-center mt-8">
          <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
        </div>
        <div class="px-6 py-8">
          <Head title="Log in" />
          <div v-if="status" class="mb-4 font-medium text-sm text-green-400">
            {{ status }}
          </div>
          <form @submit.prevent="submit">
            <div>
              <InputLabel for="email" value="Email" class="text-sm font-bold text-gray-300" />
              <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full bg-gray-700 text-gray-300 border border-transparent focus:border-purple-500 rounded-md py-2 px-3 placeholder-gray-500 focus:outline-none"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
              />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="mt-4">
              <InputLabel for="password" value="Password" class="text-sm font-bold text-gray-300" />
              <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full bg-gray-700 text-gray-300 border border-transparent focus:border-purple-500 rounded-md py-2 px-3 placeholder-gray-500 focus:outline-none"
                v-model="form.password"
                required
                autocomplete="current-password"
              />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="flex items-center justify-between mt-4">
              <label class="flex items-center text-gray-400">
                <Checkbox name="remember" v-model:checked="form.remember" class="text-purple-400" />
                <span class="ml-2 text-sm">Remember me</span>
              </label>
              <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="text-sm text-purple-500 hover:text-purple-300"
              >
                Forgot your password?
              </Link>
            </div>
            <div class="flex items-center justify-end mt-6">
              <PrimaryButton
                class="text-white bg-purple-500 hover:bg-purple-600 focus:ring-purple-500 focus:ring-offset-purple-200"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Log in
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import { Link } from '@inertiajs/vue3';
  import { Head, useForm } from '@inertiajs/vue3';
  import Checkbox from '@/Components/Checkbox.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';

  defineProps({
    canResetPassword: {
      type: Boolean,
    },
    status: {
      type: String,
    },
  });

  const form = useForm({
    email: '',
    password: '',
    remember: false,
  });

  const submit = () => {
    form.post(route('login'), {
      onFinish: () => form.reset('password'),
    });
  };
  </script>
