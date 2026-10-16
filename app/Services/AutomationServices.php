<?php

namespace App\Services;

class AutomationServices
{
    public static function all(): array
    {
        return [
            'plc-hmi-vfd-integration' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'control-robotics',
                'name' => 'PLC, HMI and VFD Programming and Integration',
                'short_desc' => 'Coordinates machine logic, operator interfaces, and motor-drive control within coordinated, reliable automation solutions.',
                'target_keyword' => 'PLC HMI and VFD programming and integration',
                'meta_title' => 'PLC, HMI & VFD Programming & Integration | TC Smart',
                'meta_description' => 'Industrial automation: Siemens, Allen Bradley, Mitsubishi PLC programming, intuitive HMI touchscreens and VFD motor control.',
                'icon' => 'fa-cogs',
                'is_priority' => false,
                'problem' => 'Machines with poorly structured PLC code, confusing HMI graphics, and misconfigured VFD motor drives suffer from frequent trips, slow cycle times, and dangerous operator errors.',
                'outcome' => 'A harmonized control architecture featuring structured ladder/structured text logic, intuitive touchscreen operation, and precise VFD speed and torque regulation.',
                'capabilities' => [
                    'PLC logic development: IEC 61131-3 languages (Ladder Logic, Structured Text, Function Block)',
                    'Supported PLC platforms: Siemens (TIA Portal S7-1200/1500), Allen-Bradley, Mitsubishi, Delta, Schneider',
                    'HMI screen design: ergonomic layouts, clear status displays, alarm logs, and recipe handling',
                    'VFD parameterization: motor tuning, acceleration/deceleration ramps, braking resistors, Modbus/Profibus control',
                    'Safety interlock integration: emergency stop circuits, guard switches, and fault isolation',
                    'On-site or remote commissioning, machine dry runs, and cycle optimization'
                ],
                'technical_approach' => 'We start with an I/O mapping schedule and sequential function chart (SFC). Code is structured into modular blocks for manual, auto, alarm, and recipe functions, thoroughly tested during simulated dry runs.',
                'deliverables' => [
                    'Fully commented PLC program files and source code',
                    'HMI runtime project files and screen graphics',
                    'VFD parameter backup sheets and motor wiring schematics',
                    'I/O connection schedule, alarm manual, and operator guide'
                ],
                'inputs_needed' => 'Machine mechanical sequence of operations, motor nameplate ratings, electrical control schematics, and preferred controller brand.',
                'limitations' => 'High-voltage electrical cabinet fabrication and physical field wiring must be performed by certified licensed electricians under customer supervision.',
                'faqs' => [
                    [
                        'q' => 'Which PLC and HMI brands do you support?',
                        'a' => 'We support major industrial brands including Siemens, Allen-Bradley (Rockwell), Mitsubishi, Delta, Omron, and Schneider Electric.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],

            'industrial-robotics-integration' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'control-robotics',
                'name' => 'Industrial Robotics Integration',
                'short_desc' => 'Integrates compatible industrial robots with machine controls, sensors, end-effectors, and safety guarding systems.',
                'target_keyword' => 'industrial robotics integration services',
                'meta_title' => 'Industrial Robotics Integration | TC Smart Technology',
                'meta_description' => 'Robotics integration: pick-and-place, machine tending, palletizing and inspection cells integrated with PLCs and safety systems.',
                'icon' => 'fa-robot',
                'is_priority' => false,
                'problem' => 'Repetitive machine loading, parts sorting, and high-speed packaging strain manual labor and result in inconsistent cycle pacing.',
                'outcome' => 'Seamless robotic automation cells integrated with upstream and downstream conveyors, machine tools, and safety interlocks for repeatable production pacing.',
                'capabilities' => [
                    'Robot cell applications: machine tending, pick-and-place, sorting, stacking, dispensing',
                    'Robot communication mapping with central cell PLC over industrial Ethernet',
                    'End-of-arm tooling (EOAT) pneumatic and vacuum gripper coordination',
                    'Safety zone configuration: safety scanners, physical fencing, interlocked gates',
                    'Vision-guided robotics integration for random orientation pick-and-place',
                    'Robot teaching, path optimization, trajectory smoothing, and cycle minimization'
                ],
                'technical_approach' => 'We analyze payload, reach, and cycle time demands. Trajectories are simulated to avoid collisions and singularities before downloading code to the robot controller and commissioning the cell.',
                'deliverables' => [
                    'Robot motion program files and point coordinate databases',
                    'PLC-to-Robot handshaking and safety interface logic',
                    'Cell operator manual, error recovery instructions, and teaching guidelines',
                    'Cycle time validation and cell acceptance run report'
                ],
                'inputs_needed' => 'Part dimensions, payload weights, required cycle times, machine door opening constraints, and cell physical layout.',
                'limitations' => 'TC Smart Technology integrates compatible third-party industrial robots (e.g. FANUC, ABB, KUKA, Universal Robots); we do not manufacture the robot arms themselves. Safety risk assessments must be signed off by site safety officers.',
                'faqs' => [
                    [
                        'q' => 'Does TC Smart Technology manufacture the robot arms?',
                        'a' => 'No. We provide expert engineering integration of proven industrial robot arms from leading manufacturers such as FANUC, ABB, KUKA, and Universal Robots.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],

            'labview-automation' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'test-quality',
                'name' => 'LabVIEW Automation',
                'short_desc' => 'Automates high-speed measurement, multi-channel data acquisition, instrument control, visualization, and automated test reporting.',
                'target_keyword' => 'LabVIEW automation development services',
                'meta_title' => 'LabVIEW Automation Services | TC Smart Technology',
                'meta_description' => 'Custom NI LabVIEW software development: DAQmx, instrument control (GPIB, VISA), automated test stations and pass/fail reporting.',
                'icon' => 'fa-chart-pie',
                'is_priority' => false,
                'problem' => 'Manual bench instrument testing is slow, prone to transcription errors, and incapable of capturing transient electrical or mechanical anomalies.',
                'outcome' => 'Automated National Instruments LabVIEW software coordinating multi-channel data acquisition, automated instrument stimulus, limit checking, and instant report generation.',
                'capabilities' => [
                    'National Instruments DAQmx hardware integration (cDAQ, PXI, USB-DAQ)',
                    'Bench instrument communication via VISA (GPIB, RS-232, USB, Ethernet/LXI)',
                    'Custom, intuitive graphical user interfaces for laboratory and production technicians',
                    'Real-time waveform acquisition, FFT spectral analysis, and mathematical filtering',
                    'Automated limit checking with immediate visual and audible pass/fail indicators',
                    'Generation of audit-supporting PDF, Excel, and TDMS test report files'
                ],
                'technical_approach' => 'Using robust LabVIEW design patterns (Producer-Consumer, Queued Message Handler), we decouple high-speed hardware acquisition from user interface rendering, ensuring zero dropped samples.',
                'deliverables' => [
                    'Complete LabVIEW source code project (.lvproj) and executable deployment installers',
                    'Instrument driver VIs and configuration files',
                    'Test station operator handbook with calibration guidance',
                    'System architecture documentation and data logging specifications'
                ],
                'inputs_needed' => 'List of test instruments (make/model), required measurement channels, sampling frequencies, pass/fail threshold limits, and report format requirements.',
                'limitations' => 'National Instruments software licensing (LabVIEW Development System, Run-Time) is customer-provided or billed according to NI licensing terms.',
                'faqs' => [
                    [
                        'q' => 'Can you integrate existing third-party power supplies and oscilloscopes?',
                        'a' => 'Yes. We integrate instruments from Keysight, Tektronix, Rohde & Schwarz, Chroma, and others using standard IVI and SCPI VISA drivers.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],

            'teststand-automation' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'test-quality',
                'name' => 'TestStand Automation',
                'short_desc' => 'Builds modular, repeatable, and maintainable product-test sequencing, result databases, and high-throughput production station workflows.',
                'target_keyword' => 'NI TestStand automation services',
                'meta_title' => 'NI TestStand Automation Services | TC Smart Technology',
                'meta_description' => 'Production test sequence architecture with National Instruments TestStand: parallel testing, barcode tracking and database reporting.',
                'icon' => 'fa-list-check',
                'is_priority' => false,
                'problem' => 'Production test lines with hard-coded test scripts are rigid, difficult to modify when product revisions occur, and fail to track serial-number yields.',
                'outcome' => 'A scalable NI TestStand sequence architecture allowing engineers to adjust test limits and steps modularly, with parallel test execution and database logging.',
                'capabilities' => [
                    'Test sequence development for electronic, electromechanical, and automotive modules',
                    'Parallel and batch testing execution models for high manufacturing throughput',
                    'Integration of code modules written in LabVIEW, C/C++, .NET, and Python',
                    'Barcode/QR scanner integration for unit serial number tracking',
                    'Automatic pass/fail logging into corporate SQL / Oracle manufacturing databases',
                    'Customized operator interface (OI) with role-based engineering password protection'
                ],
                'technical_approach' => 'We separate test sequence logic from hardware measurement code. Process models handle serial scanning, result logging, and station calibration, while sequence files define product-specific test steps.',
                'deliverables' => [
                    'TestStand sequence files (.seq) and custom Process Model configuration',
                    'Compiled measurement code modules and drivers',
                    'Database logging configuration scripts (SQL schema mapping)',
                    'TestStand station deployment installer and administrator manual'
                ],
                'inputs_needed' => 'Product test specification, required test sequence steps, acceptable upper/lower limits, barcode serial format, and corporate database connection parameters.',
                'limitations' => 'NI TestStand deployment licenses are required on target production test computers and are customer-provided.',
                'faqs' => [
                    [
                        'q' => 'Can non-programmers modify test limits in TestStand?',
                        'a' => 'Yes. Authorized test engineers can adjust parameter limits and step sequences directly in sequence files or external configuration spreadsheets without recompiling application code.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],

            'test-bench-end-of-line-testing-automation' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'test-quality',
                'name' => 'Test Bench and End-of-Line Testing Automation',
                'short_desc' => 'Automates production engineering verification and finished-product inspection before packaging with traceable pass/fail records.',
                'target_keyword' => 'test bench and end of line testing automation',
                'meta_title' => 'End of Line (EOL) Testing Automation | TC Smart Technology',
                'meta_description' => 'Automated EOL test benches: electrical safety, functional validation, pneumatic fixtures and traceable pass/fail quality records.',
                'icon' => 'fa-clipboard-check',
                'is_priority' => false,
                'problem' => 'Defective products escaping to end customers cause warranty claims, brand damage, and expensive field recalls.',
                'outcome' => 'Turnkey End-of-Line (EOL) test stations performing 100% automated functional verification with pneumatic fixtures, safety interlocks, and pass/fail barcode labeling.',
                'capabilities' => [
                    'Full functional testing of finished electronic, automotive, and appliance assemblies',
                    'Electrical tests: hipot, insulation resistance, continuity, active current draw, voltage',
                    'Pneumatic and mechanical clamping fixtures with quick-change tooling inserts',
                    'Communication verification: flashing final firmware, verifying CAN/LIN/Ethernet health',
                    'Golden sample verification and daily station calibration verification routines',
                    'Automated barcode printing of pass labels and rejection chute / bin locking'
                ],
                'technical_approach' => 'The EOL station clamps the device under test (DUT) with safety optical curtains engaged. Stimulus is applied, measurements are captured and compared against limits, and results are serialized to the database before the clamp releases.',
                'deliverables' => [
                    'Integrated EOL test bench system software and fixture controls',
                    'Fixture pneumatic and electrical wiring documentation',
                    'Pass/fail evaluation logic and database logging setup',
                    'Station calibration and golden sample verification handbook'
                ],
                'inputs_needed' => 'Finished product samples, complete functional test specifications, required cycle time per test, safety standards, and labeling requirements.',
                'limitations' => 'Physical fabrication of heavy structural steel bench frames and specialized test fixture machining can be coordinated with mechanical partners or provided by the customer.',
                'faqs' => [
                    [
                        'q' => 'How does the test bench prevent defective units from being packed?',
                        'a' => 'The bench uses automated interlocking: pass labels are printed only on verified pass results, and failed units trigger a locked quarantine bin or audible alarm requiring supervisor clearance.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],

            'production-traceability' => [
                'category_slug' => 'industrial-automation',
                'subcategory_slug' => 'test-quality',
                'name' => 'Production Traceability Solutions',
                'short_desc' => 'Records product identity, process stages, test results, operator inputs, rework history, and production status.',
                'target_keyword' => 'production traceability solutions',
                'meta_title' => 'Production Traceability Solutions | TC Smart Technology',
                'meta_description' => 'Traceability for manufacturing: 1D/2D barcode scanning, station interlocks, component genealogy and digital production records.',
                'icon' => 'fa-barcode',
                'is_priority' => false,
                'problem' => 'When a component defect occurs, manufacturers cannot pinpoint exactly which serialized batches are affected, forcing costly blanket recalls.',
                'outcome' => 'Complete station-by-station digital genealogy recording every serialized part’s assembly timestamp, operator ID, test values, and component batch references.',
                'capabilities' => [
                    '1D barcode, 2D DataMatrix, and QR-code scanner integration across all stations',
                    'Station interlocking: prevents an operator from processing a unit if previous stations failed',
                    'Component genealogy tracking (e.g., linking battery cell lot number to final pack serial)',
                    'Rework station logging with controlled repair authorization workflows',
                    'Searchable genealogy queries by serial number, date range, or component batch',
                    'Audit-ready electronic records complying with automotive and medical traceability standards'
                ],
                'technical_approach' => 'Station clients query a central traceability database before allowing a fixture to clamp. Only units with validated "PASS" status from prior operations can proceed, enforcing foolproof line sequencing.',
                'deliverables' => [
                    'Station traceability client software and scanner driver configuration',
                    'Central traceability database schema and indexing rules',
                    'Supervisor genealogy search and audit report web interface',
                    'Line sequencing interlock validation report'
                ],
                'inputs_needed' => 'Station routing sequence, serial number format, barcode scanner hardware models, and corporate database connection parameters.',
                'limitations' => 'Data retention and storage depends on provisioned database server infrastructure; physical barcode printing equipment is customer-supplied.',
                'faqs' => [
                    [
                        'q' => 'Can this prevent an operator from skipping an inspection station?',
                        'a' => 'Yes. The system enforces strict line interlocking: if a unit has not passed inspection at Station A, Station B will refuse to activate and alert the operator.'
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],
        ];
    }
}
