
<div class="sidebar sidebar-main sidebar-fixed" id="navbar-mobile-left">
  <!-- Main navigation -->
  <div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
      <ul class="navigation navigation-main navigation-accordion">
        <!-- Main -->
        <li class="navigation-header">
          <span>Main</span> <i class="icon-menu" title="" data-original-title="Main pages"></i>
        </li>
        <li>
          <a href="#"><i class="icon-stack2"></i> <span>Posts</span></a>
          <ul>
            <li class="{{ request()->is('backend/news*') ? 'active' : '' }}">
              <a href="{{ route(config('starter-kit.routes.name_prefix').'.posts.index') }}">
                All Posts
              </a>
            </li>
            <li class="{{ request()->is('backend/news*') ? 'active' : '' }}">
              <a href="{{ route(config('starter-kit.routes.name_prefix').'.posts.create') }}">
                Add Posts
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
  <!-- /main navigation -->