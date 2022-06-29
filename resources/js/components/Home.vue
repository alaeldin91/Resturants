<template>
  <div class="wrapper">
    <Headers />
    <div class="page-wrap">
      <!-- initiate sidebar-->
      <Sidebar />
      <div class="main-content">
        <router-view></router-view>
      </div>
    </div>
    <Footers />
  </div>
</template>
<script>
import Sidebar from "./include/Sidebars.vue";
import Headers from "./include/Headers.vue";
import Footers from "./include/Foote.vue";
export default {
  components: {
    Sidebar,
    Headers,
    Footers,
  },
};
</script>
