<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <button type="submit" class="btn btn-primary rv-btn-toggle"><i class="zmdi zmdi-settings"></i></button>
        <li><a href="#" target="_blank" title="Add Media"><i class="zmdi zmdi-hc-fw"></i></a></li>

 
        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#DSLDImageUpload" title="Add Media"><i class="zmdi zmdi-camera"></i></a></li>


        <li><a href="javascript:void(0);" title="Clear Cache" onclick="clear_cache()"><i class="zmdi zmdi-hc-fw"></i></a></li>


        <li>
            <a href="{{ route('backend.setting') }}"  title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
        </li>


        <li>
            <a href="javascript::void(0);" class="mega-menu" title="Sign Out" onclick="logout()"><i class="zmdi zmdi-power"></i></a>
        </li>
        
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{ route('backend.dashboard') }}">
            @if(dsld_get_setting('dashboard_logo') > 0)
                <img src="{{ dsld_uploaded_file_path(dsld_get_setting('dashboard_logo')) }}"  alt="{{ dsld_upload_file_title(dsld_get_setting('dashboard_logo')) }}" width="25">
            @else
                <img src="{{ dsld_static_asset('backend/assets/images/logo.svg') }}" width="25" alt='{{ env("APP_NAME", "Backend New" ) }}'>
            @endif
        <span class="m-l-10">{{ dsld_get_setting('dashboard_title') }}</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">

                    @if(Auth::user()->avatar_original !='')
                        <a class="image" href="{{ route('profiles.index') }}">
                            <img src="{{ dsld_uploaded_file_path(Auth::user()->avatar_original) }}" class="rounded-circle shadow mr-2" alt="profile-image" width="35">
                        </a>
                    @else
                        <img src="{{ dsld_static_asset('backend/assets/images/profile_av.jpg') }}" class="rounded-circle shadow  mr-2" alt="profile-image" width="35">
                    @endif
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>Role: {{ Auth::user()->roles->pluck('name')->first() }}</small>                  
                    </div>
                </div>
            </li>
            <li class="{{ dsld_is_route_active(['backend.dashboard'], 'active open') }}"><a href="{{ route('backend.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

           
            <li class="{{ dsld_is_route_active(['media.library.admin'], 'active open') }}"><a href="{{ route('media.library.admin') }}"><i class="zmdi zmdi-folder"></i><span>Media</span></a></li>
              

            @if(dsld_check_permission(['show-dogs','show-breeds'])) 
            <li  class="{{ dsld_is_route_active(['dogs.index', 'dogs.edit', 'dogs.store', 'breeds.index', 'breeds.edit', 'breeds.store','genes.index', 'genes.edit'], 'active open') }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Dogs</span></a>
                <ul class="ml-menu">
                    @if(dsld_check_permission(['show-dogs']))
                    <li class="{{ dsld_is_route_active(['dogs.index', 'dogs.edit']) }}"><a href="{{ route('dogs.index') }}">Dogs</a></li>
                     @endif

                    @if(dsld_check_permission(['show-breeds']))
                    <li class="{{ dsld_is_route_active(['breeds.index', 'breeds.edit']) }}"><a href="{{ route('breeds.index') }}">Breeds</a></li>
                    @endif

                    @if(dsld_check_permission(['show-genes']))
                    <li class="{{ dsld_is_route_active(['genes.index', 'genes.edit']) }}"><a href="{{ route('genes.index') }}">Genes</a></li>
                    @endif

                </ul>
            </li> 
            @endif 
              

            @if(dsld_check_permission(['show-posts','show-posts'])) 
            <li  class="{{ dsld_is_route_active(['pages.index', 'pages.edit', 'frontend.setting','pages_section.index'], 'active open') }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Website</span></a>
                <ul class="ml-menu">
                    @if(dsld_check_permission(['show-posts']))
                    <li class="{{ dsld_is_route_active(['pages.index', 'pages.edit']) }}"><a href="{{ route('pages.index') }}">Pages</a></li>
                     @endif
                     
                    @if(dsld_check_permission(['show-frontend setting']))
                    <!-- Show-Frontend Setting-->
                    <li class="{{ dsld_is_route_active(['frontend.setting']) }}"><a href="{{ route('frontend.setting') }}">Frontend</a></li>
                    @endif

                    @if(dsld_check_permission(['sections']))
                    <!-- Show-Terminal-->
                    <li class="{{ dsld_is_route_active(['pages_section.index']) }}"><a href="{{ route('pages_section.index') }}">Section</a></li>
                    @endif
                </ul>
            </li> 
            @endif 

            @if(dsld_check_permission(['show-questions','show-questions'])) 
            <li  class="{{ dsld_is_route_active(['questions.index', 'questions.edit','not_pet_questions.index', 'not_pet_questions.edit','task.approve'], 'active open') }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>QuiZ</span></a>
                <ul class="ml-menu">
                    @if(dsld_check_permission(['show-questions']))
                    <li class="{{ dsld_is_route_active(['questions.index', 'questions.edit']) }}"><a href="{{ route('questions.index') }}">Questions</a></li>
                     @endif
                    @if(dsld_check_permission(['show-not pet questions']))
                    <li class="{{ dsld_is_route_active(['not_pet_questions.index', 'not_pet_questions.edit']) }}"><a href="{{ route('not_pet_questions.index') }}">Not pet Questions</a></li>
                     @endif
                    @if(dsld_check_permission(['show-task approved']))
                    <li class="{{ dsld_is_route_active(['task.approve']) }}"><a href="{{ route('task.approve') }}">Task Submitted</a></li>
                     @endif
                </ul>
            </li> 
            @endif 


            @if(dsld_check_permission(['blogs','tags','categories'])) 
            <li  class="{{ dsld_is_route_active(['blogs.index','blogs.edit','tags.index','categories.index'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    @if(dsld_check_permission(['blogs']))
                    <li class="{{ dsld_is_route_active(['blogs.index','blogs.edit']) }}">
                        <a href="{{ route('blogs.index') }}">Blogs</a>
                    </li>
                    @endif
                    @if(dsld_check_permission(['tags']))
                    <li class="{{ dsld_is_route_active(['tags.index']) }}">
                        <a href="{{ route('tags.index') }}">Tags</a>
                    </li>
                    @endif
                    @if(dsld_check_permission(['categories']))
                    <li class="{{ dsld_is_route_active(['categories.index']) }}">
                        <a href="{{ route('categories.index') }}">Category</a>
                    </li>
                    @endif
                </ul>
            </li> 
            @endif 

            @if(dsld_check_permission(['show-backend setting','show-frontend setting','show-terminal']))
            <li class="{{ dsld_is_route_active(['backend.setting', 'backend.header', 'backend.footer',  'languages.index',  'translate.index'], 'active open') }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Settings</span></a>
                <ul class="ml-menu">
                    
                    @if(dsld_check_permission(['show-backend setting']))
                    <!-- Show-Backend Setting-->
                    <li class="{{ dsld_is_route_active(['backend.setting']) }}"><a href="{{ route('backend.setting') }}">Backend</a></li>
                    @endif


                    @if(dsld_check_permission(['show-terminal']))
                    <!-- Show-Terminal-->
                    <li class="{{ dsld_is_route_active(['terminal.index']) }}"><a href="{{ route('terminal.index') }}" target="blank">Terminal</a></li>
                    @endif


                    @if(dsld_check_permission(['languages']))
                    <!-- Show-Terminal-->
                    <li class="{{ dsld_is_route_active(['languages.index']) }}"><a href="{{ route('languages.index') }}">Language</a></li>
                    @endif
                    @if(dsld_check_permission(['translate']))
                    <!-- Show-Terminal-->
                    <li class="{{ dsld_is_route_active(['translate.index']) }}"><a href="{{ route('translate.index') }}">Translate</a></li>
                    @endif
                 
                </ul>
            </li> 
            @endif
            

            @if(dsld_check_permission(['show-roles','show-permissions'])) 
            <li  class="{{ dsld_is_route_active(['roles.index', 'role.edit', 'role.store', 'permissions.index', 'permission.edit', 'permission.store'], 'active open') }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Roles</span></a>
                <ul class="ml-menu">
                    @if(dsld_check_permission(['show-roles']))
                    <li class="{{ dsld_is_route_active(['roles.index', 'role.edit']) }}"><a href="{{ route('roles.index') }}">All Roles</a></li>
                     @endif

                    @if(dsld_check_permission(['show-permissions']))
                    <li class="{{ dsld_is_route_active(['permissions.index', 'permissions.edit']) }}"><a href="{{ route('permissions.index') }}">All Permissions</a></li>
                    @endif

                </ul>
            </li> 
            @endif

            @if(dsld_check_permission(['show-user'])) 
            <li class="{{ dsld_is_route_active(['users.index', 'users.edit', 'users.store'], 'active open') }}">
                <a href="{{ route('users.index') }}"><i class="zmdi zmdi-hc-fw"></i><span>Users</span></a>
            </li>
            @endif
            <li class="{{ dsld_is_route_active(['profiles.index'], 'active open') }}"><a href="{{ route('profiles.index') }}"><i class="zmdi zmdi-account"></i><span>Profile</span></a></li> 
        </ul>
    </div>
</aside>
