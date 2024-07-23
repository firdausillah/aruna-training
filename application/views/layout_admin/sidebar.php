        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="<?= base_url() ?>/assets/img/aruna-logo-gram.png" width="25" alt="">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Aruna Training</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <!-- Trainer -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/trainer" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-user-rectangle"></i>
                        <div data-i18n="Analytics">Trainer</div>
                    </a>
                </li>
                <!-- Training -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/event" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-dumbbell"></i>
                        <div data-i18n="Analytics">Pelatihan</div>
                    </a>
                </li>
                <!-- E-User -->
                <li class="menu-item">
                    <a href="<?= base_url() ?>admin/user" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
            </ul>
        </aside>