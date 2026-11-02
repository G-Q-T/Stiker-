  <!-- ==========================================
         START: Sidebar Component
         Highly polished, dark-green navigation
         ========================================== -->
  <div class="sidebar-wrapper" id="sidebar">
      <!-- Brand Logo / Identity -->
      <a href="index.html" class="sidebar-brand">
          <i class="bi bi-asterisk"></i>
          <span>Spark Admin</span>
      </a>

      <!-- Navigation Menu -->
      <div class="flex-grow-1 overflow-y-auto">
          <!-- Group: Menu -->
          <div class="sidebar-menu-section">
              <div class="sidebar-menu-title">Menu</div>
              <ul class="sidebar-menu-list">
                  <li class="sidebar-menu-item">
                      <a href="{{ route('admin.dashboard.index') }}" class="sidebar-menu-link" id="menu-overview"
                          title="Overview">
                          <i class="bi bi-grid-fill"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
          </div>

          <!-- Group: Components -->
          <div class="sidebar-menu-section">
              <div class="sidebar-menu-title">Components</div>
              <ul class="sidebar-menu-list">
                  <li class="sidebar-menu-item">
                      <a href="tables-basic.html" class="sidebar-menu-link" id="menu-basictables" title="Basic Tables">
                          <i class="bi bi-table"></i>
                          <span>Basic Tables</span>
                      </a>
                  </li>
                  <li class="sidebar-menu-item">
                      <a href="ui-forms.html" class="sidebar-menu-link" id="menu-uiforms" title="Forms and Input">
                          <i class="bi bi-input-cursor-text"></i>
                          <span>Forms & Input</span>
                      </a>
                  </li>
                  <li class="sidebar-menu-item">
                      <a href="#" class="sidebar-menu-link" id="menu-uibuttons" title="Buttons">
                          <i class="bi bi-menu-button-wide-fill"></i>
                          <span>Buttons & Alerts</span>
                      </a>
                  </li>
              </ul>
          </div>

          <!-- Group: Pages -->
          <div class="sidebar-menu-section">
              <div class="sidebar-menu-title">Pages</div>
              <ul class="sidebar-menu-list">
                  <li class="sidebar-menu-item">
                      <a href="{{ route('admin.produk.index') }}" class="sidebar-menu-link" id="menu-blankpage"
                          title="Blank Page">
                          <i class="bi bi-bag-fill"></i>
                          <span>produk</span>
                      </a>
                  <li class="sidebar-menu-item">
                      <a href="{{ route('admin.user.index') }}" class="sidebar-menu-link" id="menu-loginpage"
                          title="Login Page">
                          <i class="bi bi-people"></i>
                          <span>user</span>
                      </a>
                  </li>
                  <li class="sidebar-menu-item">
                      <a href="{{ route('admin.setting') }}" class="sidebar-menu-link">
                          <i class="bi bi-gear"></i>
                          <span>Settings</span>
                      </a>
                  </li>

                  <li class="sidebar-menu-item">
                      <a href="{{ route('admin.category.index') }}" class="sidebar-menu-link">
                          <i class="bi bi-gear"></i>
                          <span>category produk</span>
                      </a>
                  </li>

              </ul>
              </li>
          </div>
      </div>

      <!-- Sidebar Profile Card (Dynamic Footer) -->
      <div class="sidebar-profile">
          <img src="assets/images/avatar.png" alt="Administrator" class="sidebar-profile-img"
              onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
          <div class="sidebar-profile-info">
              <div class="sidebar-profile-name">{{ auth()->user()->name ?? '' }}</div>
              <div class="sidebar-profile-email">{{ auth()->user()->email ?? '' }}</div>
          </div>
      </div>
  </div>
  <!-- ==========================================
         END: Sidebar Component
         ========================================== -->
