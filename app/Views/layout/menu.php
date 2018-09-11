
<div class="header py-4">
    <div class="container">
        <div class="d-flex">
            <a class="header-brand" href="/profile/<?= $_SESSION['login'];?>">
                <span class="fa fa-twitter"></span>
                <span class="header-brand-img">My twitter</span>
            </a>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url(<?=  $_SESSION['avatar'];?>); width: 32px; height: 32px;"></span>
                        <span class="ml-2 d-none d-lg-block">
										<span class="text-default"><?=  $_SESSION['login'];?></span>
										<small class="text-muted d-block mt-1"><?= $_SESSION['role'];?></small>
									</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="/profile/<?= $_SESSION['login'];?>">
                            <i class="dropdown-icon fe fe-user"></i> Profile
                        </a>
                        <a class="dropdown-item" href="/profile/<?= $_SESSION['login'];?>/settings">
                            <i class="dropdown-icon fe fe-settings"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">
                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>

            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
            </a>
        </div>
    </div>
</div>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="/profile/<?= $_SESSION['login'];?>" id="item1" class="nav-link"><i class="fe fe-home"></i> My page</a>
                    </li>
                    <li class="nav-item">
                        <a href="/feed" id="item2" class="nav-link"><i class="fe fe-file"></i>Tweets feed</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>