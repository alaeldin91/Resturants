<template>

       
  <header class="header-top" header-theme="light">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <div class="top-menu d-flex align-items-center">
          <button type="button" class="btn-icon mobile-nav-toggle d-lg-none">
            <span></span>
          </button>
          
         
          &nbsp;&nbsp;
          <button class="nav-link" id="navbar-fullscreen" type="button">
            <i class="ik ik-maximize"></i>
          </button>
        </div>
        <div class="top-menu d-flex align-items-center">
          <div class="dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              id="notiDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="ik ik-bell"></i><span class="badge bg-danger">3</span>
            </a>
            <div
              class="dropdown-menu dropdown-menu-right notification-dropdown"
            >
              <h4 class="header">Notifications</h4>
              <div class="notifications-wrap">
                <a href="#" class="media">
                  <span class="d-flex">
                    <i class="ik ik-check"></i>
                    <span class="media-body">
                      <span class="heading-font-family media-heading"
                        >Invitation accepted</span
                      >
                      <span class="media-content"
                        >Your have been Invited ...</span
                      >
                    </span>
                    <img src="/img/user.jpg" alt="logo" />
                    <span class="media-body">
                      <span class="heading-font-family media-heading"
                        >Alaeldin Musa</span>
                      <span class="media-content"
                        >I slowly updated projects</span
                      >
                    </span>
                  </span>
                </a>
                <a href="#" class="media">
                  <span class="d-flex">
                    <i class="ik ik-calendar"></i>
                  </span>
                  <span class="media-body">
                    <span class="heading-font-family media-heading">To Do</span>
                    <span class="media-content"
                      >Meeting with Mohamed on Friday 8 AM ...</span
                    >
                  </span>
                </a>
              </div>
            
            </div>
          </div>
          <div class="dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="menuDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              ><i class="ik ik-plus"></i
            ></a>
            <div
              class="dropdown-menu dropdown-menu-right menu-grid"
              aria-labelledby="menuDropdown"
            >
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Dashboard"
                ><i class="ik ik-bar-chart-2"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Message"
                ><i class="ik ik-mail"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Accounts"
                ><i class="ik ik-users"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Sales"
                ><i class="ik ik-shopping-cart"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Purchase"
                ><i class="ik ik-briefcase"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Pages"
                ><i class="ik ik-clipboard"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Chats"
                ><i class="ik ik-message-square"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Contacts"
                ><i class="ik ik-map-pin"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Blocks"
                ><i class="ik ik-inbox"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Events"
                ><i class="ik ik-calendar"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="Notifications"
                ><i class="ik ik-bell"></i
              ></a>
              <a
                class="dropdown-item"
                href="#"
                data-toggle="tooltip"
                data-placement="top"
                title="More"
                ><i class="ik ik-more-horizontal"></i
              ></a>
            </div>
          </div>
          <div class="dropdown">
            <a
              class="dropdown-toggle"
              href="#"
              id="userDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              ><img class="avatar" src="img/user.jpg" alt=""
            /></a>
            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="userDropdown"
            >
              <a class="dropdown-item" href="#"
                ><i class="ik ik-user dropdown-icon"></i> Profile</a
              >
              <a class="dropdown-item" href="#">
                <i class="ik ik-power dropdown-icon"></i>
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    
   
</template>
<script>
export default {};
</script>