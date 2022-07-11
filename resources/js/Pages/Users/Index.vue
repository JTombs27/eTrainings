<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="row gap-10 masonry pos-r">
        <div class="peers fxw-nw jc-sb ai-c">
            <h3>Users</h3>
            <div class="peers">
                <div class="peer mR-10">
                    <input v-model="search" type="text" class="form-control form-control-sm" placeholder="Search...">
                </div>
                <div class="peer"  v-if="can.createUser">
                    <Link class="btn btn-primary btn-sm" href="/users/create">Add User</Link>
                    <button class="btn btn-primary btn-sm mL-2 text-white" @click="showFilter()">Filter</button>
                </div>
            </div>
        </div>

        <filtering v-if="filter" @closeFilter="filter=false">
            <label>Sample Inputs</label>
            <input type="text" class="form-control">
            <button class="btn btn-sm btn-primary mT-5 text-white" @click="">Filter</button>
        </filtering>
 
        <div class="col-12">
            <div class="bgc-white p-20 bd">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="width: 30%"></th>
                            <th scope="col" style="text-align: right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users.data" :key="index">
                            <td>
                                <div class="row g-3 align-items-center">
                                    <div class="col-12 col-lg-auto text-center text-lg-start">						        
                                        <img
                                            class="w-2r bdrs-50p"
                                            :src="user.photo"
                                            alt=""
                                        />
                                    </div>
                                    <div class="col-12 col-lg-auto text-center text-lg-start">
                                        <p class="notification-title mb-1">{{ user.name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ user.email }}
                            </td>
                            <td>
                                <div class="badge bg-info me-1" v-for="permission in user.permissions">
                                    {{ permission.permission_name }}
                                </div>
                            </td>
                            <td style="text-align: right">
                                <!-- v-if="user.can.edit" -->
                                <div class="dropdown dropstart">
                                  <button class="btn btn-secondary btn-sm action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                      <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                    </svg>
                                  </button>
                                  <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton1">
                                    <li><Link class="dropdown-item" :href="`/users/${user.id}/edit`">Edit</Link></li>
                                    <li><a class="dropdown-item" href="#" @click="editPermissions(user.id)">Permissions</a></li>
                                    <li><hr class="dropdown-divider action-divider"></li>
                                    <li v-if="can.canDeleteUser">
                                        <Link class="text-danger dropdown-item" @click="deleteUser(user.id)">Delete</Link>
                                    </li>
                                  </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!-- read the explanation in the Paginate.vue component -->
                        <!-- <pagination :links="users.links" /> -->
                        <pagination :next="users.next_page_url" :prev="users.prev_page_url" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Modal 
        v-if="showModal" 
        :modalTitle="'Permissions'" 
        @closeModal="closeModal"
        @saveModal="updatePermissions"
    >
        <div v-for="permission, index in permissions">
            <h4> {{ index }} </h4>
            <div v-for="item in permission">
                <input type="checkbox" v-model="selectedPermissions" :value="item.id" :id="item.id"> {{ item.permission_name }}
            </div>
        </div>
    </Modal>
</template>

<script>
import Filtering from "@/Shared/Filter";
import Pagination from "@/Shared/Pagination";

export default {
    components: { Pagination, Filtering },
    props: {
        users: Object,
        filters: Object,
        can: Object,
    },
    data() {
        return {
            search: this.$props.filters.search,
            confirm: false,
            filter: false,
            showModal: false,
            permissions: [],
            selectedPermissions: [],
            selectedUser: ""
        };
    },
    watch: {
        search: _.debounce(function (value) {
            this.$inertia.get(
                "/users",
                { search: value },
                {
                    preserveScroll: true,
                    preserveState: true,
                    replace: true,
                }
            );
        }, 300),
    },
    methods: {
        deleteUser(id) {
            let text = "WARNING!\nAre you sure you want to delete the record?";
              if (confirm(text) == true) {
                this.$inertia.delete("/users/" + id);
              }
        },
        showFilter() {
            this.filter = !this.filter
        },
        editPermissions(userId) {
            var vm = this
            var user = _.find(this.users.data, { id: userId })
            this.showModal = true
            this.selectedUser = userId
            this.selectedPermissions = []

            _.forEach(user.permissions, function(e) {
                vm.selectedPermissions.push(e.id)
            })

            this.getAllPermissions()
        },
        updatePermissions() {
            this.showModal = false

            this.$inertia.post('update-user-permissions', {
                    'user_id' : this.selectedUser,
                    'permissions' : this.selectedPermissions
                }, {
                replace: true,
            })
        },
        closeModal() {
            this.showModal = false
        },
        async getAllPermissions() {
            await axios.post('get-all-permissions').then( response => {
                this.permissions = _.groupBy(response.data, 'permission_group');
            })
        },
    },
};
</script>
