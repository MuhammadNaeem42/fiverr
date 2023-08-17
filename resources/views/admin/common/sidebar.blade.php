<!--**********************************
      Sidebar start
  ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{ auth('admin')->user()->photo }}" alt="">
                <a href="javascript:void(0);"></a>
            </div>
            <h5 class="name"><span
                    class="font-w400">{{trans('lang.hello')}} ,</span> {{ auth('admin')->user()->full_name }}</h5>
            <p class="email">{{ auth('admin')->user()->email }}</p>
        </div>
        <ul class="metismenu" id="menu">

            <li><a href="{{route('admin.dashboard')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home"></i>
                    <span class="nav-text">{{trans('lang.dashboard')}}</span>
                </a>
            </li>

            <li class="nav-label">{{trans('lang.HR')}}</li>


            @canany(['read_admins','create_admins','update_admins','delete_admins'])
                <li>
                    <a href="{{route('admin.users.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-3"></i>
                        <span class="nav-text">{{trans('lang.admins')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_categories','create_categories','update_categories','delete_categories'])
                <li>
                    <a href="{{route('admin.categories.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-file"></i>
                        <span class="nav-text">{{trans('lang.categories')}}</span>
                    </a>
                </li>
            @endcanany

            @canany(['read_sliders','create_sliders','update_sliders','delete_sliders'])
                <li>
                    <a href="{{route('admin.sliders.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-photo-camera-1"></i>
                        <span class="nav-text">{{trans('lang.sliders')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_subscribers','create_subscribers','update_subscribers','delete_subscribers'])
                <li>
                    <a href="{{route('admin.subscribers.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-user-2"></i>
                        <span class="nav-text">{{trans('lang.subscribers')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_contacts','create_contacts','update_contacts','delete_contacts'])
                <li>
                    <a href="{{route('admin.contacts.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-folder"></i>
                        <span class="nav-text">{{trans('lang.contacts')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_partners','create_partners','update_partners','delete_partners'])
                <li>
                    <a href="{{route('admin.partners.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-layer"></i>
                        <span class="nav-text">{{trans('lang.partners')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_counters','create_counters','update_counters','delete_counters'])
                <li>
                    <a href="{{route('admin.counters.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-infinity"></i>
                        <span class="nav-text">{{trans('lang.counters')}}</span>
                    </a>
                </li>
            @endcanany
            @canany(['read_settings','update_settings'])
                <li><a href="{{route('admin.settings.index')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">{{trans('lang.settings')}}</span>
                    </a>
                </li>
            @endcanany


            <li class="nav-label"> {{trans('lang.other')}}</li>

            <li>
                <a href="{{ route('admin.profile.detail') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-controls"></i>
                    <span class="nav-text"> {{trans('lang.profile')}} </span>
                </a>

            </li>


        </ul>

    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
