<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img">
             <h3 class="fw-bold text-dark">TC Smart Technology</h3>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.blogs.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Blogs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-category"></i>
                </span>
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.product_models.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Models</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.products.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.orders.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.settings.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Payment Settings</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.product_inquiries.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Orders / Inquiries</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.product_reviews.index') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-star"></i>
                </span>
                <span class="hide-menu">Product Reviews</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.contacts.index') }}" aria-expanded="false">
                <span>
                 <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">Contact Lists</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.visitors.index') }}" aria-expanded="false">
                <span>
                 <i class="ti ti-world"></i>
                </span>
                <span class="hide-menu">All Visitors</span>
              </a>
            </li>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
