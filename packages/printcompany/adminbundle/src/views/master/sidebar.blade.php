<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
        <div class="category-content">
            <div class="media">
                <a href="#" class="media-left"><img src="{{asset('ad_theme/images/demo/users/face11.jpg')}}" class="img-circle img-sm" alt=""></a>
                <div class="media-body">
                    <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                    <div class="text-size-mini text-muted">
                        <i class="icon-pin text-size-small"></i> &nbsp;تهران
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
           @include('admin::master.menu')
        </div>
    </div>
    <!-- /main navigation -->

</div>