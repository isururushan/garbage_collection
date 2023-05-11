<template>
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="row col-12">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget-two">
            <div class="widget-content">
              <div class="w-numeric-value">
                <div class="w-content">
                  <span class="w-value">Articals</span>
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
                    <span class="w-value">Create Artical</span>
                  </div>
                </div>

                <div style="margin: 50px">
                  <div class="widget-content">
                    <form method="POST" enctype="multipart/form-data" @submit.prevent="createArticals">
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
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" :class="errors.title
                              ? 'form-control is-invalid'
                              : 'form-control'
                              " placeholder="title" v-model="title" />
                            <small v-if="errors.title" class="text-danger">{{
                              errors.title[0]
                            }}</small>
                          </div>
                        </div>
                          <div class="row mb-4">
                            <div class="col">
                            <label for="exampleFormControlInput1">Description</label>
                            <input type="text" :class="errors.description
                              ? 'form-control is-invalid'
                              : 'form-control'
                              " placeholder="description" v-model="description" />
                            <small v-if="errors.description" class="text-danger">{{
                              errors.description[0]
                            }}</small>
                          </div>
                          </div>
                         
                        
                        <input type="submit" id="submit" value="submit" class="btn btn-primary" />
                      </div>
                    </form>
                    <!--- Create Articals Form End  -->
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
                  <span class="w-value">Articals View</span>
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
                          <div class="th-content">Description</div>
                        </th>
                        <th class="text-center">
                          <div class="th-content">Status</div>
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
                      <tr v-for="(artical, index) in Articals" :key="index">
                        <td class="text-center">
                          {{ index + 1 }}
                        </td>
                        <td class="text-center">
                          <img :src="`/storage/articals/${artical.image}`" class="rounded-circle" width="80px"
                            height="80px" alt srcset />
                        </td>
                        <td class="text-center">
                          {{ artical.title }}
                        </td>
                        <td class="text-center">
                          {{ artical.description }}
                        </td>

                        <td class="text-center">
                          <div v-if="artical.active == 1">
                            <span class="shadow-none badge badge-primary">Active</span>
                          </div>
                          <div v-else>
                            <span class="shadow-none badge badge-warning">Deactive</span>
                          </div>
                        </td>
                        <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-primary mb-2 mx-4" @click="
                              setToUpdate(
                                artical.id,
                                artical.active,
                                artical.title,
                                artical.description
                              )
                              " data-toggle="modal" data-target="#editLocationModal">
                              <i class="fa fa-pencil" aria-hidden="true"></i>Edit
                            </button>
                          </div>
                        </td>

                        <td class="text-center">
                          <button class="btn btn-danger mb-2" id="btn-delete" @click="destroyArticals(artical.id)">
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
                  <h5 class="modal-title">Edit Articals</h5>
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
                          <label for="staticEmail" class="col-sm-4 col-form-label text-center">Choose Image</label>
                          <div class="col-sm-8">
                            <div class="custom-file mb-4">
                              <input type="file" :class="errors.edit_image
                                ? 'form-control custom-file-input is-invalid'
                                : 'form-control custom-file-input'
                                " id="customFile" @change="onEditImageChange" />
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              <small v-if="errors.edit_image" class="text-danger">{{ errors.edit_image[0] }}</small>
                            </div>
                            <div v-if="edit_imagepreview" style="margin-top: -5px; margin-buttom: 50px">
                              <img :src="edit_imagepreview" alt="" width="150px" height="150px" />
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label text-center">Title</label>
                          <div class="col-sm-8">
                            <input type="name" id="c-location" class="form-control" v-model="edit_title"
                              placeholder="ex: john alex" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label text-center">Description</label>
                          <div class="col-sm-8">
                            <input type="full_name" id="c-location" class="form-control" v-model="edit_description"
                              placeholder="ex: john alex" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label text-center">Active State</label>
                          <div class="col-sm-8">
                            <select id="inputState" class="form-control" @change="get_select_active_state_edit($event)">
                              <option :selected="active == 1" value="1">
                                Active
                              </option>
                              <option :selected="active == 0" value="0">
                                Deactive
                              </option>
                            </select>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="btn-edit" class="float-left btn btn-success" @click="editArticals" data-dismiss="modal">
                    Edit
                  </button>

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
      Articals: [],
      description: null,
      title:null,
      image: null,
      id: null,

      active: null,

      edit_id: null,
      edit_description: null,
      edit_active: null,
      edit_title: null,
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
    this.fetchArticals();
  },

  methods: {
    reset() {
      //===========Add =====================
      this.id = null;
      this.Articals = [];
      this.description = null;
      this.image = null;
      this.title = null;
      this.active = null;
      this.imagepreview = null;
      //========= edit =====================
      this.edit_id = null;
      this.edit_description = null;
      this.edit_active = null;
      this.edit_title = null;
      this.edit_image = null;
      this.edit_imagepreview = null;
    },

    setToUpdate(id, active, title,description) {
      this.edit_id = id;
      this.edit_title = title;
      this.edit_description = description;
      this.edit_active = active;
    },

    fetchArticals() {
      axios
        .get("/admin/fetch/Articals")
        .then((res) => {
          if (res.status == 200) {
            console.log(res);
            this.Articals = res.data;
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
    createArticals() {
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
        .post("/admin/create/Articals", {
          image: this.image,
          title: this.title,
          description: this.description,
        })
        .then((res) => {
          if (res.status == 200 && res.data == 1) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Successfully Insert a Artical",
              showConfirmButton: false,
              timer: 1500,
            });

            this.reset();
            this.fetchArticals();
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

    editArticals() {
      axios
        .put("/admin/update/Articals", {
          id: this.edit_id,
          image: this.edit_image,
          title: this.edit_title,
          description: this.edit_description,
          active: this.edit_active,
        })
        .then((res) => {
          if (res.status == 200 && res.data == 1) {
            Swal.fire("Success", "Articals update Successfull!", "success");
            this.reset();
            this.fetchArticals();
          } else {
            Swal.fire("Error", "Articals update unsuccessfull!", "error");
          }
        })
        .catch((err) => {
          if (err.response.status == 422) {
            this.errors = err.response.data.errors;
          }
        });
    },
    // ============================ delete Articals ====================================================
    destroyArticals(id) {
      Swal.fire({
        title: "(Delete an Articals)Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/admin/destroy/Articals", {
              id: id,
            })
            .then((res) => {
              if (res.status == 200 && res.data == 1) {
                Swal.fire(
                  "Deleted!",
                  "Your Articals has been deleted.",
                  "success"
                );

                this.fetchArticals();
              } else {
                Swal.fire("Error", "Articals destroy unsuccessfull!", "error");
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
