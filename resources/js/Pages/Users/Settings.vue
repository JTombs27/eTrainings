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

         <div class="col-md-6">
            <div class="bgc-white p-20 bd">
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label mb-2"><strong>Photo</strong></div>
                            <div class="item-data">
                                <div class="col-md-4">
                                    <FilePond
                                        v-if="isChangePhoto"
                                        name="avatar"
                                        id="avatar"
                                        ref="pond"
                                        label-idle="Click or drop your photo here..."
                                        @removefile="processing = false"
                                        @processfilestart="processing = true"
                                        @addfile="processing = true"
                                        @processfiles="processing = false"
                                        maxFileSize="1MB"
                                        allowImageTransform="true"
                                        allowImageCrop="true"
                                        imageCropAspectRatio="1:1"
                                        v-bind:allow-multiple="false"
                                        accepted-file-types="image/jpeg, image/png"
                                        v-bind:files="myFiles"
                                        :server="{
                                            url: '/files/upload',
                                            process: {
                                                headers: {
                                                    'X-CSRF-TOKEN': csrfToken 
                                                }
                                            },
                                            revert: {
                                                url: '/delete',
                                                headers: {
                                                    'X-CSRF-TOKEN': csrfToken,
                                                    'Content-Type':'application/json'
                                                }
                                            },
                                        }"
                                    />
                                    <img v-else 
                                        class="profile-image img-fluid" 
                                        :src="$page.props.auth.user.photo" 
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col text-end">
                            <button class="btn-sm btn-secondary" :disabled="processing"  v-if="isChangePhoto" @click="changePhoto">Save</button>
                            <button class="btn-sm btn-secondary" v-else @click="isChangePhoto= !isChangePhoto">Change</button>
                        </div>
                    </div>
                </div>
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Name</strong></div>
                            <div class="item-data" v-if="isChangeName">
                                <input 
                                    type="text"
                                    class="form-control"
                                    v-model="form.name"
                                />
                            </div>
                            <div class="item-data" v-else>{{ $page.props.auth.user.username }}</div>
                        </div>
                        <div class="col text-end">
                            <button class="btn-sm btn-secondary"  v-if="isChangeName" @click="changeName" :disabled="form.processing">Save</button>
                            <button class="btn-sm btn-secondary" v-else @click="isChangeName= !isChangeName">Change</button>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default { 
    data() { 
        return { 
            csrfToken: document.querySelector('meta[name="csrf-token"]').content,
            pageTitle: "Settings",
            isChangePhoto: false,
            isChangeName: false,
            name: this.$page.props.auth.user.username,
            myFiles: [],
            form: useForm({
                name: this.$page.props.auth.user.username,
            }),
            processing: false
        };
    },
    methods: {
        back() {
            window.history.back();
        },
        changeName() {
            let vm = this
            
            this.form.post("/users/change-name", {
                replace: true,
                onFinish: () => {
                    vm.isChangeName = !vm.isChangeName
                }
            });
        },

        changePhoto() {
            let vm = this
            
            let folder = document.querySelector("input[type='hidden']").value
            this.$inertia.post('/users/change-photo', {'folder': folder}, {
                replace: true,
                onFinish: () => {
                    vm.isChangePhoto = !vm.isChangePhoto
                }
            });
        },
    }
}

</script>
