<template>
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-user bg-blue"> </i>
            <div class="d-inline">
              <h5>Branch</h5>
              <span>Define Branch</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="breadcrumb-container" araia-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">
                  <i class="ik ik-home"></i
                ></router-link>
              </li>
              <li class="breadcrumb-item">
                <router-link to="/manageBranch">Branch</router-link>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="all-button-box row d-flex justify-content-end">
        <div class="col-auto my-custom">
          <button
            type="button"
            class="btn btn-primary btn-sm ml-auto"
            data-toggle="modal"
            data-target="#UserModal"
            data-title="Create New Admin"
          >
            <i class="fa fa-plus"></i>
            Create
          </button>
        </div>
      </div>
      <div class="col-xl-10 col-md-6">
        <div class="card card-table">
          <div class="card-header">
            <h3>Branch</h3>
          </div>
          <div class="card-body">
            <table id="user_table" class="table">
              <thead>
                <tr>
                  <th>Name Branch</th>
                  <th>Email</th>
                  <th>phone Number</th>
                  <th>Image Branch</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal containing dynamic form for adding/updating user details. -->
    <div
      class="modal fade"
      id="UserModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- Show/hide headings dynamically based on /isFormCreateUserMode value (true/false) -->
            <h6
              class="h4 font-weight-200 float-left modal-title"
              style="margin-left: 40px"
              id="exampleModalLabel"
            >
              Create New Branch
            </h6>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- Form for adding/updating user details. When submitted call /createUser() function if /isFormCreateUserMode value is true. Otherwise call /updateUser() function. -->
          <form
            @submit.prevent="
              isFormCreateUserMode ? createBranch() : updateBranch()
            "
          >
            <div class="modal-body">
              <div class="card bg-none card-box">
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('name')"
                  ></span>
                  <input
                    type="text"
                    name="name"
                    placeholder="Name"
                    class="form-control"
                    v-model="branch.name"
                  />
                </div>
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('email')"
                  ></span>
                  <input
                    type="email"
                    placeholder="Email"
                    class="form-control"
                    v-model="branch.email"
                  />
                </div>
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('phoneNumber')"
                  ></span>
                  <input
                    type="text"
                    v-model="branch.phoneNumber"

                    placeholder="Phone Number"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('description')"
                  ></span>
                  <textarea
                  v-model="branch.description"
                    class="form-control"
                    id="exampleTextarea1"
                    rows="4"
                    cols="47"
                  >
              Describe Location here...</textarea
                  >
                </div>
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('image')"
                  ></span>
                  <div v-if="branch.image">
                 <img
                      :src="`/owner_images/branch/${branch.image}`"
                      ref="newImageProfileDisplay"
                      class="w-150px"
                      v-bind:alt="branch.image"
                    />
                  </div>
                  <input
                   v-on:change="attachImage"
                    type="file"
                    ref="newImageProfile"
                    class="form-control"
                     v-bind="branch.image"
                  />
                </div>
              </div>
              <div class="text-right">
                <button
                  type="button"
                  class="btn btn-warning btn-sm ml-auto"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary btn-sm ml-auto">
                  <span class="fa fa-check"></span>
                  Save changes
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import OwnerService from "./../services/owner_service";
import Validation from "./../utils/validation";
export default {
  data() {
    return {
      branches: [],
      result: "",
      branch: {
        id: "",
        name: "",
        email: "",
        phoneNumber: "",
        description: "",
        image: "",
      },
      isFormCreateUserMode: true,
      validations: new Validation(),
    };
  },
  components: {
    Validation,
  },
  methods: {
    createBranch: async function () {
      const Toast = this.$swal.mixin({
        toast: true,
        position: "top-right",
        iconColor: "blue",
        customClass: {
          popup: "colored-toast",
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
      });
      let formData = new FormData();
      formData.append("name", this.branch.name);
      formData.append("phoneNumber", this.branch.phoneNumber);
      formData.append("email", this.branch.email);
      formData.append("description", this.branch.description);
      formData.append("image", this.branch.image);
      try {
        const response = await OwnerService.createBranch(formData);
        Toast.fire({
          icon: "success",
          title: response.data.message,
        });
        this.branch.name = "";
        this.branch.phoneNumber = "";
        this.branch.email = "";
        this.branch.description = "";
        this.branch.image = "";
      } catch (error) {
        if (error.response.status == 422) {
          this.validations.setMessage(error.response.data.errors);
          console.log("error", error.response.data.errors);
        } else if (error.response.status == 500) {
          Toast.fire({
            icon: "error",
            title: error.response.data.errors,
          });
          console.log("error", error.response.data.errors);
        }
      }
    },
     attachImage() {
      //Use Read file Todo
      this.branch.image = this.$refs.newImageProfile.files[0];
      let reader = new FileReader();
      reader.addEventListener(
        "load",
        function () {
          this.$refs.newImageProfileDisplay.src = reader.result;
        }.bind(this),
        false
      );
      reader.readAsDataURL(this.branch.image);
    },

    editBranch: async function () {
      isFormCreateUserMode: true;
    },
    updateBranch: async function () {},
  },
};
</script>
<style>
</style>