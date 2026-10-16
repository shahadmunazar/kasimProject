<?php

namespace App\Services;

class EmbeddedServices
{
    public static function all(): array
    {
        return [
            'embedded-hardware-design' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'hardware-pcb',
                'name' => 'Embedded Hardware Design',
                'short_desc' => 'Designs application-specific electronic architecture, circuits, power supplies, protection and interfaces for industrial, IoT and smart device products.',
                'target_keyword' => 'embedded hardware design services',
                'meta_title' => 'Embedded Hardware Design Services | TC Smart Technology',
                'meta_description' => 'Custom embedded hardware design for sensors, controllers, IoT devices and industrial equipment with power, protection and schematic review.',
                'icon' => 'fa-microchip',
                'is_priority' => true,
                'problem' => 'Developing new electronic hardware requires balancing power efficiency, component obsolescence, electromagnetic compatibility, and manufacturability without incurring costly PCB re-spins.',
                'outcome' => 'A robust, application-specific electronic circuit architecture optimized for production yield, component availability, operational reliability, and target bill-of-materials (BOM) cost.',
                'capabilities' => [
                    'Microcontroller & processor selection (ARM Cortex, ESP32, STM32, PIC, Nordic)',
                    'Analog signal conditioning, ADC/DAC circuit design & precision sensing',
                    'Power supply architecture: Buck, Boost, LDO, battery charging & power-path control',
                    'Protection circuitry: ESD suppression, overvoltage, reverse polarity & thermal limits',
                    'Industrial bus interfaces: RS-485, CAN 2.0B / CAN-FD, SPI, I2C, UART, Ethernet',
                    'Comprehensive schematic capture & design-for-manufacturing (DFM) verification'
                ],
                'technical_approach' => 'We start with a thorough requirement analysis to map operational limits, power budgets, and sensor interfaces. Schematics are drafted in Altium/KiCad with strict component lifecycle checks, followed by simulation and thermal/EMC review before prototyping.',
                'deliverables' => [
                    'Verified schematic files (PDF, Altium / KiCad native files)',
                    'Structured Bill of Materials (BOM) with manufacturer part numbers and vetted second sources',
                    'Hardware architecture specification and pinout mapping document',
                    'Power budget and thermal dissipation analysis report',
                    'Bring-up checklist and initial validation test results'
                ],
                'inputs_needed' => 'Target product specifications, input power sources, operating environment (temperatures, ingress protection), required external sensors/interfaces, and target unit manufacturing cost.',
                'limitations' => 'Does not include custom silicon ASIC design or third-party EMC lab certification fees. Compliance testing is performed according to client-approved test plans.',
                'faqs' => [
                    [
                        'q' => 'Which microcontroller architectures do you support for hardware design?',
                        'a' => 'We design for 8-bit, 16-bit, and 32-bit platforms including ARM Cortex-M (STM32, NXP), ESP32 series, Nordic nRF BLE/cellular SOCs, Microchip PIC/AVR, and Texas Instruments controllers.'
                    ],
                    [
                        'q' => 'How do you mitigate component obsolescence risks?',
                        'a' => 'During schematic design and BOM generation, we verify component lifecycle status with major authorized distributors and designate pin-compatible second-source alternatives wherever feasible.'
                    ],
                    [
                        'q' => 'Can you design hardware compliant with industrial EMC requirements?',
                        'a' => 'Yes. We implement transient voltage suppression (TVS), ferrite bead filtering, proper ground plane isolation, and ESD protection circuits following industrial electromagnetic compatibility best practices.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'pcb-design-layout' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'hardware-pcb',
                'name' => 'PCB Design and Layout',
                'short_desc' => 'Converts approved schematics into high-density, manufacturable multilayer PCB layouts, fabrication Gerber files and assembly outputs.',
                'target_keyword' => 'PCB design and layout services',
                'meta_title' => 'PCB Design and Layout Services | TC Smart Technology',
                'meta_description' => 'Multilayer PCB design, HDI routing, controlled impedance, thermal planning and production-ready Gerber fabrication outputs.',
                'icon' => 'fa-layer-group',
                'is_priority' => true,
                'problem' => 'Poor PCB layout causes signal integrity degradation, high EMI emissions, thermal hotspots, and assembly failures during automated SMT pick-and-place manufacturing.',
                'outcome' => 'Production-ready multilayer PCB layouts engineered for controlled impedance, optimal thermal dissipation, low EMI, and seamless fabrication by SMT assembly houses.',
                'capabilities' => [
                    'Multilayer PCB layout (2 to 12 layers) with solid power/ground plane partitioning',
                    'High-speed differential pair routing and controlled impedance calculation',
                    'Thermal relief, thermal vias, and heat sink integration for high-power stages',
                    'Design for Manufacturing (DFM) and Design for Assembly (DFA) rule validation',
                    'Rigid, rigid-flex, and high-density interconnect (HDI) printed circuit boards',
                    'Full fabrication package: RS-274X / ODB++ Gerbers, drill tables, and centroid files'
                ],
                'technical_approach' => 'Layout starts with board outline definition, connector placement constraints, and layer stackup planning. We route critical power and high-speed lines first, verify DRC rules against fabricator capabilities, and perform 3D mechanical clearance checking.',
                'deliverables' => [
                    'Complete fabrication package: RS-274X Gerber and Excellon drill files',
                    'Pick-and-place centroid (XY) coordinates and assembly drawings',
                    'Layer stackup and controlled impedance specification document',
                    '3D STEP model of the assembled PCB for mechanical CAD enclosure fitting',
                    'Comprehensive DFM report verifying clearances and copper weights'
                ],
                'inputs_needed' => 'Approved schematic netlist, board physical dimensions/enclosure constraints, connector locations, target layer count, and operating temperature range.',
                'limitations' => 'PCB fabrication and assembly costs from commercial board houses are billed separately or handled directly by the customer with our documentation package.',
                'faqs' => [
                    [
                        'q' => 'What CAD tools do you utilize for PCB layout?',
                        'a' => 'Our engineering team uses industry-standard EDA tools including Altium Designer and KiCad, delivering native layout databases along with universal Gerber/ODB++ files.'
                    ],
                    [
                        'q' => 'Do you provide 3D models for enclosure mechanical checks?',
                        'a' => 'Yes. Every finished PCB layout includes a detailed 3D STEP model showing all electronic components, connectors, and mounting holes for mechanical CAD verification.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'microcontroller-product-development' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'hardware-pcb',
                'name' => 'Microcontroller Product Development',
                'short_desc' => 'Develops application-specific microcontroller-based products for sensing, control, monitoring, and communication platforms.',
                'target_keyword' => 'microcontroller product development',
                'meta_title' => 'Microcontroller Product Development | TC Smart Technology',
                'meta_description' => 'Turnkey microcontroller product development for industrial sensing, process control and smart embedded appliances.',
                'icon' => 'fa-calculator',
                'is_priority' => true,
                'problem' => 'Transitioning from experimental development boards to a cohesive, maintainable commercial microcontroller product requires rigorous architecture and production readiness.',
                'outcome' => 'A scalable, deployable embedded microcontroller product combining custom hardware, deterministic firmware, sensor integration, and industrial enclosure fitting.',
                'capabilities' => [
                    'Processor sizing based on RAM, Flash, clock speed, and peripheral requirements',
                    'Low-power sleep-state optimization for battery-operated sensing devices',
                    'On-board watchdogs, brown-out detection, and fail-safe recovery logic',
                    'Integrated human-machine interfaces: OLED/TFT displays, keypads, and status LEDs',
                    'Non-volatile EEPROM/Flash storage for calibration, parameters, and event logs',
                    'End-to-end integration with sensors, actuators, and communication transceivers'
                ],
                'technical_approach' => 'We design the controller architecture around the exact mathematical throughput and I/O latency requirements of the application, avoiding over-specified silicon while ensuring headroom for firmware updates.',
                'deliverables' => [
                    'Complete schematic and PCB production files',
                    'Production firmware source code with modular drivers and state-machine logic',
                    'Programming and flashing procedure documentation for factory assembly',
                    'Validated bench testing report across defined supply voltage ranges'
                ],
                'inputs_needed' => 'Product functionality requirements, control cycle times, user interface preferences, battery vs mains power constraints, and operating environment.',
                'limitations' => 'Excludes proprietary intellectual property licensing not owned by the client. Toolchain licenses (if closed proprietary) must be arranged by the client.',
                'faqs' => [
                    [
                        'q' => 'Can you design battery-powered ultra-low-power microcontroller devices?',
                        'a' => 'Yes. We implement low-leakage circuit designs, configure deep-sleep modes, and utilize event-driven firmware architectures that prolong battery life.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'firmware-development' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'software-platforms',
                'name' => 'Firmware Development',
                'short_desc' => 'Creates maintainable device firmware, drivers, control logic, diagnostics, bootloaders, and communications in embedded C and C++.',
                'target_keyword' => 'embedded firmware development services',
                'meta_title' => 'Firmware Development Services | TC Smart Technology',
                'meta_description' => 'Embedded C/C++ firmware development, peripheral drivers, RTOS multitasking, bootloaders and diagnostics for connected products.',
                'icon' => 'fa-code',
                'is_priority' => true,
                'problem' => 'Unstructured firmware leads to system lockups, race conditions, memory corruption, and extreme difficulty in maintaining code across product revisions.',
                'outcome' => 'Modular, MISRA-conscious embedded C/C++ firmware featuring layered hardware abstraction, deterministic task execution, non-blocking I/O, and secure update capabilities.',
                'capabilities' => [
                    'Bare-metal and RTOS-based firmware architectures (FreeRTOS, Zephyr)',
                    'Low-level peripheral driver development (I2C, SPI, UART, PWM, ADC, DMA)',
                    'Fail-safe bootloaders with dual-bank Flash and secure OTA/serial firmware update',
                    'Real-time control algorithms: PID loops, motor control, and sensor filtering',
                    'Fault-handling routines, watchdog management, and non-volatile crash dumps',
                    'Unit testing, static code analysis, and hardware-in-the-loop (HIL) verification'
                ],
                'technical_approach' => 'Our firmware engineering adopts strict separation between the Hardware Abstraction Layer (HAL), board support packages (BSP), and application business logic. State machines ensure deterministic execution and predictable recovery.',
                'deliverables' => [
                    'Fully documented C/C++ source code repository with build scripts (CMake/Make)',
                    'Compiled binary/hex files with memory map reports',
                    'Bootloader integration instructions and serial/OTA flashing guidelines',
                    'Software architecture specification and API reference documentation'
                ],
                'inputs_needed' => 'Target microcontroller datasheet, hardware schematics, pin configuration, state transition diagrams or control logic requirements.',
                'limitations' => 'Cryptographic keys and security certificates must be generated and secured by the customer.',
                'faqs' => [
                    [
                        'q' => 'Do you provide source code upon project completion?',
                        'a' => 'Yes. Deliverables include complete source code, build scripts, configuration files, and documentation under customer ownership as agreed in the project scope.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'embedded-linux-rtos' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'software-platforms',
                'name' => 'Embedded Linux and RTOS',
                'short_desc' => 'Implements multitasking, deterministic control, device drivers, networking, and application services for edge gateways and industrial processors.',
                'target_keyword' => 'embedded Linux and RTOS services',
                'meta_title' => 'Embedded Linux and RTOS Services | TC Smart Technology',
                'meta_description' => 'Yocto, Buildroot, FreeRTOS and Zephyr embedded Linux board support packages, kernel drivers and real-time networking.',
                'icon' => 'fa-terminal',
                'is_priority' => true,
                'problem' => 'Complex edge gateways and smart industrial products require deterministic real-time response, multi-threaded communication, and secure network stacks without bloat.',
                'outcome' => 'Optimized, stripped-down Linux images (Yocto/Buildroot) or deterministic RTOS implementations with custom board support packages and verified driver operation.',
                'capabilities' => [
                    'Board Support Package (BSP) configuration and custom Linux kernel tuning',
                    'Real-time operating system integration: FreeRTOS, Zephyr, and RTEMS',
                    'Device tree authoring and custom peripheral kernel driver development',
                    'Inter-process communication (IPC), shared memory, and socket networking',
                    'Secure boot, encrypted filesystems, and atomic system recovery mechanisms',
                    'Industrial protocol daemon integration: MQTT, OPC-UA, Modbus TCP'
                ],
                'technical_approach' => 'We tailor the OS footprint to the target Flash/RAM constraints, stripping unnecessary background services and hardening network interfaces. Real-time priorities ensure sub-millisecond control determinism.',
                'deliverables' => [
                    'Custom Linux BSP build recipes (Yocto layers or Buildroot configurations)',
                    'Kernel device tree files and compiled device drivers',
                    'Deployment flash images and SD/eMMC provisioning procedures',
                    'System administration and security configuration handbook'
                ],
                'inputs_needed' => 'Target SoC/processor board, hardware block diagrams, required peripheral list, network connectivity protocols, and storage medium specifications.',
                'limitations' => 'Third-party commercial RTOS licenses (e.g. VxWorks, QNX) are customer-supplied if selected.',
                'faqs' => [
                    [
                        'q' => 'When should an RTOS be used instead of Embedded Linux?',
                        'a' => 'An RTOS is ideal for sub-millisecond determinism, constrained microcontrollers (under 512KB RAM), and ultra-low-power consumption. Linux is preferred when high-level networking, graphical HMIs, or complex file systems are required.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'iot-device-development' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'iot-interfaces',
                'name' => 'IoT Device Development',
                'short_desc' => 'Builds secure connected devices that acquire sensor data and exchange approved telemetry with gateways, cloud platforms, and dashboards.',
                'target_keyword' => 'IoT device development services',
                'meta_title' => 'IoT Device Development Services | TC Smart Technology',
                'meta_description' => 'Turnkey connected IoT device engineering: sensors, cellular/Wi-Fi/BLE connectivity, local storage and encrypted cloud telemetry.',
                'icon' => 'fa-wifi',
                'is_priority' => true,
                'problem' => 'Connected devices frequently suffer from erratic wireless connectivity, excessive power drain, data loss during outages, and vulnerabilities in remote transmission.',
                'outcome' => 'Production-ready IoT devices engineered with fail-safe local buffering, encrypted cloud telemetry, automatic reconnection routines, and low-power wireless profiles.',
                'capabilities' => [
                    'Wireless connectivity integration: Wi-Fi, BLE 5.x, LTE-M, NB-IoT, LoRaWAN',
                    'Local non-volatile buffering to prevent data loss during network disconnections',
                    'Encrypted communication using TLS 1.3, MQTT with mTLS, and HTTPS REST APIs',
                    'Battery management and solar harvesting power circuitry',
                    'Over-the-air (OTA) firmware upgrade mechanisms with rollback protection',
                    'Compact enclosure integration with ingress protection (IP65/IP67 considerations)'
                ],
                'technical_approach' => 'We design the edge device to operate reliably under intermittent network conditions. Telemetry payloads are serialized into compact JSON or Protocol Buffers, cached locally in SPI Flash, and transmitted upon network restoration.',
                'deliverables' => [
                    'Complete electronic design package (schematic, layout, BOM)',
                    'Validated device firmware with cloud connection client',
                    'API payload specification and gateway mapping documentation',
                    'Bench test reports validating RF link quality and power consumption'
                ],
                'inputs_needed' => 'Required sensor measurements, transmission frequency, operating environment, available power source (battery vs mains), and target cloud backend platform.',
                'limitations' => 'Cellular network SIM subscriptions and third-party cloud hosting fees are the responsibility of the customer.',
                'faqs' => [
                    [
                        'q' => 'How does the IoT device handle lost internet connectivity?',
                        'a' => 'The firmware logs time-stamped sensor data to non-volatile on-board memory and automatically uploads buffered records once communication is re-established.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'sensor-data-acquisition-integration' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'iot-interfaces',
                'name' => 'Sensor and Data-Acquisition Integration',
                'short_desc' => 'Integrates sensors, signal conditioning, sampling, calibration, and validated measurements for physical and electrical parameters.',
                'target_keyword' => 'sensor and data acquisition integration',
                'meta_title' => 'Sensor & Data Acquisition Integration | TC Smart Technology',
                'meta_description' => 'Industrial sensor integration, precision signal conditioning, ADC sampling, calibration logic and noise reduction circuitry.',
                'icon' => 'fa-wave-square',
                'is_priority' => true,
                'problem' => 'Raw sensor signals in industrial environments are prone to ground loops, electromagnetic interference, sensor drift, and nonlinear response curves.',
                'outcome' => 'Accurate, validated data acquisition circuitry featuring active filtering, galvanic isolation, calibration tables, and deterministic digital sampling.',
                'capabilities' => [
                    'Measurement integration: temperature (RTD PT100/1000, thermocouples), humidity, pressure, vibration, current, voltage, AQI',
                    'Analog front-end (AFE) conditioning with low-noise instrumentation amplifiers',
                    'Galvanic and optical isolation to protect controllers from high-voltage transients',
                    'Configurable digital filtering (moving average, Kalman filters, Butterworth)',
                    'Multi-point calibration curves stored in non-volatile memory',
                    'Standard 4-20mA current loop and 0-10V industrial analog transmitter interfaces'
                ],
                'technical_approach' => 'Sensors are vetted for repeatability, operating temperature boundaries, and response time. Signal conditioning paths feature differential routing and ground plane separation to eliminate plant-floor electrical noise.',
                'deliverables' => [
                    'Signal conditioning schematic and PCB design files',
                    'Sensor calibration equations, lookup tables, and conversion code',
                    'Sampling frequency and measurement accuracy validation report',
                    'Integration wiring guide detailing shielding and grounding requirements'
                ],
                'inputs_needed' => 'Physical parameter to measure, required measurement range, resolution, sampling rate, cable run distances, and environmental conditions.',
                'limitations' => 'Measurement accuracy depends on sensor specifications and periodic re-calibration by the site operator.',
                'faqs' => [
                    [
                        'q' => 'Can you integrate 4-20mA and 0-10V industrial sensors?',
                        'a' => 'Yes. We provide precision current shunt circuits, surge protection, and scalable ADC sampling for standard 4-20mA current loops and 0-10V analog signals.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'communication-protocol-integration' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'iot-interfaces',
                'name' => 'Communication Protocol Integration',
                'short_desc' => 'Adds supported serial, fieldbus, Ethernet, wireless, and industrial messaging interfaces to connected products.',
                'target_keyword' => 'communication protocol integration',
                'meta_title' => 'Communication Protocol Integration | TC Smart Technology',
                'meta_description' => 'Integration of RS-485 Modbus RTU/TCP, CAN bus, Ethernet, MQTT, BLE and custom serial protocols for industrial controllers.',
                'icon' => 'fa-exchange-alt',
                'is_priority' => true,
                'problem' => 'Disparate industrial machinery and edge devices speak conflicting communication standards, creating integration bottlenecks and dropped packets.',
                'outcome' => 'Seamless, robust communication stacks implementing standard fieldbus and network protocols with comprehensive error detection and recovery.',
                'capabilities' => [
                    'Fieldbus protocols: Modbus RTU (RS-485), Modbus TCP, CAN 2.0B / J1939',
                    'Serial interfaces: UART, SPI, I2C with hardware DMA and FIFO buffering',
                    'Industrial networking: Ethernet (TCP/IP, UDP), HTTP REST, WebSockets',
                    'IoT messaging protocols: MQTT with QoS levels, CoAP, and lightweight telemetry',
                    'Wireless short-range: Bluetooth Low Energy (custom GATT services), Wi-Fi',
                    'CRC checksum calculation, message framing, timeout and automatic retry logic'
                ],
                'technical_approach' => 'Communication drivers are built with asynchronous, non-blocking state machines. Register maps are thoroughly structured and documented for simple third-party PLC and SCADA integration.',
                'deliverables' => [
                    'Protocol driver source code and configuration headers',
                    'Comprehensive Modbus / register memory map documentation',
                    'Protocol test scripts and packet validation logs (Wireshark / logic analyzer)',
                    'Interface integration guidelines for system integrators'
                ],
                'inputs_needed' => 'Selected physical bus, transceiver types, baud rates, register definitions, master/slave topology, and communication cycle timings.',
                'limitations' => 'Third-party proprietary protocols requiring proprietary licensing or NDAs must be supplied by the customer.',
                'faqs' => [
                    [
                        'q' => 'Can you implement both Modbus RTU Master and Slave modes?',
                        'a' => 'Yes. We can configure devices as Modbus RTU Slaves to report values to PLCs, or as Masters to poll third-party energy meters and instruments.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'prototype-development' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'product-lifecycle',
                'name' => 'Prototype and Proof-of-Concept Development',
                'short_desc' => 'Validates critical functions, interfaces, and technical feasibility before major engineering or mass production investment.',
                'target_keyword' => 'embedded prototype and proof of concept development',
                'meta_title' => 'Embedded Prototype Development | TC Smart Technology',
                'meta_description' => 'Rapid embedded prototyping, proof-of-concept hardware, functional validation and engineering feasibility testing.',
                'icon' => 'fa-flask',
                'is_priority' => true,
                'problem' => 'Investing directly into mass tooling and high-volume production without functional proof-of-concept testing leads to catastrophic redesign costs.',
                'outcome' => 'A functional, bench-tested working prototype that answers critical technical questions, proves feasibility, and establishes the product roadmap.',
                'capabilities' => [
                    'Rapid electronic prototype assembly using development modules or quick-turn PCBs',
                    'Firmware proof-of-concept demonstrating core algorithms and sensor interaction',
                    'Placeholder 3D printed mechanical enclosure integration',
                    'Functional verification against agreed success criteria and boundary conditions',
                    'Risk identification and design gap analysis for subsequent production revisions',
                    'Roadmap and cost projection for full compliance engineering and volume DFM'
                ],
                'technical_approach' => 'We define specific validation questions upfront. The prototype is engineered to test high-risk interfaces, power demands, and sensor fidelity before freezing schematics for production.',
                'deliverables' => [
                    'Working functional hardware prototype demonstrator (bench unit)',
                    'Prototype schematic, wiring diagram, and source code files',
                    'Proof-of-concept test observation and risk analysis report',
                    'Engineering roadmap outlining changes required for commercial production'
                ],
                'inputs_needed' => 'Target product concept, core problem to solve, critical validation criteria, desired delivery timeline, and operating demonstrator expectations.',
                'limitations' => 'A proof of concept is not production-ready; mechanical tooling, formal regulatory certifications, and full environmental qualification are scoped in subsequent phases.',
                'faqs' => [
                    [
                        'q' => 'Is a functional prototype ready for commercial sale?',
                        'a' => 'No. A prototype validates feasibility and operational logic. Commercial release requires compliance testing, production tooling, optimized BOM sourcing, and manufacturing test fixtures.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'embedded-product-testing' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'product-lifecycle',
                'name' => 'Embedded Product Testing',
                'short_desc' => 'Verifies functions, firmware, sensors, interfaces, and communication against agreed technical requirements.',
                'target_keyword' => 'embedded product testing services',
                'meta_title' => 'Embedded Product Testing Services | TC Smart Technology',
                'meta_description' => 'Comprehensive embedded verification: functional testing, boundary stress tests, power analysis and regression validation.',
                'icon' => 'fa-vial',
                'is_priority' => true,
                'problem' => 'Undetected firmware race conditions, voltage dip sensitivities, and sensor edge cases result in high field return rates and product recalls.',
                'outcome' => 'A thoroughly validated embedded system backed by comprehensive pass/fail test records, defect logs, and operational boundary verification.',
                'capabilities' => [
                    'Requirement-based functional test execution across all hardware interfaces',
                    'Input voltage fluctuation, brownout, and power-cycling stress tests',
                    'Communication bus stress testing with corrupted packets and high traffic loads',
                    'Temperature chamber operational checks across defined thermal ranges',
                    'Defect tracking, issue root-cause analysis, and regression verification',
                    'Automated test fixture execution for repeatable board-level screening'
                ],
                'technical_approach' => 'Testing is performed following structured test plans derived from product requirements. Edge conditions (voltage sags, sensor disconnections, buffer overruns) are deliberately triggered to verify graceful recovery.',
                'deliverables' => [
                    'Formal Test Plan and verification matrix linking requirements to test cases',
                    'Detailed Test Execution Report with time-stamped pass/fail data and waveforms',
                    'Defect logs categorizing severity, root cause, and remediation status',
                    'Recommendations for hardware layout or firmware hardening'
                ],
                'inputs_needed' => 'Target product units, product functional specification, acceptance criteria, and specific stress or boundary condition parameters.',
                'limitations' => 'Formal certified laboratory EMC/EMI or safety certification (e.g., CE, FCC, UL) is performed by accredited third-party test houses; we assist with pre-compliance execution.',
                'faqs' => [
                    [
                        'q' => 'Do you provide pre-compliance testing support?',
                        'a' => 'Yes. We conduct bench-level pre-compliance checks for power supply noise, signal overshoot, and thermal boundaries before you submit units to accredited test labs.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'product-troubleshooting-upgrade' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'product-lifecycle',
                'name' => 'Troubleshooting and Product Upgrade',
                'short_desc' => 'Investigates electronic faults, component obsolescence, and controlled hardware or firmware improvements for existing products.',
                'target_keyword' => 'embedded troubleshooting and upgrade services',
                'meta_title' => 'Embedded Troubleshooting & Product Upgrade | TC Smart Technology',
                'meta_description' => 'Resolve legacy electronic faults, replace obsolete chips, add IoT connectivity and modernize firmware for existing hardware.',
                'icon' => 'fa-tools',
                'is_priority' => true,
                'problem' => 'Legacy embedded products face sudden end-of-life (EOL) component notices, recurring field failures, or demands for modern cloud connectivity.',
                'outcome' => 'Restored manufacturability, upgraded processing capability, and resolved field failures with minimal changes to existing enclosures or wiring.',
                'capabilities' => [
                    'Root-cause failure analysis of recurring hardware faults and field returns',
                    'BOM obsolescence review and drop-in or pin-compatible component replacement',
                    'Microcontroller redesign to modern, readily available silicon families',
                    'Addition of wireless or Ethernet connectivity to standalone legacy machines',
                    'Firmware reverse-engineering and modernization from legacy C or assembly code',
                    'Controlled revision control and engineering change order (ECO) documentation'
                ],
                'technical_approach' => 'We perform non-destructive circuit analysis, review available schematics, and isolate failure points. When replacing obsolete chips, we prioritize drop-in replacements to avoid tooling changes.',
                'deliverables' => [
                    'Failure investigation and root-cause analysis diagnostic report',
                    'Updated schematics, BOM, and PCB layout files reflecting replacement components',
                    'Ported and verified firmware adapted to replacement controllers/peripherals',
                    'Comparative validation report confirming backward compatibility'
                ],
                'inputs_needed' => 'Existing schematics, PCB layout files, sample units showing failure symptoms, and component replacement priorities.',
                'limitations' => 'Achievable scope is governed by the availability of existing design files, source code, and intellectual property authorization.',
                'faqs' => [
                    [
                        'q' => 'Can you help if we only have the Gerber files and no source code?',
                        'a' => 'We can review Gerber files for hardware redesign and develop clean firmware from functional specifications, subject to IP ownership confirmation.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],

            'production-engineering-support' => [
                'category_slug' => 'embedded-design-development',
                'subcategory_slug' => 'product-lifecycle',
                'name' => 'Production Engineering Support',
                'short_desc' => 'Prepares approved electronic designs for repeatable pilot builds, factory flashing, test fixtures, and manufacturing release.',
                'target_keyword' => 'production engineering support for electronics',
                'meta_title' => 'Production Engineering Support | TC Smart Technology',
                'meta_description' => 'Electronic manufacturing release: DFM reviews, automated test fixtures, programming jigs and pilot build coordination.',
                'icon' => 'fa-industry',
                'is_priority' => true,
                'problem' => 'Handing over a prototype to an EMS manufacturing plant without test fixtures or assembly instructions results in high failure rates and assembly delays.',
                'outcome' => 'A robust manufacturing transfer package featuring bed-of-nails test fixtures, automated firmware flashing jigs, and streamlined pilot production.',
                'capabilities' => [
                    'Design for Manufacturing (DFM) and Design for Assembly (DFA) audits',
                    'Manufacturing documentation: PCB assembly drawings, polarity diagrams, wiring guides',
                    'Design and fabrication of automated bed-of-nails test fixtures (Pogo pin jigs)',
                    'Automated production programming and serialized flashing scripts',
                    'Pilot production line monitoring, yield analysis, and initial fault classification',
                    'Engineering Change Order (ECO) workflows and component lifecycle tracking'
                ],
                'technical_approach' => 'We collaborate with your assembly partner to establish test points, solder paste stencils, and automated flashing routines that verify every board in under 60 seconds.',
                'deliverables' => [
                    'Comprehensive Manufacturing Release Package (BOM, Gerbers, Pick-and-Place, Drawings)',
                    'Functional testing fixture design files or assembled test jig hardware',
                    'Production operator assembly and flashing instructions',
                    'Pilot run yield analysis report and DFM optimization recommendations'
                ],
                'inputs_needed' => 'Approved design files, target production volume, selected EMS factory capabilities, and required unit production cycle time.',
                'limitations' => 'Physical contract manufacturing line operations and component procurement capital are handled directly between the client and EMS provider.',
                'faqs' => [
                    [
                        'q' => 'Do you design custom production test jigs (bed-of-nails)?',
                        'a' => 'Yes. We design and build custom pogo-pin test fixtures with automated microcontroller flashing and pass/fail LED indicators for rapid factory screening.'
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],
        ];
    }
}
