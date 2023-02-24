const preloader = document.querySelector('#preloader');
const sidebar = document.querySelector('aside');
const header = document.querySelector('header');
// sidebar
sidebar.innerHTML = 
`
<div class="logo-wrapper">
    <a href="index.html">
        <img src="./assets/images/logo/logo-small.png" class="img-fluid logo-small" alt="logo">
    </a>
</div>
<ul id="metismenu">
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="index.html" class="menu-link">
            <i class="ri-home-5-line"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="patient.html" class="menu-link">
            <i class="ri-user-line"></i>
            <span>Patient(s)</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="work-status.html" class="menu-link">
            <i class="ri-briefcase-4-line"></i>
            <span>Work Status</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="pending-list.html" class="menu-link">
            <i class="ri-file-list-3-line"></i>
            <span>Pending List</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="eremittance.html" class="menu-link">
            <i class="ri-wallet-line"></i>
            <span>E-Remittance</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="medical-record.html" class="menu-link">
            <i class="ri-file-chart-line"></i>
            <span>Medical Records</span>
        </a>
    </li>
    <li>
        <shape1 class="shape1"></shape1>
        <shape2 class="shape2"></shape2>
        <a href="#" class="has-arrow menu-link">
            <i class="ri-settings-5-line"></i>
            <span>Settings</span>
        </a>
        <ul class="submenu">
            <li>
                <a href="setting.html">
                    <i class="ri-dossier-line"></i>
                    <span>Practices</span>
                </a>
            </li>
            <li>
                <a href="setting-user.html">
                    <i class="ri-user-follow-line"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="setting-denial.html">
                    <i class="ri-file-damage-line"></i>
                    <span>Denial Reasons</span>
                </a>
            </li>
            <li>
                <a href="setting-reason.html">
                    <i class="ri-sort-asc"></i>
                    <span>Pending Reasons</span>
                </a>
            </li>
            <li>
                <a href="setting-provider.html">
                    <i class="ri-user-add-line"></i>
                    <span>Providers</span>
                </a>
            </li>
            <li>
                <a href="setting-insurance.html">
                    <i class="ri-shield-star-line"></i>
                    <span>Insurances</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
`
// header
header.innerHTML =
`
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div class="align-self-center">
            <select class="form-select form-select-sm">
                <option value="">---Select Practice---</option>
                <option>test</option>
                <option>test</option>
            </select>
        </div>
        <div class="align-self-center">
            <img src="./assets/images/logo/logo.png" class="img-fluid" alt="">
        </div>
        <div class="align-self-center">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <button class="btn p-0 text-dark-blue" type="button"><i
                            class='bx bx-upload'></i></button>
                </li>
                <li class="list-inline-item">
                    <button class="btn p-0 text-dark-blue" type="button" id="fullscreen"><i
                            class='bx bx-fullscreen'></i></button>
                </li>
                <li class="list-inline-item">
                    <div class="dropstart header-user">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <img src="./assets/images/user.jpg" class="img-fluid rounded-circle" alt="user">
                            <div class="align-self-center ms-2">
                                <h3>Admin</h3>
                                <span>admin@admin.com</span>
                            </div>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class='bx bx-user'></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class='bx bxs-edit'></i>Edit
                                    Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="sign.html"><i
                                        class='bx bx-power-off'></i>Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
`
// preloader
preloader.innerHTML = 
`
<div class="loader-wrap">
    <ul class="loader">
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
`