<template>
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="row col-12">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
          <div class="widget-two">
            <div class="widget-content">
              <div class="w-numeric-value">
                <div class="w-content">
                  <span class="w-value">Users</span>
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
                    <span class="w-value">Create Green Captain And Collecting staff</span>
                  </div>

                </div>

                <div style="margin: 50px">
                  <div class="widget-content">
                    <!-- Create User Form Start -->

                    <form method="POST" enctype="multipart/form-data" @submit.prevent="createUser">
                      <div style="margin: 50px">

                        <div class="row mb-4">
                          <div class="col">
                            <label for="exampleFormControlInput1">Full Name</label>
                            <input type="text" :class="errors.full_name ? 'form-control is-invalid' : 'form-control'"
                              placeholder="Full name" v-model="full_name" />
                            <small v-if="errors.full_name" class="text-danger">{{ errors.full_name[0] }}</small>
                          </div>
                          <div class="col">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" :class="errors.email ? 'form-control is-invalid' : 'form-control'"
                              placeholder="Email" v-model="email" />
                            <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                          </div>
                          <div class="col">
                            <label for="exampleFormControlInput1">User Type</label>
                            <select id="inputState" :class="errors.type ? 'form-control is-invalid' : 'form-control'"
                              v-model="type">
                              <option>Please Select Type</option>
                              <option value="Green Captain">Green Captain</option>
                              <option value="Collecting staff">Collecting staff</option>
                            </select>
                            <small v-if="errors.type" class="text-danger">{{
                              errors.type[0]
                            }}</small>
                          </div>
                          <br>
                        </div>

                        <div class="row mb-4">
                          <div class="col">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" class="form-control"
                              :class="errors.password ? 'form-control is-invalid' : 'form-control'" placeholder="Password"
                              v-model="password" />
                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                          </div>
                          <div class="col">
                            <label for="exampleFormControlInput1">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password"
                              v-model="password_confirmation" />
                          </div>
                        </div>

                        <input type="submit" id="submit" value="submit" class="btn btn-primary" />
                      </div>
                    </form>
                    <!-- Create User Form End  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      admins: [],

      email: null,
      full_name: null,
      password: null,
      password_confirmation: null,
      id: null,
      active: null,
      type:null,
      edit_type:null,

      edit_id: null,
      edit_name: null,
      edit_email: null,
      edit_password:null,
      edit_active: null,

      edit_active: null,

      pro_image: null,
      image: null,
      imagepreview: null,
      name: null,
      submitStatus: null,

      errors: [],

      //TO show and hide create form
      show_create_form: 0,
    };
  },

  mounted() {
  
  },

  methods: {
    reset() {
      // this.genders = [];
      this.id = null;
      this.full_name = null;
      this.email = null;
      this.password = null;
      this.password_confirmation = null;
      this.descript = null;
      this.image = null;
      this.imagepreview = null;
      this.type =null;

      //for edit purpose
      this.edit_id = null;
      this.edit_name = null;
      this.edit_descript = null;
      this.edit_image = null;
      this.edit_password =null;
      this.edit_type = null;
      this.imagepreview_edit = null;
    },

    get_select_type_state_edit(event) {
      this.edit_type = event.target.value;
    },

    setToUpdate(id,password) {
      this.edit_id = id;
      this.edit_password = password;
    },

    

    //create user method
    createUser() {
      document.getElementById("submit").disabled = true;
      this.errors = [];

      let timerInterval;
      this.$swal({
        title: 'Please Wait',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          this.$swal.showLoading();
          const b = this.$swal.getHtmlContainer().querySelector('b');
          timerInterval = setInterval(() => {
            b.textContent = this.$swal.getTimerLeft();
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        }
      });
      axios
        .post("/admin/create/admin", {
          full_name: this.full_name,
          email: this.email,
          type: this.type,
          password: this.password,
          password_confirmation: this.password_confirmation,
        })
        .then((res) => {
          if (res.status == 200 && res.data == 1) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Successfully Insert a Admin",
              showConfirmButton: false,
              timer: 1500,
            });

            this.reset();
            this.fetchAdmin();
            this.hideform()
            // this.$router.push('/admin/view-admins');
          }
        })
        .catch((err) => {
          if (err.response.status == 422) {
            this.errors = err.response.data.errors;
          }
        });
      document.getElementById("submit").disabled = false;
    },

    //image click proccess and image preview
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

    //image click proccess and image preview
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    get_select_active_state_edit(event) {
      this.edit_active = event.target.value;
    },

   
  },
};
</script>
