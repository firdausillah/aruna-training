        <?php
        $request_uri = $_SERVER['REQUEST_URI'];
        $uri    = explode('/', $request_uri);
        ?>

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center" id="layout-navbar" style="background-color: transparent !important; backdrop-filter: unset !important;">
            <div class="navbar-nav-right d-flex align-items-center justify-content-between" id="navbar-collapse">
                <?php if(!in_array('dashboard', $uri)): ?>
                <a href="<?= base_url('member/dashboard') ?>">
                    <i class='bx bx-chevron-left text-white' style="font-size: xx-large;"></i>
                </a>
                <?php endif; ?>
                <ul class="navbar-nav flex-row align-items-center gap-3 ms-auto">
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class="bx bx-menu text-white" style="font-size: xx-large;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= base_url('member/biodata') ?>">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Biodata</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->
                </ul>
            </div>
        </nav>