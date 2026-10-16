<?php

namespace App\Services;

class IiotServices
{
    public static function all(): array
    {
        return [
            'smart-manufacturing-dashboard-oee' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'smart-manufacturing-oee',
                'name' => 'Smart Manufacturing Dashboard and OEE Monitoring',
                'short_desc' => 'Presents real-time machine status, production counts, downtime root causes, quality metrics, and agreed Overall Equipment Effectiveness indicators.',
                'target_keyword' => 'smart manufacturing dashboard and OEE monitoring',
                'meta_title' => 'Smart Manufacturing Dashboard & OEE Monitoring | TC Smart',
                'meta_description' => 'Real-time production dashboards, 10 manufacturing modules, OEE analytics, downtime tracking and shift reporting for factories.',
                'icon' => 'fa-chart-line',
                'is_priority' => true,
                'problem' => 'Plant leadership lacks real-time visibility into machine downtime, true cycle times, and scrap rates, relying on manual paper logs compiled days after production.',
                'outcome' => 'Live centralized manufacturing intelligence displaying agreed OEE (Availability, Performance, Quality), automated shift reports, and granular downtime categorization across all lines.',
                'capabilities' => [
                    'Real-Time Machine Status: live operating states (running, idle, alarm, offline)',
                    'Machine-Level Intelligence: cycle time distribution, energy per unit, shift statistics',
                    'Breakdown History: Pareto charts of root-cause stoppages and MTBF/MTTR tracking',
                    'Planned Downtime: changeover tracking, preventive maintenance, mold-change benchmarks',
                    'Rejection & Quality Analysis: defect classification and machine/mold/operator correlation',
                    'Production History: units, shots, and cycles compared against target quotas',
                    'Mold Change Analytics: setup duration, sequence compliance, and delay logs',
                    'Machine Runtime Analysis: Gantt-style timeline visualization of operational states',
                    'Energy Monitoring: correlation of kWh consumption with production volume',
                    'Administration & Configuration: role-based access, machine master data, and shifts'
                ],
                'technical_approach' => 'We connect to machine PLCs or non-invasive edge sensors to acquire true cycle pulses and alarm states. Data is published securely to a central database where calculation engines derive OEE based on customer-approved production formulas.',
                'deliverables' => [
                    'Configured smart manufacturing web dashboard with 10 operational modules',
                    'Edge gateway software and communication mapping to machine controllers',
                    'Agreed OEE calculation logic specification and downtime reason tree',
                    'Automated PDF/Excel shift report dispatch setup and role-based user management'
                ],
                'inputs_needed' => 'Machine controller models, available electrical signals, shift schedule definitions, standard ideal cycle times, and downtime reason codes.',
                'limitations' => 'OEE formulas and good/reject count definitions depend on accurate source signals and operator inputs; OEE percentage values cannot be guaranteed by software alone.',
                'faqs' => [
                    [
                        'q' => 'How is OEE calculated on the dashboard?',
                        'a' => 'OEE is calculated using the formula Availability × Performance × Quality. The planned operating time, ideal cycle times, and scrap count sources are agreed upon with your plant management team.'
                    ],
                    [
                        'q' => 'Can the dashboard connect to older machines without PLCs?',
                        'a' => 'Yes. We install non-invasive current sensors, optical cycle counters, or dry-contact edge modules to detect running state and cycle completions on older machinery.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'injection-molding-machine-iiot' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'machine-iiot',
                'name' => 'Injection Molding Machine IIoT Solution',
                'short_desc' => 'Connects compatible injection molding machines for real-time production counts, cycle time trends, mold allocation, and operational visibility.',
                'target_keyword' => 'injection molding machine IIoT solution',
                'meta_title' => 'Injection Molding Machine IIoT Solution | TC Smart',
                'meta_description' => 'Industrial IoT connectivity for plastic injection molding: shot counts, cycle time monitoring, mold tracking and Euromap protocol integration.',
                'icon' => 'fa-cube',
                'is_priority' => true,
                'problem' => 'Injection molding shops struggle with unrecorded mold changeovers, operator cycle tampering, cooling time variations, and untracked scrap parts.',
                'outcome' => 'Automated monitoring of shot counts, mold open/close cycles, barrel temperatures, rejection logs, and machine utilization without bypassing safety interlocks.',
                'capabilities' => [
                    'Connectivity via Euromap 63/77, Modbus, or direct PLC digital inputs',
                    'Automated shot counting, cycle time measurement, and cushion/pressure tracking',
                    'Mold allocation verification and shot life accumulation tracking',
                    'Downtime reason prompt integration via operator terminal',
                    'Shift-based production totals compared against target quotas',
                    'Centralized plant-floor view of all operating injection molding presses'
                ],
                'technical_approach' => 'We interface with controller communication ports or cycle limit switches to capture the precise shot timestamp. Telemetry is streamed to the IIoT server to calculate performance metrics and alert supervisors of cycle delays.',
                'deliverables' => [
                    'Machine interface hardware configuration (gateway / I/O module)',
                    'Injection molding dashboard with machine-wise telemetry and mold records',
                    'Downtime classification structure tailored to plastics processing',
                    'Integration guide and shift production reporting schedules'
                ],
                'inputs_needed' => 'Molding machine make/model, controller brand, available communication options, list of active molds, and shift operating hours.',
                'limitations' => 'Cannot bypass machine hydraulic, electrical, or safety interlocks. Hydraulic modifications are excluded.',
                'faqs' => [
                    [
                        'q' => 'Does this solution work on various molding machine brands?',
                        'a' => 'Yes. We connect to machines from major brands (e.g. Haitian, Engel, Ferromatik, Toshiba, Windsor) using either digital cycle signals or compatible communication protocols.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'injection-molding-auto-purging' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'machine-iiot',
                'name' => 'Auto Purging Solution for Injection Molding Machines',
                'short_desc' => 'Automates approved material and color purging workflows through recipe-based PLC sequences without bypassing machine safety systems.',
                'target_keyword' => 'injection molding auto purging solution',
                'meta_title' => 'Injection Molding Auto Purging Solution | TC Smart',
                'meta_description' => 'Automated, recipe-based material purging sequences for injection molding machines during color and resin changeovers.',
                'icon' => 'fa-sync-alt',
                'is_priority' => true,
                'problem' => 'Manual resin purging during color and material changeovers causes extensive resin waste, prolonged machine downtime, and inconsistent barrel cleaning.',
                'outcome' => 'A structured, automated purging sequence that coordinates screw rotation, shot volume, temperature readiness, and soaking cycles safely through the controller.',
                'capabilities' => [
                    'Recipe-based purging sequences tailored to specific resins, colors, and compounds',
                    'Barrel temperature readiness interlocks before screw rotation initiation',
                    'Automated shot/stroke count tracking and changeover duration logging',
                    'Operator safety confirmation screens and manual abort/pause handling',
                    'Time-stamped audit logs of every purge cycle executed per machine',
                    'Reduced dependency on undocumented manual operator habits'
                ],
                'technical_approach' => 'The solution interfaces with the injection molding machine controller (PLC/HMI) to execute an engineered sequence of low/high speed screw rotation and injection strokes once temperature interlocks confirm thermal readiness.',
                'deliverables' => [
                    'PLC logic and HMI recipe screen integration for automated purging',
                    'Resin-specific purge parameter configurations (soak times, strokes, speeds)',
                    'Safety validation and interlock verification checklist',
                    'Operator training documentation and purge event audit log exports'
                ],
                'inputs_needed' => 'Machine controller specifications, resin types used, purging compound guidelines, barrel volume, and authorized process engineering approvals.',
                'limitations' => 'The solution must be engineered specifically for the machine and material; it must never bypass machine guarding, hydraulic relief valves, or emergency stops. Material savings cannot be guaranteed.',
                'faqs' => [
                    [
                        'q' => 'Can auto-purging damage the machine screw or barrel?',
                        'a' => 'No. Strict temperature interlocks ensure that the sequence cannot run until barrel zones reach the specified melting temperature, preventing cold-screw overload.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'die-casting-machine-iot' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'machine-iiot',
                'name' => 'Die Casting Machine IoT Solution',
                'short_desc' => 'Captures approved die-casting production counts, cycle rates, downtime events, and process data from compatible casting machines.',
                'target_keyword' => 'die casting machine IoT solution',
                'meta_title' => 'Die Casting Machine IoT Solution | TC Smart Technology',
                'meta_description' => 'Industrial IoT connectivity for high pressure die casting: shot counts, cycle rates, furnace temperature monitoring and downtime tracking.',
                'icon' => 'fa-industry',
                'is_priority' => true,
                'problem' => 'Harsh thermal and mechanical environments in foundry shops make manual tracking of die casting shot counts, furnace temperatures, and die life inaccurate.',
                'outcome' => 'Ruggedized industrial IoT data collection delivering real-time shot rates, die life tracking, temperature logging, and unplanned stoppage analysis.',
                'capabilities' => [
                    'Rugged edge telemetry suited for high-temperature foundry environments',
                    'Die casting shot rate, cycle time, and lock/unlock event monitoring',
                    'Furnace and holding pot temperature telemetry integration',
                    'Die life cycle accumulation tracking with preventive maintenance alerts',
                    'Unplanned downtime recording with standardized reason codes',
                    'Shift production summaries accessible via web browser and mobile'
                ],
                'technical_approach' => 'High-durability sensors or opto-isolated PLC interfaces capture shot piston signals. Telemetry is transmitted over industrial wired Ethernet or shielded Wi-Fi to avoid foundry electrical noise.',
                'deliverables' => [
                    'Hardened industrial IoT gateway hardware and enclosures',
                    'Die casting operations dashboard with live status and history',
                    'Die tracking module recording shots per die set',
                    'Shift production and downtime reporting automation'
                ],
                'inputs_needed' => 'Die casting machine make/controller, tonnage, available signal taps, furnace thermocouple types, and die identification numbering system.',
                'limitations' => 'The IoT system monitors and logs parameters; it does not replace foundry safety procedures, machine hydraulic controls, or emergency stop interlocks.',
                'faqs' => [
                    [
                        'q' => 'Can edge hardware survive high temperatures in die casting shops?',
                        'a' => 'Yes. We utilize industrial-grade IP65/IP67 rated gateways with extended operating temperature ratings (-20°C to +70°C) and isolated wiring.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'power-press-machine-iot' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'machine-iiot',
                'name' => 'Power Press Machine IoT Solution',
                'short_desc' => 'Monitors compatible mechanical, hydraulic, or pneumatic press status, stroke counts, downtime, and operating data.',
                'target_keyword' => 'power press machine IoT solution',
                'meta_title' => 'Power Press Machine IoT Solution | TC Smart Technology',
                'meta_description' => 'Real-time monitoring for power presses: stroke counts, SPM (strokes per minute), die maintenance, and downtime analysis.',
                'icon' => 'fa-compress-arrows-alt',
                'is_priority' => true,
                'problem' => 'Stamping and press shops struggle with unverified stroke counts, die wear tracking, excessive coil changeover downtime, and lack of shift productivity metrics.',
                'outcome' => 'Automated stroke counting, strokes-per-minute (SPM) telemetry, die changeover tracking, and downtime analysis across all stamping press lines.',
                'capabilities' => [
                    'Non-invasive stroke counting via rotary encoders or inductive proximity switches',
                    'Real-time strokes-per-minute (SPM) rate calculation and utilization analysis',
                    'Die life tracking based on verified stroke counts to plan sharpening',
                    'Unplanned stoppage recording (coil jamming, die adjustment, maintenance)',
                    'Integration with plant OEE dashboards and shift production summaries',
                    'Auditable production history for customer automotive component batches'
                ],
                'technical_approach' => 'Proximity sensors or existing cam switch signals feed into high-speed optocoupler inputs on the edge gateway, guaranteeing zero missed strokes even on rapid stamping presses exceeding 200 SPM.',
                'deliverables' => [
                    'Press stroke monitoring hardware and sensor brackets',
                    'Live press line dashboard showing SPM, count, and status',
                    'Die tool tracking log with maintenance thresholds',
                    'Shift performance reports in Excel/PDF formats'
                ],
                'inputs_needed' => 'Press type (mechanical/hydraulic), maximum strokes per minute, stroke detection sensor availability, and die tooling reference codes.',
                'limitations' => 'The IoT monitoring layer is strictly for data logging and reporting; it must NEVER interface with or bypass safety light curtains, dual-hand tie-down buttons, or clutch brakes.',
                'faqs' => [
                    [
                        'q' => 'Does this interfere with the safety light curtains or clutch controls?',
                        'a' => 'No. Our sensors and inputs are strictly isolated and monitor auxiliary status signals; we never touch safety-critical light curtains or clutch circuits.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'production-machine-iot-connectivity' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'machine-iiot',
                'name' => 'Production Machine IoT Connectivity',
                'short_desc' => 'Connects other compatible production assets—packaging, machining, assembly, utility systems—through approved signals and protocols.',
                'target_keyword' => 'production machine IoT connectivity',
                'meta_title' => 'Production Machine IoT Connectivity | TC Smart Technology',
                'meta_description' => 'Universal industrial machine connectivity: PLC protocols, digital I/O, sensors, gateways and centralized dashboard integration.',
                'icon' => 'fa-plug',
                'is_priority' => true,
                'problem' => 'Plants with mixed-generation machinery from diverse vendors suffer from fragmented data silos, making plant-wide efficiency comparison impossible.',
                'outcome' => 'A unified industrial IoT connectivity layer bringing legacy and modern assembly, packaging, and process equipment into one common data platform.',
                'capabilities' => [
                    'Protocol connectivity: Modbus RTU/TCP, Siemens S7, Ethernet/IP, OPC-UA, MQTT',
                    'Legacy machine retrofitting via digital current sensors, counters, and relays',
                    'Normalized tag architecture mapping diverse machines into uniform parameters',
                    'Edge data filtering, deadband calculation, and local buffering',
                    'Encrypted telemetry streaming to on-premises servers or private cloud platforms',
                    'Cross-line comparison of utilization, output rates, and energy intensity'
                ],
                'technical_approach' => 'We perform a site audit to catalogue available interfaces. Edge gateways normalize signals across multiple brands (Siemens, Mitsubishi, Omron, Schneider) into a standardized MQTT/REST data model.',
                'deliverables' => [
                    'Plant signal list and protocol mapping matrix',
                    'Pre-configured edge gateways with communication drivers',
                    'Unified machine status overview screen on the centralized dashboard',
                    'Standardized machine telemetry API for ERP/MES system integration'
                ],
                'inputs_needed' => 'Inventory of machines, controller models, communication ports, required telemetry tags, and network infrastructure details.',
                'limitations' => 'Feasibility depends on controller physical access, open communication ports, and customer authorization.',
                'faqs' => [
                    [
                        'q' => 'Can you connect 20-year-old machines without any communication port?',
                        'a' => 'Yes. By adding external cycle limit switches, current transformers, and tower lamp monitoring sensors, we capture operating state and production counts without altering the machine.'
                    ]
                ],
                'cta' => 'Discuss Your Machine Connectivity Requirement'
            ],

            'mold-management-solution' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'smart-manufacturing-oee',
                'name' => 'Mold Management Solution',
                'short_desc' => 'Tracks mold identity, machine allocation, shot and cycle history, maintenance schedules, repair logs, location, and status.',
                'target_keyword' => 'industrial mold management solution',
                'meta_title' => 'Mold Management Solution | TC Smart Technology',
                'meta_description' => 'Track tool and mold usage, shot accumulation, preventive maintenance, repair history and mold changeover analytics.',
                'icon' => 'fa-shapes',
                'is_priority' => true,
                'problem' => 'Expensive molds and dies are frequently lost, under-maintained, or run past their service limits, resulting in catastrophic tooling breakdown and high scrap rates.',
                'outcome' => 'Centralized, automated tracking of every mold’s shot history, active machine location, preventive maintenance schedule, and tooling repair logs.',
                'capabilities' => [
                    'Mold master directory with cavity counts, product codes, and design parameters',
                    'Identification capture via QR code, barcode, RFID, or touch-screen selection',
                    'Automated accumulation of production shots directly from machine cycle pulses',
                    'Configurable preventive maintenance alerts based on shot milestones',
                    'Toolroom repair records, cavity maintenance history, and polishing logs',
                    'Mold changeover duration analytics and setup time benchmarking'
                ],
                'technical_approach' => 'When a mold is mounted, the operator or RFID scanner registers its ID with the machine gateway. Production shots automatically increment the mold master record, triggering alerts when maintenance thresholds approach.',
                'deliverables' => [
                    'Mold management software module integrated with production dashboards',
                    'Scanner integration / QR tagging guidelines for shopfloor tooling',
                    'Maintenance trigger rules and email/SMS alert configuration',
                    'Downloadable mold lifecycle and maintenance history reports'
                ],
                'inputs_needed' => 'Mold inventory database, maintenance shot intervals per tool, product part numbers, and shopfloor identification method preferences.',
                'limitations' => 'Shot threshold limits are defined by customer tooling engineers; tool lifespan cannot be guaranteed by the tracking software.',
                'faqs' => [
                    [
                        'q' => 'How does the system record shots for a specific mold?',
                        'a' => 'When the mold is assigned to a press in the system, every validated machine cycle pulse automatically increments that specific mold’s total shot counter.'
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],

            'plant-energy-management' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'smart-manufacturing-oee',
                'name' => 'Plant Energy Management Solution',
                'short_desc' => 'Converts approved energy meter, power analyzer, and production data into electrical demand, load profile, and intensity insights.',
                'target_keyword' => 'plant energy management solution',
                'meta_title' => 'Plant Energy Management Solution | TC Smart Technology',
                'meta_description' => 'Industrial energy monitoring: sub-metering, peak demand tracking, specific energy consumption per product and power quality dashboards.',
                'icon' => 'fa-bolt',
                'is_priority' => true,
                'problem' => 'Plants face high electricity bills and penalty tariffs from unmanaged peak demand spikes, poor power factors, and inability to calculate specific energy cost per manufactured part.',
                'outcome' => 'Real-time visibility into plant-wide, department-wise, and machine-wise electrical parameters, power factor trends, and Specific Energy Consumption (kWh/unit).',
                'capabilities' => [
                    'Collection of electrical parameters: kWh, kW, kVA, power factor, voltage, current',
                    'RS-485 Modbus RTU integration with multi-function digital energy meters',
                    'Specific Energy Consumption (SEC) calculation: kWh consumed per good part produced',
                    'Maximum Demand (MD) tracking with proactive threshold alerts to prevent utility penalties',
                    'Departmental, feeder, and machine-level energy cost allocation',
                    'Automated energy audit reports and shift-wise consumption breakdown'
                ],
                'technical_approach' => 'Energy gateways poll sub-meters over daisy-chained RS-485 networks. Telemetry is correlated with simultaneous production counts to compute true energy intensity curves.',
                'deliverables' => [
                    'Energy monitoring dashboard with real-time load profiles and historical trends',
                    'Energy meter gateway integration and Modbus register mapping',
                    'Peak demand alert configuration and automated shift report generation',
                    'Energy intensity (kWh/unit) benchmarking screens'
                ],
                'inputs_needed' => 'Single Line Diagram (SLD), energy meter make/models, Modbus register manuals, utility contract maximum demand limits, and feeder layout.',
                'limitations' => 'The system provides visibility and analytical data; physical energy reductions require operational and equipment changes. Guaranteed financial savings are not promised.',
                'faqs' => [
                    [
                        'q' => 'Can this help prevent peak demand penalty charges from utilities?',
                        'a' => 'Yes. The system continuously tracks the sliding demand window and triggers visual or SMS alerts when electrical demand approaches contract penalty thresholds.'
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],

            'centralized-iot-dashboard' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'data-monitoring',
                'name' => 'Centralized IoT Dashboard',
                'short_desc' => 'Consolidates live machine, sensor, environmental, event, and device status telemetry into one responsive, role-based web interface.',
                'target_keyword' => 'centralized industrial IoT dashboard',
                'meta_title' => 'Centralized IoT Dashboard | TC Smart Technology',
                'meta_description' => 'Custom industrial IoT web dashboards: real-time telemetry, historical trends, threshold alerts and role-based access control.',
                'icon' => 'fa-tachometer-alt',
                'is_priority' => true,
                'problem' => 'Operations teams waste hours switching between disjointed software portals, spreadsheets, and proprietary vendor screens to monitor facility data.',
                'outcome' => 'A single, responsive web dashboard consolidating machine states, sensor measurements, historical trends, alerts, and user permissions across the plant.',
                'capabilities' => [
                    'Responsive web interface accessible on desktop workstations, tablets, and shopfloor TVs',
                    'Real-time streaming widgets using WebSockets / MQTT over WebSockets',
                    'Interactive historical trend charts with time range zoom and comparison overlays',
                    'Configurable alert banners with acknowledgment workflows and escalation trees',
                    'Role-based access control (Operator, Supervisor, Plant Manager, Administrator)',
                    'Data export in CSV, Excel, and automated scheduled PDF reports'
                ],
                'technical_approach' => 'Built with high-performance modern web technologies and optimized time-series database backends. Interfaces are clean, high-contrast, and tailored for rapid operational decision making.',
                'deliverables' => [
                    'Deployed centralized web dashboard application',
                    'User role and permission configuration',
                    'Configured widgets, trend views, and threshold alarms',
                    'Admin configuration manual and data export procedures'
                ],
                'inputs_needed' => 'List of data sources, required dashboard screens/widgets, user permission tiers, and hosting preference (on-premise server vs cloud).',
                'limitations' => 'Requires network connectivity between edge devices and the dashboard hosting server.',
                'faqs' => [
                    [
                        'q' => 'Can the dashboard be hosted on our local factory server without internet?',
                        'a' => 'Yes. We deploy fully on-premises local server installations within your private plant LAN, ensuring complete data sovereignty without external internet dependency.'
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],

            'multi-location-monitoring' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'data-monitoring',
                'name' => 'Multi-Location Monitoring',
                'short_desc' => 'Provides controlled visibility across geographically distributed rooms, plants, warehouses, or cold-chain facilities.',
                'target_keyword' => 'multi-location industrial monitoring',
                'meta_title' => 'Multi-Location IoT Monitoring | TC Smart Technology',
                'meta_description' => 'Enterprise IoT monitoring across multiple factories, warehouses and cold storage sites with unified dashboards and role permissions.',
                'icon' => 'fa-globe-americas',
                'is_priority' => true,
                'problem' => 'Enterprises operating multiple manufacturing plants, cold stores, or warehouses lack consolidated benchmarking and must manage each site as an isolated silo.',
                'outcome' => 'A hierarchical enterprise IoT portal displaying multi-site comparisons, centralized alarm escalation, and regional production and environmental performance.',
                'capabilities' => [
                    'Hierarchical site tree: Organization > Region > Plant / Facility > Line > Asset',
                    'Cross-location benchmarking of OEE, uptime, temperature compliance, and energy',
                    'Centralized alert routing: local alerts to site staff, unresolved criticals to headquarters',
                    'Time-zone normalization and uniform reporting schedules across regions',
                    'Granular permissions restricting site staff to their facility while giving executive corporate access',
                    'Secure VPN / encrypted TLS data pipelines connecting distributed edge gateways'
                ],
                'technical_approach' => 'Edge gateways at each location transmit compressed, encrypted telemetry over TLS to a centralized enterprise server. Database schemas support tenant and facility scoping with high availability.',
                'deliverables' => [
                    'Multi-site enterprise web portal configuration',
                    'Gateway connectivity profiles for each regional location',
                    'Enterprise user role hierarchy and alarm escalation matrix',
                    'Consolidated cross-site executive reporting templates'
                ],
                'inputs_needed' => 'Number of facilities, site names/locations, network connection types at each site, and organizational reporting hierarchy.',
                'limitations' => 'Dependent on stable internet or cellular connections at each remote location for real-time synchronization.',
                'faqs' => [
                    [
                        'q' => 'Can local operators only see their own plant while HQ sees all plants?',
                        'a' => 'Yes. Role-based access control enforces site-level boundaries for plant teams while allowing regional and executive users to view consolidated data.'
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],

            'industrial-data-logging' => [
                'category_slug' => 'industrial-iot-solutions',
                'subcategory_slug' => 'data-monitoring',
                'name' => 'Industrial Data Logging',
                'short_desc' => 'Collects and stores time-stamped machine, process, test, and environmental data for compliance, analysis, and traceability.',
                'target_keyword' => 'industrial data logging services',
                'meta_title' => 'Industrial Data Logging Services | TC Smart Technology',
                'meta_description' => 'Time-stamped industrial data logging, PLC tag collection, local buffer storage, SQL/time-series databases and audit-ready exports.',
                'icon' => 'fa-database',
                'is_priority' => true,
                'problem' => 'Critical production parameters, autoclave temperatures, and test results are lost or unrecorded, failing regulatory audits and customer quality inquiries.',
                'outcome' => 'Continuous, tamper-evident, time-stamped data acquisition storing machine and process parameters in high-reliability databases with automated archival.',
                'capabilities' => [
                    'High-frequency time-stamped logging from PLCs, controllers, and smart instruments',
                    'Local edge buffering in non-volatile memory to prevent gaps during network downtime',
                    'Time-series and relational database storage optimized for millions of records',
                    'Event-driven logging triggered by alarms, cycle pulses, or parameter thresholds',
                    'Automated database backups, data retention rules, and scheduled table pruning',
                    'Audit-supporting exports in CSV, Excel, and digitally verifiable PDF formats'
                ],
                'technical_approach' => 'We configure edge loggers with accurate NTP/RTC time synchronization. Data is buffered locally in SQLite/Flash and pushed via bulk transactions into PostgreSQL or InfluxDB time-series tables.',
                'deliverables' => [
                    'Data logger hardware / service installation and tag mapping',
                    'Optimized database schema and retention policy configuration',
                    'Automated backup routines and data integrity verification',
                    'Export utilities and historical query tools'
                ],
                'inputs_needed' => 'List of data tags, required sampling frequency (e.g. 1 Hz, 10 Hz), retention duration (e.g. 1 year, 5 years), and query performance expectations.',
                'limitations' => 'Data storage capacity depends on provisioned drive hardware and agreed backup retention policies.',
                'faqs' => [
                    [
                        'q' => 'How long can historical machine data be retained?',
                        'a' => 'Data retention duration is fully configurable—from months to multiple years—depending on provisioned server storage and compliance regulations.'
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],
        ];
    }
}
