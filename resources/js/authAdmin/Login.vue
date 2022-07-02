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
            <div class="lavalite-overlay">
              <img src="/img/auth/login-bg.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
          <div class="authentication-form mx-auto">
            <div class="logo-centered">
              <a href=""
                ><img src="/img/AboHanna.png" alt="" class="avatar"
              /></a>
            </div>
            <h3>Sign In to Administartor Resturant</h3>
            <p>Happy to see you again!</p>
            <form @submit.prevent="login">
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('email')"
                ></span>
                <input
                  id="email"
                  type="email"
                  v-model="user.email"
                  class="form-control"
                />
                <i class="ik ik-user"></i>
              </div>
              <div class="form-group">
                <span
                  class="text-danger error"
                  v-text="validations.getMessage('password')"
                ></span>
                <input
                  id="password"
                  type="password"
                  v-model="user.password"
                  class="form-control"
                />
                <i class="ik ik-lock"></i>
              </div>
              <div class="row">
                <div class="col text-left">
                  <label class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      id="item_checkbox"
                      name="item_checkbox"
                      value="option1"
                      v-model="user.rember_me"
                    />
                    <span class="custom-control-label">&nbsp;Remember Me</span>
                  </label>
                </div>
                <div class="col text-right">
                  <a class="btn btn-link" href="#"> Forgot Your Password </a>
                </div>
              </div>
              <div class="sign-btn text-center">
                <button type="submit" class="btn btn-primary btn-sm ml-auto">
                  Login
                </button>
              </div>
            </form>
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
  data() {
    return {
      user: {
        email: "",
        password: "",
        rember_me: false,
      },
      validations: new Validation(),
    };
  },
  components: {
    Validation,
  },
  methods: {
    login: async function () {
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
        const response = await Auth.login(this.user);
        console.log(response.data);
        this.$router.push("/home");
      } catch (error) {
        console.log(error);
        switch (error.response.status) {
          case 422:
            this.validations.setMessage(error.response.data.errors);

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
  created() {},
};
</script>

<style>
h3{
  text-align: center;

}
p{
  text-align:center;
}
</style>