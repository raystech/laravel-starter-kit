<div class="sidebar sidebar-main">
  <div class="sidebar-content">
    <!-- User menu -->
    <div class="sidebar-user">
      <div class="category-content">
        <div class="media">
          <a href="#" class="media-left"><img src="{{ asset('images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
          <div class="media-body">
            <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
            <div class="text-size-mini text-muted">
              <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
            </div>
          </div>

          <div class="media-right media-middle">
            <ul class="icons-list">
              <li>
                <a href="#"><i class="icon-cog3"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /user menu -->

    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

          <!-- Main -->
          <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
          <li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
          <li>
            <a href="#" class="has-ul"><i class="icon-stack2"></i> <span>Page layouts</span></a>
            <ul class="hidden-ul">
              <li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
              <li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
              <li class="navigation-divider"></li>
              <li><a href="boxed_default.html">Boxed with default sidebar</a></li>
            </ul>
          </li>
          <li>
            <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index')}}">
              <i class="icon-stack2"></i> <span>Structure</span>
            </a>
          </li>
          <li class="">
            <a class="has-ul" href="#">
              <i class="icon-office"></i><span>Properties</span>
            </a>
            <ul>
              <li class="{{ menuIsRoute(config('starter-kit.route.name_prefix', 'rt-admin').'.posts.index') }}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.index', ['post_type'=>'property'])}}">
                  All Properties
                </a>
              </li>
              <li class="{{ menuIsRoute(config('starter-kit.route.name_prefix', 'rt-admin').'.posts.create') }}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.posts.create', ['post_type'=>'property'])}}">
                  Add New
                </a>
              </li>
              <li class="{{ urlDoesContainParam('taxonomy', 'property-zone') }}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index', ['taxonomy'=>'property-zone', 'post_type'=>'property'])}}">
                  Property Zone
                </a>
              </li>
              <li class="{{ urlDoesContainParam('taxonomy', 'property-type') }}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index', ['taxonomy'=>'property-type', 'post_type'=>'property'])}}">
                  Property Type
                </a>
              </li>
              <li class="{{ urlDoesContainParam('taxonomy', 'property-status')}}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index', ['taxonomy'=>'property-status', 'post_type'=>'property'])}}">
                  Property Status
                </a>
              </li>
              <li class="{{ urlDoesContainParam('taxonomy', 'property-feature')}}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index', ['taxonomy'=>'property-feature', 'post_type'=>'property'])}}">
                  Property Feature
                </a>
              </li>
              <li class="{{ urlDoesContainParam('taxonomy', 'property-label')}}">
                <a href="{{route(config('starter-kit.routes.name_prefix', 'rt-admin').'.terms.index', ['taxonomy'=>'property-label', 'post_type'=>'property'])}}">
                  Property Label
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="has-ul" href="#">
              <i class="icon-stack2"></i><span>General</span>
            </a>
            <ul>
              <li>
                <a class="" href="">
                  Dashboard
                </a>
              </li>
              <li>
                <a class="" href="">
                  Posts
                </a>
              </li>
              <li>
                <a class="" href="">
                  Properties
                </a>
              </li>
            </ul>
          </li>
          <li class="navigation-header">
            <span>Administration</span>
          </li>
          <li>
            <a class="" href="">
              Manage Users
            </a>
          </li>
          <li>
            <a class="has-ul" href="#">
              <span>
                Roles & Permissions
              </span>
            </a>
            <ul>
              <li>
                <a class="" href="">
                  Roles
                </a>
              </li>
              <li>
                <a class="" href="">
                  Permissions
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /main navigation -->

  </div>
</div>