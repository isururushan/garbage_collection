
<template>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="row col-12">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget-two">
                        <div class="widget-content">
                            <div class="w-numeric-value">
                                <div class="w-content">
                                    <span class="w-value">Insident</span>
                                    <span class="w-numeric-title">Go to columns for details.</span><br /><br />
                                    <button class="btn btn-primary" @click="show_create_form = !show_create_form">
                                        <span v-if="show_create_form == 0">Show Create Form</span>
                                        <span v-if="show_create_form == 1">Hide Create Form</span>
                                    </button>
                                </div>
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-chart">
                                <div id="daily-sales"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-12" v-if="show_create_form == 1">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget-two">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                    <div class="w-content">
                                        <span class="w-value">Create Insident</span>
                                    </div>
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div style="margin: 50px">
                                    <div class="widget-content">
                                        <!-- Create Locations Form Start -->

                                        <form method="POST" enctype="multipart/form-data" @submit.prevent="createInsident">
                                            <div style="margin: 50px">
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="contact-location">
                                                            <label for="exampleFormControlInput1">Choose Image</label>
                                                            <div class="custom-file mb-4">
                                                                <input type="file" :class="errors.image
                                                                    ? 'form-control custom-file-input is-invalid'
                                                                    : 'form-control custom-file-input'
                                                                    " id="customFile" @change="onImageChange" />
                                                                <label class="custom-file-label"
                                                                    for="customFile">Choose</label>
                                                                <small v-if="errors.image" class="text-danger">{{
                                                                    errors.image[0] }}</small>
                                                            </div>

                                                            <div v-if="imagepreview"
                                                                style="margin-top: -5px; margin-buttom: 50px">
                                                                <img :src="imagepreview" alt="" width="150px"
                                                                    height="150px" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="exampleFormControlInput1">Title</label>
                                                        <input type="text"
                                                            :class="errors.title ? 'form-control is-invalid' : 'form-control'"
                                                            placeholder="title" v-model="title" />
                                                        <small v-if="errors.title" class="text-danger">{{ errors.title[0]
                                                        }}</small>
                                                    </div>
                                                   
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="exampleFormControlInput1">Latitude</label>
                                                        <input type="text"
                                                            :class="errors.latitude ? 'form-control is-invalid' : 'form-control'"
                                                            placeholder="latitude" v-model="latitude" />
                                                        <small v-if="errors.latitude" class="text-danger">{{
                                                            errors.latitude[0] }}</small>
                                                    </div>
                                                    <div class="col">
                                                        <label for="exampleFormControlInput1">Longitude</label>
                                                        <input type="text"
                                                            :class="errors.longitude ? 'form-control is-invalid' : 'form-control'"
                                                            placeholder="longitude" v-model="longitude" />
                                                        <small v-if="errors.longitude" class="text-danger">{{
                                                            errors.longitude[0] }}</small>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <label for="exampleFormControlTextarea1">Description</label>
                                                        <textarea class="form-control" id="c-location" v-model="description"
                                                            rows="3"
                                                            placeholder="ex:This can be anything from Insident description."></textarea>
                                                    </div>
                                                </div>
                                                <input type="submit" value="submit" class="btn btn-primary" />
                                            </div>
                                        </form>
                                        <!--- Create Locations Form End  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget-two">
                        <div class="widget-content">
                            <div class="w-numeric-value">
                                <div class="w-content">
                                    <span class="w-value">Insidents View</span>
                                    <span class="w-numeric-title">Go to columns for details.</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin: 50px">
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="th-content">Count</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Image</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Title</div>
                                                </th>
                                                
                                                <th class="text-center">
                                                    <div class="th-content">Status</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Active</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Map View</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Edit</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-content">Destroy</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(insident, index) in insidents" :key="index">
                                                <td class="text-center">{{ index + 1 }}</td>
                                                <td class="text-center">
                                                    <img :src="`/storage/insident/${insident.image}`" class="rounded-circle"
                                                        width="80px" height="80px" alt srcset />
                                                </td>
                                                <td class="text-center">{{ insident.title }}</td>

                                                <td class="text-center">

                                                    <div v-if="insident.status == 0">
                                                        <span class="shadow-none badge badge-warning"
                                                            @click="done(insident.id)">Pending</span>
                                                    </div>
                                                    
                                                    <div v-if="insident.status == 2">
                                                        <span class="shadow-none badge badge-danger"
                                                            @click="pending(insident.id)">Rejected</span>
                                                    </div>
                                                    <div v-if="insident.status == 1">
                                                        <span class="shadow-none badge badge-success"
                                                            @click="reject(insident.id)">Accept to reject</span>
                                                    </div>
                                                   
                                                </td>

                                                <td class="text-center">
                                                    <div v-if="insident.active == 1">
                                                        <span class="shadow-none badge badge-primary">Active</span>
                                                    </div>
                                                    <div v-else>
                                                        <span class="shadow-none badge badge-warning">Deactive</span>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a :href="`http://maps.google.com/?q=${insident.latitude},${insident.longitude}`"
                                                        target="_blank">
                                                        <button class="btn btn-success">View in Map</button>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button class="btn btn-primary mb-2 mx-4"
                                                            @click="setToUpdate(insident.id, insident.title, insident.longitude, insident.latitude, insident.description, insident.active)"
                                                            data-toggle="modal" data-target="#editLocationModal">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger mb-2"
                                                        @click="destroyInsident(insident.id)">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="editLocationModal" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Insident</h5>
                                    <button type="button" lass="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                                    <div class="add-contact-box">
                                        <div class="add-contact-content">
                                            <form id="addContactModalTitle">
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Choose Image</label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file mb-4">
                                                            <input type="file" :class="errors.edit_image
                                                                ? 'form-control custom-file-input is-invalid'
                                                                : 'form-control custom-file-input'
                                                                " id="customFile" @change="onEditImageChange" />
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                            <small v-if="errors.edit_image" class="text-danger">{{
                                                                errors.edit_image[0] }}</small>
                                                        </div>
                                                        <div v-if="edit_imagepreview"
                                                            style="margin-top: -5px; margin-buttom: 50px">
                                                            <img :src="edit_imagepreview" alt="" width="150px"
                                                                height="150px" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Title</label>
                                                    <div class="col-sm-8">
                                                        <input type="name" id="c-location" class="form-control"
                                                            v-model="edit_title" placeholder="ex: john alex" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Longitude</label>
                                                    <div class="col-sm-8">
                                                        <input type="name" id="c-location" class="form-control"
                                                            v-model="edit_longitude" placeholder="ex: john alex" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Latitude</label>
                                                    <div class="col-sm-8">
                                                        <input type="name" id="c-location" class="form-control"
                                                            v-model="edit_latitude" placeholder="ex: john alex" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Description</label>
                                                    <div class="col-sm-8">
                                                        <input type="name" id="c-location" class="form-control"
                                                            v-model="edit_description" placeholder="ex: john alex" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label text-center">Active State</label>
                                                    <div class="col-sm-8">
                                                        <select id="inputState" class="form-control"
                                                            @change="get_select_active_state_edit($event)">
                                                            <option :selected="active == 1" value="1">Active</option>
                                                            <option :selected="active == 0" value="0">Deactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-edit" class="float-left btn btn-success" @click="editInsident"
                                        data-dismiss="modal">Edit</button>

                                    <button class="btn btn-secondary" data-dismiss="modal">
                                        <i class="flaticon-delete-1"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  End Model -->
                </div>
            </div>
        </div>
    </div>
