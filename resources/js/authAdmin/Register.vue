<template>
  <div class="auth-wrapper">
    <div class="container-fluid h-100">
      <div class="row flex-row h-100 bg-white">
        <div
          class="
            col-xl-8 col-lg-6 col-md-5
            p-0
            d-md-block d-lg-block d-sm-none d-none
          "
        >
          <div class="lavalite-bg">
            <div class="lavalite-overlay"></div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
          <div class="authentication-form mx-auto">
            <div class="logo-centered">
              <a href=""
                ><img width="200" src="/img/AboHanna.png" alt="" class="avatar"
              /></a>
            </div>
            <p>Join us today! It takes only few steps</p>
            <form @submit.prevent="register">
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('name')"
                ></span>
                <input
                  type="name"
                  class="form-control"
                  placeholder="Name"
                  name="name"
                  v-model="user.name"
                />
                <i class="ik ik-user"></i>
              </div>
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('email')"
                ></span>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  name="email"
                  v-model="user.email"
                />
                <i class="fa fa-envelope"></i>
              </div>
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('password')"
                ></span>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Password"
                  name="password"
                  v-model="user.password"
                />
                <i class="ik ik-lock"></i>
              </div>
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('password_confirmation')"
                ></span>
                <input
                  type="password"
                  class="form-control"
                  placeholder="Confirm Password"
                  name="password_confirmation"
                  v-model="user.password_confirmation"
                />
                <i class="ik ik-eye-off"></i>
              </div>
              <div class="row">
                <div class="col-12 text-left">
                  <label class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      id="item_checkbox"
                      name="item_checkbox"
                      value="option1"
                    />
                    <span class="custom-control-label"
                      >&nbsp;I Accept <a href="#">Terms and Conditions</a></span
                    >
                  </label>
                </div>
              </div>
              <div class="sign-btn text-center">
                <button class="btn btn-primary btn-sm ml-auto" type="submit">
                  Create Account
                </button>
              </div>
            </form>
            <div class="register">
              <p>Already have an account? <a href="">Sign In</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Auth from "../services/auth_service.js";
import Validation from "../utils/validation.js";

export default {
  name: "Register Customer",
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      validations: new Validation(),
    };
  },
  components: {
    Validation,
  },
  methods: {
    register: async function () {
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
      try {
 const response =  await Auth.register(this.user);
          Toast.fire({
              icon: "success",
              title: response.data.message,
            });
            this.$router.push('login')
         
      } catch (error) {
        switch (error.response.status) {
          case 422:
            this.validations.setMessage(error.response.data.errors);
            console.log(error.response.data.errors);

            break;
          case 401:
            Toast.fire({
              icon: "error",
              title: error.response.data.message,
            });
            break;
          case 500:
            this.validations.setMessage(error.response.data.errors);
            console.log(error);
            Toast.fire({
              icon: "error",
              title: "error occurd please try again",
            });
            break;
          default:
            this.validations.setMessage(error.response.data.errors);

            Toast.fire({
              icon: "error",
              title: error.response.data.errors,
            });
        }
      }
    },
  },
};
</script>

<style>
</style>