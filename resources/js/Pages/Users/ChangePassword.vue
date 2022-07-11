<template>
    <div class="row gap-20 masonry pos-r">
        <div class="peers fxw-nw jc-sb ai-c">
            <h3>{{ pageTitle }}</h3>
            <Link href="/" @click="back">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                </svg>
            </Link>
        </div>
        <div class="col-md-8">
            <form @submit.prevent="submit()">
                <label for="">Old Password</label>
                <input type="text" v-model="form.old" class="form-control" autocomplete="chrome-off">
                <div class="fs-6 c-red-500" v-if="form.errors.old">{{ form.errors.old }}</div>
                <label for="">New Password</label>
                <input type="text" v-model="form.new" class="form-control" autocomplete="chrome-off">
                <label for="">Confirm Password</label>
                <input type="password" v-model="form.confirm" class="form-control" autocomplete="chrome-off">
                <input type="hidden" v-model="form.id" class="form-control" autocomplete="chrome-off">
                <button type="button" class="btn btn-primary mt-3" @click="submit()" :disabled="form.processing">Save changes</button>
            </form>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    data() { 
        return { 
            form: useForm({
                old: "",
                new: "",
                confirm: "",
            }),
            pageTitle: "Change Password"
        };
    },
    methods: {
        back() {
            window.history.back();
        },
        submit() {
             this.form.post("/users/update-password", this.form);
        }
    }
}
</script>
