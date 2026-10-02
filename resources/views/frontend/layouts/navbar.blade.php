<style>
    /* Style for dropdown-submenu */
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu > .dropdown-menu {
    top: 0 !important;
    left: 100%;
    margin-top: 0 !important;
    position: absolute;
    transform: translateY(0%) !important;
}


/* Show submenu on hover for desktop and keep it open */
@media (min-width: 992px) {
    .dropdown-submenu.active > .dropdown-menu {
        display: block !important; /* Keep submenu open */
    }
    .dropdown-submenu:hover > .dropdown-menu {
        display: block !important; /* Show on hover */
    }
    /* Ensure category link remains clickable */
    .dropdown-submenu > a.dropdown-toggle {
        pointer-events: auto;
    }
}

/* For mobile: adjust submenu display */
@media (max-width: 991px) {
    .dropdown-submenu > .dropdown-menu {
        position: static;
        left: 0;
        margin: 0;
        padding-left: 15px;
        display: none; /* Initially hidden */
    }
    .dropdown-submenu.show > .dropdown-menu {
        display: block; /* Show when toggled */
    }
}

/* Ensure dropdown items are clickable */
.dropdown-item {
    cursor: pointer;
    user-select: none;
}

/* Prevent text selection on double-click */
.nav-link, .dropdown-item {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Ensure only one submenu is visible at a time */
.dropdown-menu .dropdown-submenu .dropdown-menu {
    display: none;
}

.dropdown-menu .dropdown-submenu.show .dropdown-menu {
    display: block;
}
</style>



<div class="container-fluid bg-white sticky-top wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="{{ route('home.index') }}" class="navbar-brand d-lg-none">
                <h1 class="m-0 text-primary">TC SMART</h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('home.index') }}" class="nav-item nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about_us.index') }}" class="nav-item nav-link {{ request()->routeIs('about_us.index') ? 'active' : '' }}">About</a>
                    <a href="{{ route('blogs.index') }}" class="nav-item nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}">Blogs</a>
                    <div class="nav-item dropdown">
                        <a href="{{ route('products.listing') }}" class="nav-link dropdown-toggle {{ request()->routeIs('products.*') ? 'active' : '' }}" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0" style="min-width: 250px;">
                            <a class="dropdown-item" href="{{ route('products.listing') }}">All Products</a>
                            @if(isset($navbarCategories))
                                @foreach($navbarCategories as $navCat)
                                    <div class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="{{ route('products.category', $navCat->slug) }}">
                                            {{ $navCat->name }}
                                        </a>
                                        @if($navCat->productModels && $navCat->productModels->count() > 0)
                                        <ul class="dropdown-menu">
                                            @foreach($navCat->productModels as $navModel)
                                            <li><a class="dropdown-item" href="{{ route('products.model', [$navCat->slug, $navModel->slug]) }}">{{ $navModel->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Services</a>
                       <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0" style="min-width: 500px;">

                            
                             <div class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('services.embedded_systems') }}">Embedded Systems Solutions</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('services.embedded.hw_firmware') }}">HW & Firmware Design</a></li>
                        <li><a class="dropdown-item" href="{{ route('services.embedded.pcb_power') }}">PCB & Power Engineering</a></li>
                        <li><a class="dropdown-item" href="{{ route('services.embedded.security') }}">Circuit Design & Security</a></li>
                        <li><a class="dropdown-item" href="{{ route('services.embedded.iot_cloud') }}">IoT & Cloud Integration</a></li>
                        <li><a class="dropdown-item" href="{{ route('services.embedded.medical_rd') }}">Medical R&D Services</a></li>
                        <li><a class="dropdown-item" href="{{ route('services.embedded.testing') }}">Testing Frameworks</a></li>
                    </ul>
                </div>
                          
                          <!-- industrial standard machine -->
                          <div class="dropdown-submenu">
    <a class="dropdown-item dropdown-toggle" href="{{ route('services.industrial_standard_machine') }}">
        Industrial Standard Machine
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('services.industrial.cnc_vmc') }}">CNC & VMC Machining Centers</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.injection_molding') }}">Injection Molding & Plastic Processing Machines</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.laser_cutting') }}">Laser Cutting, Engraving & Marking Machines</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.robotic_welding') }}">Robotic Welding & Automation Cells</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.hydraulic_servo_press') }}">Hydraulic & Servo Power Press Machines</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.lathe_turning') }}">Lathe & Turning Machines (Manual & CNC)</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.smart_packaging') }}">Smart Packaging & Labeling Machines</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.sheet_metal') }}">Automated Sheet Metal Bending & Shearing Machines</a></li>
        <li><a class="dropdown-item" href="{{ route('services.industrial.battery_ev') }}">Battery Assembly, EV & Energy Sector Machines</a></li>
    </ul>
