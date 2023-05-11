<template>
    <div class="layout-px-spacing">
      <div class="row layout-top-spacing">
        <div class="row col-12">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-two">
              <div class="widget-content">
                <div class="w-numeric-value">
                  <div class="w-content">
                    <span class="w-value">Collection</span>
                    <span class="w-numeric-title">Go to columns for details.</span><br /><br />
                    <button class="btn btn-primary" @click="show_create_form = !show_create_form">
                      <span v-if="show_create_form == 0">Show Create Form</span>
                      <span v-if="show_create_form == 1">Hide Create Form</span>
                    </button>
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
                      <span class="w-value">Create Places</span>
                    </div>
                  </div>
  
                  <div style="margin: 50px">
                    <div class="widget-content">
                      <form method="POST" enctype="multipart/form-data" @submit.prevent="createCollection">
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
                                  <label class="custom-file-label" for="customFile">Choose</label>
                                  <small v-if="errors.image" class="text-danger">{{ errors.image[0] }}</small>
                                </div>
  
                                <div v-if="imagepreview" style="margin-top: -5px; margin-buttom: 50px">
                                  <img :src="imagepreview" alt="" width="150px" height="150px" />
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <label for="exampleFormControlInput1">place</label>
                              <input type="text" :class="errors.place
                                ? 'form-control is-invalid'
                                : 'form-control'
                                " placeholder="place" v-model="place" />
                              <small v-if="errors.place" class="text-danger">{{
                                errors.place[0]
                              }}</small>
                            </div>
                          </div>
                          <input type="submit" id="submit" value="submit" class="btn btn-primary" />
                        </div>
                      </form>
                      <!--- Create Collection Form End  -->
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
                    <span class="w-value">Collection View</span>
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
                            <div class="th-content">place</div>
                          </th>
                          <th class="text-center">
                            <div class="th-content">Status</div>
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(collection, index) in Collections" :key="index">
                          <td class="text-center">
                            {{ index + 1 }}
                          </td>
                          <td class="text-center">
                            <img :src="`/storage/Collection/${collection.image}`" class="rounded-circle" width="80px"
                              height="80px" alt srcset />
                          </td>
                          <td class="text-center">
                            {{ collection.place }}
                          </td>
  
                          <td class="text-center">
                            <div v-if="collection.active == 1">
                              <span class="shadow-none badge badge-primary">Active</span>
                            </div>
                            <div v-else>
                              <span class="shadow-none badge badge-warning">Deactive</span>
                            </div>
                          </td>
                       
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Modal -->
          
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
        Collections: [],
        place: null,
        image: null,
        id: null,
  
        active: null,
  
        edit_id: null,
        edit_place: null,
        edit_active: null,
        edit_image: null,
        edit_imagepreview: null,
        imagepreview: null,
  
        submitStatus: null,
  
        errors: [],
  
        //============ TO show and hide create form ====================
        show_create_form: 0,
      };
    },
  
    mounted() {
      this.fetchCollection();
    },
  
    methods: {
      reset() {
        //===========Add =====================
        this.id = null;
        this.Collections = [];
        this.place = null;
        this.image = null;
        this.active = null;
        this.imagepreview = null;
        //========= edit =====================
        this.edit_id = null;
        this.edit_place = null;
        this.edit_active = null;
        this.edit_image = null;
        this.edit_imagepreview = null;
      },
  
      setToUpdate(id, active, place) {
        this.edit_id = id;
        this.edit_place = place;
        this.edit_active = active;
      },
  
      fetchCollection() {
        axios
          .get("/admin/fetch/Collection")
          .then((res) => {
            if (res.status == 200) {
              console.log(res);
              this.Collections = res.data;
            }
          })
          .catch((err) => {
            console.log("error:" + err);
          });
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
  
      //============create location method================================
      createCollection() {
        document.getElementById("submit").disabled = true;
        this.errors = [];
  
        let timerInterval;
        this.$swal({
          title: "Please Wait",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            this.$swal.showLoading();
            const b = this.$swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
              b.textContent = this.$swal.getTimerLeft();
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        });
  
        axios
          .post("/admin/create/Collection", {
            image: this.image,
            place: this.place,
          })
          .then((res) => {
            if (res.status == 200 && res.data == 1) {
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Successfully Insert a Collection",
                showConfirmButton: false,
                timer: 1500,
              });
  
              this.reset();
              this.fetchCollection();
              this.hideform();
            }
          })
          .catch((err) => {
            if (err.response.status == 422) {
              this.errors = err.response.data.errors;
            }
          });
        document.getElementById("submit").disabled = false;
      },
  
      hideform() {
        this.show_create_form = 0;
      },
  
      get_select_active_state_edit(event) {
        this.edit_active = event.target.value;
      },
  
      // ================== edit location method =============================================
  
      editCollection() {
        axios
          .put("/admin/update/Collection", {
            id: this.edit_id,
            image: this.edit_image,
            place: this.edit_place,
            active: this.edit_active,
          })
          .then((res) => {
            if (res.status == 200 && res.data == 1) {
              Swal.fire("Success", "Collection update Successfull!", "success");
              this.reset();
              this.fetchCollection();
            } else {
              Swal.fire("Error", "Collection update unsuccessfull!", "error");
            }
          })
          .catch((err) => {
            if (err.response.status == 422) {
              this.errors = err.response.data.errors;
            }
          });
      },
      // ============================ delete Collection ====================================================
      destroyCollection(id) {
        Swal.fire({
          title: "(Delete an Collection)Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        }).then((result) => {
          if (result.isConfirmed) {
            axios
              .post("/admin/destroy/Collection", {
                id: id,
              })
              .then((res) => {
                if (res.status == 200 && res.data == 1) {
                  Swal.fire(
                    "Deleted!",
                    "Your Collection has been deleted.",
                    "success"
                  );
  
                  this.fetchCollection();
                } else {
                  Swal.fire("Error", "Collection destroy unsuccessfull!", "error");
                }
              })
              .catch((err) => {
                if (err.response.status == 422) {
                  this.errors = err.response.data.errors;
                }
              });
          }
        });
      },
    },
  };
  </script>
  