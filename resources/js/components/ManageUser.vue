<template>
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-user bg-blue"> </i>
            <div class="d-inline">
              <h5>Users</h5>
              <span>Define Users</span>
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
                <router-link to="/dashboard">Users</router-link>
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
            @click.prevent="modalShow()"
          >
            <i class="fa fa-plus"></i>
            Create
          </button>
        </div>
      </div>
      <div class="col-xl-10 col-md-6">
        <div class="card card-table">
          <div class="card-header">
            <h3>Users</h3>
          </div>
          <div class="card-body">
            <table id="user_table" class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image Profile</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(user, key) in users" :key="key">
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
                  <td>
                    <img
                      :src="`/owner_images/${user.image}`"
                      :alt="`${user.name}`"
                      class="rounded-circle img-40 align-top mr-15"
                    />
                  </td>
                  <td>
                    <a href="#" @click="editUser(user)"
                      ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i
                    ></a>
                    <a href="#" @click.prevent="deleteAdmin(user)">
                      <i class="ik ik-trash-2 f-16 text-red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
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
              Create New Admin
            </h6>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click.prevent="close()"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- Form for adding/updating user details. When submitted call /createUser() function if /isFormCreateUserMode value is true. Otherwise call /updateUser() function. -->
          <form
            @submit.prevent="isFormCreateUserMode ? createUser() : updateUser()"
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
                    v-model="user.name"
                  />
                </div>
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('email')"
                  ></span>

                  <input
                    type="email"
                    name="user.email"
                    v-model="user.email"
                    placeholder="Email"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('password')"
                  ></span>

                  <input
                    type="password"
                    v-model="user.password"
                    name="password"
                    placeholder="Password"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('password_confirmation')"
                  ></span>
                  <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirmed password"
                    class="form-control"
                    v-model="user.password_confirmation"
                  />
                </div>
                <div class="form-group">
                  <span
                    class="text-danger error"
                    v-text="validations.getMessage('image')"
                  ></span>
                  <div v-if="user.image">
                    <img :src="`/owner_images/${user.image}`" ref="newImageProfileDisplay" class="w-150px"  v-bind:alt="user.mage" />
                  </div>
                  <input
                    type="file"
                    v-on:change="attachImage"
                    ref="newImageProfile"
                    class="form-control"
                    v-bind="user.image"
                 
                  />
                </div>
              </div>
              <div class="text-right">
                <button
                  type="button"
                  class="btn btn-warning btn-sm ml-auto"
                  data-dismiss="modal"
                  @click.prevent="close()"
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
import OwnerService from "../services/owner_service.js";
import Validation from "./../utils/validation.js";
export default {
  data() {
    return {
      users: [],
      results: "",
      user: {
        path: "http://127.0.0.1:8000",
        id: "",
        name: "",
        email: "",
        password: "",
        image: "",
        password_confirmation: "",
      },

      validations: new Validation(),
      isFormCreateUserMode: true,
    };
  },
  components: {
    Validation,
  },
  methods: {
    modalShow() {
      $("#UserModal").modal("show");
    },

    attachImage() {
      //Use Read file Todo
      this.user.image = this.$refs.newImageProfile.files[0];
      let reader = new FileReader();
      reader.addEventListener(
        "load",
        function () {
          this.$refs.newImageProfileDisplay.src = reader.result;
        }.bind(this),
        false
      );
      reader.readAsDataURL(this.user.image);
    },

    //create Admin Admin User
    createUser: async function () {
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
      formData.append("name", this.user.name);
      formData.append("email", this.user.email);
      formData.append("password", this.user.password);
      formData.append("image", this.user.image);
      formData.append("password_confirmation", this.user.password_confirmation);

      try {
        const response = await OwnerService.creatOwner(formData);

        Toast.fire({
          icon: "success",
          title: response.data.message,
        });
        this.getAllAdmin();
        this.user.name = "";
        this.user.email = "";
        this.user.password = "";
        this.user.password_confirmation = "";
        this.user.image = "";
      } catch (error) {
        if (error.response.status == 422) {
          this.validations.setMessage(error.response.data.errors);
          console.log("error", error.response.data.errors);
        } else if (error.response.status == 500) {
          Toast.fire({
            icon: "error",
            title: error.response.data.errors,
          });
        }
      }
    },

    editUser(user) {
      this.isFormCreateUserMode = false;

      window.axios
        .get("api/auth/editAdmin/" + `${user.id}`)
        .then((response) => {
          this.user.id = response.data.User.id;
          this.user.name = response.data.User.name;
          this.user.email = response.data.User.email;
          this.user.image = response.data.User.image
          console.log("image", response.data.User.image);
        });
      $("#UserModal").modal("show");
    },
    updateUser() {
      let userData = this.user;
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
      try{
      window.axios
        .post("api/auth/updateOwner/"+`${userData.id}`, userData)
        .then((response) => {
          console.log(response.data);
          Toast.fire({
            icon: "success",
            title: "Update Successfully",
          });
          this.getAllAdmin();
          $("#UserModal").modal("hide"); // hide modal
        });
      }
        catch(error){

      console.log(userData.image);
    
}
    },
    close() {
      $("#UserModal").modal("hide"); // hide modal
    },

    deleteAdmin: async function (user) {
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
      this.$swal
        .fire({
          title: "are you Delete Admin " + user.name,
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "##3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "yes, delete it!",
        })
        .then((result) => {
          try {
            if (result.isConfirmed) OwnerService.deleteOwner(user.id);
            Toast.fire({
              icon: "success",
              title: "Delete Administartor successfully",
            });

            this.getAllAdmin();
          } catch (error) {
            if (error)
              Toast.fire({
                icon: "error ",
                title: "Error  is not Save Data",
              });
          }
        });
    },

    getAllAdmin: async function () {
      try {
        const response = await OwnerService.loadOwner();
        this.users = response.data.data;
        this.user.path;
        console.log(response.data.data);
      } catch (error) {
        if(error.response.status ===401){


}
      }
    },
  },

  //GetAll Users Administrator
  mounted() {
    this.getAllAdmin();
  },
};
</script>

<style>
.pagination-container {
  height: 75px;
  display: grid;
}
.pagination {
  margin: auto !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}
</style>