</template>
  
  
<script>
export default {
    data() {
        return {
            insidents: [],


            title: null,
            image: null,
            imagepreview: null,
            description: null,
            longitude: null,
            latitude: null,
            id: null,
            status: null,
            active: null,

            edit_id: null,
            edit_title: null,
            edit_image: null,
            edit_latitude: null,
            edit_longitude: null,
            edit_description: null,
            edit_imagepreview: null,
            edit_active: null,
            edit_active: null,


            title: null,
            submitStatus: null,

            errors: [],

            //============ TO show and hide create form ====================
            show_create_form: 0
        };
    },

    mounted() {
        this.fetchInsident();

    },

    methods: {
        reset() {
            //===========Add =====================     
            this.id = null;
            this.title = null;
            this.image = null;
            this.description = null;
            this.longitude = null;
            this.latitude = null;
            this.active = null;
            this.imagepreview = null;

            //========= edit =====================         
            this.edit_id = null;
            this.edit_title = null;
            this.edit_description = null;
            this.edit_longitude = null;
            this.edit_latitude = null;
            this.edit_active = null;
        },

        setToUpdate(id, title, longitude, latitude, description, active) {
            this.edit_id = id;
            this.edit_title = title;
            this.edit_description = description;
            this.edit_longitude = longitude;
            this.edit_latitude = latitude;
            this.edit_active = active;
        },

        onEditImageChange(e) {
            this.edit_image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.edit_image);
            reader.onload = (e) => {
                this.edit_imagepreview = e.target.result;
            };

            let files = e.target.files || e.dataTransfer.files;

            if (!files.length) return;

            this.createEditImage(files[0]);
        },

        createEditImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.edit_image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        //-----------------------------------------------------------------------
        onImageChange(e) {
            this.image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = (e) => {
                this.imagepreview = e.target.result;
            };

            let files = e.target.files || e.dataTransfer.files;

            if (!files.length) return;

            this.createImage(files[0]);
        },

        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        fetchInsident() {
            axios.get("/admin/fetch/Insident")
                .then(res => {
                    if (res.status == 200) {
                        console.log(res);
                        this.insidents = res.data;
                    }
                })
                .catch(err => {
                    console.log("error:" + err);
                });
        },



        //============create location method================================
        createInsident() {
            this.errors = [];

            axios.post("/admin/create/Insident", {
                title: this.title,
                image: this.image,
                description: this.description,
                longitude: this.longitude,
                latitude: this.latitude,


            }).then(res => {
                if (res.status == 200 && res.data == 1) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Successfully Insert a Insident",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    this.reset();
                    this.fetchInsident();
                    this.hideform()


                }
            }).catch(err => {
                if (err.response.status == 422) {
                    this.errors = err.response.data.errors;
                    Swal.fire(

                        "Oops.... Incorrect Values.....!",
                        "PLease Check The Input Fileds Again.",
                        "question"
                    );
                }
            });
        },


        hideform() {
            this.show_create_form = 0;
        },

        get_select_active_state_edit(event) {
            this.edit_active = event.target.value;
        },

        // ================== edit Insident method =============================================

        editInsident() {

            axios.put("/admin/update/Insident", {
                id: this.edit_id,
                title: this.edit_title,
                image: this.edit_image,
                description: this.edit_description,
                longitude: this.edit_longitude,
                latitude: this.edit_latitude,
                active: this.edit_active

            }).then(res => {
                if (res.status == 200 && res.data == 1) {
                    Swal.fire(
                        "Success",
                        "Insident update Successfull!",
                        "success"
                    );
                    this.reset();
                    this.fetchInsident();


                } else {
                    Swal.fire(
                        "Error",
                        "Insident update unsuccessfull!",
                        "error"
                    );
                }
            }).catch(err => {
                if (err.response.status == 422)

                    Swal.fire(
                        "Error",
                        "Insident update unsuccessfull!",
                        "error"
                    );
            });
        },
        // ============================ delete insident ====================================================
        destroyInsident(id) {
            Swal.fire({
                title: "(Delete a insident)Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"


            }).then(result => {
                if (result.isConfirmed) {


                    axios.post("/admin/destroy/Insident", {
                        id: id
                    }).then(res => {
                        if (res.status == 200 && res.data == 1) {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );


                            this.fetchInsident();
                        } else {
                            Swal.fire(
                                "Error",
                                "Insident destroy unsuccessfull!",
                                "error"
                            );
                        }
                    }).catch(err => {
                        if (err.response.status == 422) {

                            Swal.fire(
                                "Error",
                                "Insident destroy unsuccessfull!",
                                "error"
                            );
                        }
                    });
                }
            });
        },

        pending(id) {

            Swal.fire({
                title: " Set to pending. Are you sure?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"


            }).then(result => {
                if (result.isConfirmed) {


                    axios.post("/admin/pending/Insident", {
                        id: id,

                    }).then(res => {
                        if (res.status == 200 && res.data == 1) {
                            Swal.fire(
                                "Pending.!",
                                "Pending..",
                                "success"
                            );

                            this.reset();
                            this.fetchInsident();
                        }
                        else {
                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    }).catch(err => {
                        if (err.response.status == 422) {

                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    });
                }
            });
        },

        reject(id) {

            Swal.fire({
                title: " Set to reject. Are you sure?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"


            }).then(result => {
                if (result.isConfirmed) {


                    axios.post("/admin/reject/Insident", {
                        id: id,

                    }).then(res => {
                        if (res.status == 200 && res.data == 1) {
                            Swal.fire(
                                "Rejected.!",
                                "Rejected",
                                "success"
                            );

                            this.reset();
                            this.fetchInsident();
                        }
                        else {
                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    }).catch(err => {
                        if (err.response.status == 422) {

                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    });
                }
            });
        },

        done(id) {

            Swal.fire({
                title: "Set to Accept. Are you sure?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"


            }).then(result => {
                if (result.isConfirmed) {


                    axios.post("/admin/done/Insident", {
                        id: id,

                    }).then(res => {
                        if (res.status == 200 && res.data == 1) {
                            Swal.fire(
                                "Accepted!",
                                "Accepted",
                                "success"
                            );

                            this.reset();
                            this.fetchInsident();
                        }
                        else {
                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    }).catch(err => {
                        if (err.response.status == 422) {

                            Swal.fire(
                                "Error",
                                "unsuccessfull!",
                                "error"
                            );
                        }
                    });
                }
            });
        },
    },
};
</script>
  
  
  