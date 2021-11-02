<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>
                    <p>{{ Auth::user()->dinas->nm_dinas ?? '-' }}</p>

                    <a href="{{ route('voyager.profile') }}"
                       class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
            <form id="logout" action="{{ route('voyager.logout') }}" method="POST">
                @csrf
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="#" data-toggle="modal" data-target="#logout_modal"
                           style="background-color: rgb(145 24 0); color: #fff">
                            <span class="icon voyager-power"></span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>
</div>
<!-- Modal -->
<div class="modal fade modal-danger" id="logout_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-key"></i>Konfirmasi logout</h4>
            </div>
            <div class="modal-body"><h4>Yakin untuk logout dari sistem?</h4></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-danger" onclick="document.getElementById('logout').submit()"
                   href="#">Ya, Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- ./Modal -->