</div>

                         

                            <!-- Industrial Automation & Robotics Solutions -->
                            <div class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="{{ route('services.industrial_automation') }}">Industrial Automation, Robotics & Switchgear Testing</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.plc_scada_hmi_programming') }}">PLC, SCADA & HMI Programming</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.robotics_integration') }}">Industrial Robotics Integration</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.machine_vision') }}">Machine Vision & Quality Inspection</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.motion_control') }}">Motion Control Solutions</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.iiot_industry4') }}">IIoT & Industry 4.0</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.switchgear_panel_design') }}">Switchgear Panel Design</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.high_voltage_testing') }}">High Voltage & Type Testing</a>
                                    <a class="dropdown-item" href="{{ route('services.embedded_hardware.test_bench_design') }}">Automated Test Bench Design</a>

                                </div>
                            </div>

                            <!-- HVAC System Solutions -->
                            <div class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="{{ route('services.hvac_solutions') }}">
                                HVAC System Solutions
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('services.hvac.installation') }}">
                                    HVAC Installation Services
                                </a>
                                <a class="dropdown-item" href="{{ route('services.hvac.maintenance') }}">
                                    HVAC Maintenance & AMC
                                </a>
                                <a class="dropdown-item" href="{{ route('services.hvac.repair') }}">
                                    HVAC Repair & Emergency Services
                                </a>
                                <a class="dropdown-item" href="{{ route('services.hvac.heating_cooling') }}">
                                    Heating & Cooling Solutions
                                </a>
                                <a class="dropdown-item" href="{{ route('services.hvac.ventilation') }}">
                                    Indoor Air Quality & Ventilation
                                </a>
                                <a class="dropdown-item" href="{{ route('services.hvac.energy') }}">
                                    Energy Optimization & System Design
                                </a>
                            </div>
                        </div>


                            <!-- Software Development Solutions -->
                            <div class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="{{ route('services.software') }}">Software Development Solutions</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('services.software.ai_machinelearning_solutions') }}">AI & Machine Learning Solutions</a>
                                    <a class="dropdown-item" href="{{ route('services.software.smart_automation') }}">IoT & Smart Automation Software</a>
                                    <a class="dropdown-item" href="{{ route('services.software.blockchain_platforms') }}">Blockchain & Cryptocurrency Platforms</a>
                                    <a class="dropdown-item" href="{{ route('services.software.mobile_application_development') }}">Mobile & Web Application Development</a>
                                    <a class="dropdown-item" href="{{ route('services.software.domain_based_solutions') }}">Domain-Based Standard Solutions</a>
                                    <a class="dropdown-item" href="{{ route('services.software.manpower_providing_services') }}">Manpower Providing Services</a>
                                    <a class="dropdown-item" href="{{ route('services.software.custom_erp_development') }}">Custom ERP, CRM, FinTech, Wallet Solutions</a>
                                    <a class="dropdown-item" href="{{ route('services.software.mlm_network_software') }}">MLM and Network Marketing Software</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('contact.index') }}" class="nav-item nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}">Contact</a>
                        </div>
        
                        <div class="ms-auto d-none d-lg-block">
                            <a href="{{ route('appointment.index') }}" class="btn btn-primary py-2 px-3">Get A Quote</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.dropdown-submenu > a.dropdown-toggle');
    let activeSubmenu = null; // Track the currently active submenu

    dropdownToggles.forEach(toggle => {
        // Hover behavior for desktop
        toggle.addEventListener('mouseenter', function () {
            const isDesktop = window.innerWidth >= 992;
            if (isDesktop) {
                const submenu = this.nextElementSibling;
                const parentSubmenu = this.closest('.dropdown-submenu');

                // Close the previously active submenu
                if (activeSubmenu && activeSubmenu !== parentSubmenu) {
                    activeSubmenu.classList.remove('active');
                    activeSubmenu.querySelector('.dropdown-menu').classList.remove('show');
                }

                // Show the current submenu and mark it as active
                submenu.classList.add('show');
                parentSubmenu.classList.add('active');
                activeSubmenu = parentSubmenu;
            }
        });

        // Click behavior for redirect and mobile toggle
        toggle.addEventListener('click', function (e) {
            const submenu = this.nextElementSibling;
            const parentSubmenu = this.closest('.dropdown-submenu');
            const href = this.getAttribute('href');
            const isDesktop = window.innerWidth >= 992;

            if (isDesktop) {
                // On desktop: redirect immediately on click
                if (href && href !== '#') {
                    window.location.href = href;
                }
            } else {
                // On mobile: toggle submenu on click
                e.preventDefault();
                e.stopPropagation();

                const isShown = submenu.classList.contains('show');

                // Close all other submenus within the same parent dropdown
                const parentDropdownMenu = this.closest('.dropdown-menu');
                const allSubmenus = parentDropdownMenu.querySelectorAll('.dropdown-submenu .dropdown-menu');
                const allSubmenuContainers = parentDropdownMenu.querySelectorAll('.dropdown-submenu');
                allSubmenus.forEach(sub => {
                    if (sub !== submenu) {
                        sub.classList.remove('show');
                    }
                });
                allSubmenuContainers.forEach(container => {
                    if (container !== parentSubmenu) {
                        container.classList.remove('show');
                    }
                });

                // Toggle the current submenu
                submenu.classList.toggle('show', !isShown);
                parentSubmenu.classList.toggle('show', !isShown);
            }
        });

        // Add click event to redirect when clicking the category text (not the toggle)
        toggle.addEventListener('click', function (e) {
            const isDesktop = window.innerWidth >= 992;
            if (!isDesktop) {
                // On mobile, if the submenu is open, redirect on second click
                const submenu = this.nextElementSibling;
                const isShown = submenu.classList.contains('show');
                const href = this.getAttribute('href');

                if (isShown && href && href !== '#') {
                    window.location.href = href;
                }
            }
        });
    });

    // Close submenu when clicking anywhere else on the page
    document.addEventListener('click', function (e) {
        const dropdownMenu = e.target.closest('.dropdown-menu');
        const navbarToggler = e.target.closest('.navbar-toggler');
        if (!dropdownMenu && !navbarToggler) {
            // If click is outside the dropdown menu and not on the toggler, close all submenus
            const allSubmenus = document.querySelectorAll('.dropdown-submenu .dropdown-menu');
            const allSubmenuContainers = document.querySelectorAll('.dropdown-submenu');
            allSubmenus.forEach(submenu => {
                submenu.classList.remove('show');
            });
            allSubmenuContainers.forEach(container => {
                container.classList.remove('active');
                container.classList.remove('show');
            });
            activeSubmenu = null;
        }
    });

    // Close all submenus when the parent dropdown is hidden
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('hide.bs.dropdown', function () {
            const submenus = dropdown.querySelectorAll('.dropdown-menu.show');
            const submenuContainers = dropdown.querySelectorAll('.dropdown-submenu');
            submenus.forEach(submenu => {
                submenu.classList.remove('show');
            });
            submenuContainers.forEach(container => {
                container.classList.remove('show');
                container.classList.remove('active');
            });
            activeSubmenu = null;
        });
    });

    // Ensure submenu items are clickable
    document.querySelectorAll('.dropdown-item:not(.dropdown-toggle)[href]').forEach(item => {
        item.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href !== '#') {
                window.location.href = href;
            }
        });
    });
});
</script>
