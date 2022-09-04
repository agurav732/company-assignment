    <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                         
                            <li><a href="logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Admin<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
                </li>
                <li class="bold active"><a href="{{route('dashboard')}}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>
                <li class="bold"><a href="{{route('department')}}" class="waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Department</a>
                </li>
             <li class="bold"><a href="{{route('employee')}}" class="waves-effect waves-cyan"><i class="mdi-social-group"></i> Employee</a>
                </li>
            
            </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>