<template>
    <Head>
        <title>Trainings</title>
    </Head>

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-green-500 bgcH-green-900 c-white cH-white-700 p-20 cur-p">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1" >REFERENCE TRAININGS</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                                        <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                                        <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                                        <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                                    </svg>
                                    <span
                                        class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-green-50
                                            c-green-500
                                        "
                                        >
                                       {{RTCount}}
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Total Page Views ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-yellow-900 bgcH-yellow-700  c-white-50 cH-white-50 p-20 cur-p">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1 c-white-500" style="color:white !important;">TRAINING VENUES</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" style="color:white !important;" class="bi bi-house-heart-fill" viewBox="0 0 16 16">
                                        <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707L7.293 1.5Z"/>
                                        <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9.293Zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/>
                                    </svg>&nbsp;
                                    <span
                                        class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-green-50
                                            c-green-500
                                        "
                                        >
                                         {{VenCount}}
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Unique Visitors ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-teal-500 bgcH-teal-900 c-white p-20 cur-p">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">TRAINING FACILITATORS</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-hearts" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z"/>
                                    </svg>&nbsp;
                                    <span
                                        class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-green-50
                                            c-green-500
                                        "
                                        >
                                         {{FaCount}}
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Bounce Rate ==================== -->
                <div class="col-md-3">
                    <div class="layers bd bgc-deep-purple-500 bgcH-deep-purple-900 c-white p-20 cur-p">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">TRAINING TYPE</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-question-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>&nbsp;
                                    <span
                                        class="
                                            d-ib
                                            lh-0
                                            va-m
                                            fw-600
                                            bdrs-10em
                                            pX-15
                                            pY-15
                                            bgc-green-50
                                            c-green-500
                                        "
                                        >
                                        
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="masonry-item col-12">
           <!--#Site Visits ==================== -->
            <div class="bd bgc-white p-10">
                <div class="col-12 mB-5">
                    <div class="peers fxw-nw jc-sb ai-c">
                        <h5>TRAININGS</h5>
                        <div class="peers">
                        <div class="peer mR-10">
                            <input v-model="search" type="text" class="form-control form-control-sm" placeholder="Search...">
                        </div>
                        <div class="peer"  v-if="can.createUser">
                            <Link class="btn btn-primary btn-sm" href="/users/create">Add New</Link>
                            <button class="btn btn-primary btn-sm mL-2 text-white" @click="showFilter()">Filter</button>
                        </div>
                    </div>
                    </div>

                    <filtering v-if="filter" @closeFilter="filter=false">
                        <label>Sample Inputs</label>
                        <input type="text" class="form-control">
                        <button class="btn btn-sm btn-primary mT-5 text-white" @click="">Filter</button>
                    </filtering>
                </div>
                <div class="col-12 bd p-5">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th width="50">TRAINING DESCRIPTION</th>
                                <th width="10">FROM</th>
                                <th width="10">TO</th>
                                <th width="20">VENUE</th>
                                <th width="10" style="text-align: right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(train, index) in trainings.data" :key="index">
                                <td width="50">{{train.reftrain != null ? train.reftrain.train_desc:'Train ID: '+train.train_id+' Linked Not Found: '+train.ref_train_train_num}}</td>
                                <td width="10">{{train.tr_dtefr}}</td>
                                <td width="10">{{train.tr_dteto}}</td>
                                <td width="20">{{ train.venues  != null ? train.venues.ven_name:''}}</td>
                                <td width="10" style="text-align: right">
                                    <!-- v-if="user.can.edit" -->
                                    <div class="dropdown dropstart">
                                    <button class="btn btn-secondary btn-sm action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton1">
                                        <li><Link class="dropdown-item" :href="`/users/${train.train_id}/edit`">Edit</Link></li>
                                        <li><a class="dropdown-item" href="#" @click="editPermissions(train.train_id)">Add Participants</a></li>
                                        <li><hr class="dropdown-divider action-divider"></li>
                                        <li v-if="can.canDeleteUser">
                                            <Link class="text-danger dropdown-item" @click="deleteUser(train.train_id)">Delete</Link>
                                        </li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                             <pagination :next="trainings.next_page_url"  :prev="trainings.prev_page_url" />
                        </div>
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
    <h1>JOSEPH GG</h1>
        <!--<div v-for="permission, index in permissions">
            <h4> {{ index }} </h4>
            <div v-for="item in permission">
                <input type="checkbox" v-model="selectedPermissions" :value="item.id" :id="item.id"> {{ item.permission_name }}
            </div>
        </div>
        -->
    </Modal>
</template>
<script>
import Filtering from "@/Shared/Filter";
import Pagination from "@/Shared/Pagination";

export default {
    components: { Pagination, Filtering },
    props: {
        trainings   : Object,
        filters     : Object,
        can         : Object,
        FaCount     :null,
        VenCount    :null,
        RTCount     :null
    },
    data() {
        return {
            search: this.$props.filters.search,
            confirm: false,
            filter: false,
            showModal: false
        };
    },
    watch: {
        search: _.debounce(function (value) {
            this.$inertia.get(
                "/trainings",
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
        }
        ,
        editPermissions(trainId) {
            var vm = this
            var user = _.find(this.trainings.data, { train_id: trainId })
            this.showModal = true
            //this.selectedUser = userId
            //this.selectedPermissions = []

            //_.forEach(user.permissions, function(e) {
            //    vm.selectedPermissions.push(e.id)
            //})
            //this.getAllPermissions()
        },
        /*
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
        }, */
    },
};
</script>