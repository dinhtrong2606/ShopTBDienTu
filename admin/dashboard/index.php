<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>

<div class="main-wrapper mdc-drawer-app-content">
  <!-- partial:partials/_navbar.html -->
  <header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
      <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
        <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
        <span class="mdc-top-app-bar__title">Greetings Clyde!</span>
        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
          <i class="material-icons mdc-text-field__icon">search</i>
          <input class="mdc-text-field__input" id="text-field-hero-input">
          <div class="mdc-notched-outline">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </div>
      </div>
      <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
        <div class="menu-button-container menu-profile d-none d-md-block">
          <button class="mdc-button mdc-menu-button">
            <span class="d-flex align-items-center">
              <span class="figure">
                <img src="templates/admin/assets/images/faces/face1.jpg" alt="user" class="user">
              </span>
              <span class="user-name">Clyde Miles</span>
            </span>
          </button>
          <div class="mdc-menu mdc-menu-surface" tabindex="-1">
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-account-edit-outline text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Edit profile</h6>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-settings-outline text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Logout</h6>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="divider d-none d-md-block"></div>
        <div class="menu-button-container d-none d-md-block">
          <button class="mdc-button mdc-menu-button">
            <i class="mdi mdi-settings"></i>
          </button>
          <div class="mdc-menu mdc-menu-surface" tabindex="-1">
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-alert-circle-outline text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Settings</h6>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-progress-download text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Update</h6>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="menu-button-container">
          <button class="mdc-button mdc-menu-button">
            <i class="mdi mdi-bell"></i>
          </button>
          <div class="mdc-menu mdc-menu-surface" tabindex="-1">
            <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon">
                  <i class="mdi mdi-email-outline"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">You received a new message</h6>
                  <small class="text-muted"> 6 min ago </small>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon">
                  <i class="mdi mdi-account-outline"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">New user registered</h6>
                  <small class="text-muted"> 15 min ago </small>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon">
                  <i class="mdi mdi-alert-circle-outline"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">System Alert</h6>
                  <small class="text-muted"> 2 days ago </small>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon">
                  <i class="mdi mdi-update"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">You have a new update</h6>
                  <small class="text-muted"> 3 days ago </small>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="menu-button-container">
          <button class="mdc-button mdc-menu-button">
            <i class="mdi mdi-email"></i>
            <span class="count-indicator">
              <span class="count">3</span>
            </span>
          </button>
          <div class="mdc-menu mdc-menu-surface" tabindex="-1">
            <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail">
                  <img src="templates/admin/assets/images/faces/face4.jpg" alt="user">
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                  <small class="text-muted"> 1 Minutes ago </small>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail">
                  <img src="templates/admin/assets/images/faces/face2.jpg" alt="user">
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                  <small class="text-muted"> 15 Minutes ago </small>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail">
                  <img src="templates/admin/assets/images/faces/face3.jpg" alt="user">
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                  <small class="text-muted"> 18 Minutes ago </small>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="menu-button-container d-none d-md-block">
          <button class="mdc-button mdc-menu-button">
            <i class="mdi mdi-arrow-down-bold-box"></i>
          </button>
          <div class="mdc-menu mdc-menu-surface" tabindex="-1">
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-lock-outline text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Lock screen</h6>
                </div>
              </li>
              <li class="mdc-list-item" role="menuitem">
                <div class="item-thumbnail item-thumbnail-icon-only">
                  <i class="mdi mdi-logout-variant text-primary"></i>
                </div>
                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="item-subject font-weight-normal">Logout</h6>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- partial -->
  <div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
      <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--success">
              <div class="card-inner">
                <h5 class="card-title">Borrowed</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom">$62,0076.00</h5>
                <p class="tx-12 text-muted">48% target reached</p>
                <div class="card-icon-wrapper">
                  <i class="material-icons">dvr</i>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--danger">
              <div class="card-inner">
                <h5 class="card-title">Annual Profit</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom">$1,958,104.00</h5>
                <p class="tx-12 text-muted">55% target reached</p>
                <div class="card-icon-wrapper">
                  <i class="material-icons">attach_money</i>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--primary">
              <div class="card-inner">
                <h5 class="card-title">Lead Conversion</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom">$234,769.00</h5>
                <p class="tx-12 text-muted">87% target reached</p>
                <div class="card-icon-wrapper">
                  <i class="material-icons">trending_up</i>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
            <div class="mdc-card info-card info-card--info">
              <div class="card-inner">
                <h5 class="card-title">Average Income</h5>
                <h5 class="font-weight-light pb-2 mb-1 border-bottom">$1,200.00</h5>
                <p class="tx-12 text-muted">87% target reached</p>
                <div class="card-icon-wrapper">
                  <i class="material-icons">credit_card</i>
                </div>
              </div>
            </div>
          </div>
          
    <!-- partial:partials/_footer.html -->

    <!-- partial -->
  </div>
</div>
</div>
<!-- plugins:js -->

</body>

</html>
<?php require_once '../../templates/admin/inc/footer.php'; ?>