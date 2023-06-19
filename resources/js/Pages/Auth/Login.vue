<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

import AuthenticationCard from '@/Components/auth/AuthenticationCard.vue';

import Checkbox from '@/Components/forms/Checkbox.vue';
import InputError from '@/Components/forms/InputError.vue';
import InputLabel from '@/Components/forms/InputLabel.vue';
import PrimaryButton from '@/Components/forms/PrimaryButton.vue';
import TextInput from '@/Components/forms/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

    <div id="bgImage"></div>

    <div id="loginZone">
    <div id="loginCard">

        <Link :href="route('home')" class="imgLogin">
            <img class="img-fluid" src="logo.png" alt="Logo de la web">
        </Link>

        <div class="loginContent">

            <form @submit.prevent="submit">
                <div class="inputField">
                    <InputLabel for="email" value="E-mail:" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="form-control"
                        required
                        autofocus
                        autocomplete="username"
                    />
                </div>

                <div class="inputField">
                    <InputLabel for="password" value="Contraseña:" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        class="form-control"
                        autocomplete="current-password"
                    />
                </div>

                <InputError :message="form.errors.email" />
                <InputError :message="form.errors.password" />

                <div class="loginChecks">
                    <div>
                        <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="mx-2">Recordar</span>
                    </div>
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Iniciar Sesión
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
    </div>
</template>

<style>
    #bgImage{
        width: 100%;
        height: 100vh;
        background-image: url("/img/bg.webp");
        position: absolute;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
    }

    #loginZone{
        width: 25%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin: 0 auto;
    }

    #loginCard{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height: auto;
        background-color: white;
        padding: 2em;
        border-radius: 0.5em;
    }

    #loginCard .imgLogin{
        height: auto;
        width: 50%;
    }

    .loginContent{
        margin-top: 1em;
        width: 100%;
    }

    .inputField{
        display: flex;
        width: 100%;
        flex-direction: column;
        justify-content: center;
        margin: 2em 0 2em 0;
    }

    .inputField label{
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .inputField input{
        width: 100%;
    }

    .loginChecks{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .loginChecks div{
        width: 40%;
    }

    @media (max-width: 1200px){
        #loginZone{
            width: 40%;
        }
    }
    @media (max-width: 800px){
        #loginZone{
            width: 80%;
        }
    }
</style>
