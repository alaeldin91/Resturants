<template>
  <div class="app-sidebar colored">
    <div class="sidebar-header">
      <a class="header-brand" href="#">
        <div class="logo-img">
          <img
            height="90"
            width="90"
            src="img/AboHanna.png"
            class="header-brand-img"
            title="Resturant"
          />
        </div>
      </a>
      <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
      <button id="sidebarClose" class="nav-close">
        <i class="ik ik-x" style="background: white"></i>
      </button>
    </div>
    <div class="sidebar-content">
      <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
          <div class="nav-item">
            <router-link to="home/dashboard"
              ><i class="ik ik-home"></i><span>Dashboard</span></router-link
            >
          </div>
          <div class="nav-item">
            <router-link to="home/manageUser"
              ><i class="ik ik-users"></i>
              <span>Manage User </span></router-link
            >
          </div>
          <div class="nav-item">
            <router-link to="home//manageBranch">
            <i class="ik ik-clipboard"> </i> <span>Manage Branch</span>
            </router-link>
          </div>
          <div class="nav-item">
            <a href="#">
              <i class="ik ik-box"></i> <span>Manage Floor </span>
            </a>
          </div>
          <div class="nav-item">
            <a href="#">
              <i class="ik ik-server"></i> <span>Manage Catogry</span>
            </a>
          </div>
          <div class="nav-item">
            <a href="#">
              <i class="ik ik-command"> </i> <span>Manage Printer </span>
            </a>
          </div>
          <div class="nav-item">
            <a href="#"
              ><i class="ik ik-list"></i> <span>Manage Product </span>
            </a>
          </div>
          <div class="nav-item">
            <a href="#"
              ><i class="ik ik-inbox"></i><span> Manage Order Type </span></a
            >
          </div>
          <div class="nav-item">
            <a href="#"
              ><i class="ik ik-dollar-sign"></i><span> Manage Payment </span></a
            >
          </div>
          <div class="nav-item">
            <a href="#">
              <i class="ik ik-shopping-cart"> </i><span>Orders</span></a
            >
          </div>

          <div class="nav-item has-sub">
            <a href="#"><i class="ik ik-bar-chart-2"></i>Report </a>
            <div class="submenu-content">
              <a href="#" class="menu-item">All Orders Report </a>
            </div>
            <div class="submenu-content">
              <a href="#" class="menu-item"> Orders Specific Branch </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>