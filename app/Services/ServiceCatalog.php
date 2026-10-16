<?php

namespace App\Services;

class ServiceCatalog
{
    public static function getCategories(): array
    {
        return [
            'embedded-design-development' => [
                'name' => 'Embedded Systems Design and Development Services',
                'short_name' => 'Embedded Design & Development',
                'slug' => 'embedded-design-development',
                'target_keyword' => 'embedded systems design and development services',
                'ai_hook' => 'End-to-end embedded product engineering covering electronics, firmware, connected-device interfaces, prototypes, verification, upgrades and production readiness.',
                'meta_title' => 'Embedded Systems Design Services | TC Smart',
                'meta_description' => 'Design embedded hardware, firmware, PCBs and connected devices with prototype, testing and production engineering support.',
                'icon' => 'fa-microchip',
                'badge' => 'Priority Portfolio',
                'overview' => 'TC Smart Technology provides custom Embedded Design & Development services for industrial, IoT, monitoring, automation and smart electronic product applications. We help businesses convert product concepts and technical requirements into functional embedded systems with maintainable firmware, robust PCBs, and production readiness.',
                'subcategories' => [
                    'hardware-pcb' => [
                        'name' => 'Embedded Hardware and PCB Engineering',
                        'slug' => 'hardware-pcb',
                        'services' => ['embedded-hardware-design', 'pcb-design-layout', 'microcontroller-product-development']
                    ],
                    'software-platforms' => [
                        'name' => 'Embedded Software and Platform Development',
                        'slug' => 'software-platforms',
                        'services' => ['firmware-development', 'embedded-linux-rtos']
                    ],
                    'iot-interfaces' => [
                        'name' => 'IoT Device and Interface Engineering',
                        'slug' => 'iot-interfaces',
                        'services' => ['iot-device-development', 'sensor-data-acquisition-integration', 'communication-protocol-integration']
                    ],
                    'product-lifecycle' => [
                        'name' => 'Prototype, Testing and Product Lifecycle Support',
                        'slug' => 'product-lifecycle',
                        'services' => ['prototype-development', 'embedded-product-testing', 'product-troubleshooting-upgrade', 'production-engineering-support']
                    ]
                ],
                'cta' => 'Start Your Embedded Project'
            ],
            'industrial-iot-solutions' => [
                'name' => 'Industrial IoT Solutions',
                'short_name' => 'Industrial IoT Solutions',
                'slug' => 'industrial-iot-solutions',
                'target_keyword' => 'Industrial IoT solutions',
                'ai_hook' => 'Provides one approved monitoring product plus data logging, dashboards, smart manufacturing, OEE and production-machine IIoT solutions.',
                'meta_title' => 'Industrial IoT Solutions | TC Smart Technology',
                'meta_description' => 'Connect sensors and machines to monitoring, dashboards, OEE, energy analysis, alerts and industrial reports.',
                'icon' => 'fa-network-wired',
                'badge' => 'Primary Focus',
                'overview' => 'TC Smart Technology provides Industrial IoT solutions that connect approved sensors, meters, controllers and production machines to secure data collection, dashboards, alerts, reports, OEE analysis and operational workflows. The category contains one monitoring product with 5 approved configurations and eleven project-based Industrial IoT services.',
                'subcategories' => [
                    'data-monitoring' => [
                        'name' => 'Industrial Data Acquisition and IoT Monitoring',
                        'slug' => 'data-monitoring',
                        'services' => ['industrial-data-logging', 'centralized-iot-dashboard', 'multi-location-monitoring']
                    ],
                    'smart-manufacturing-oee' => [
                        'name' => 'Smart Manufacturing and Machine IIoT Solutions',
                        'slug' => 'smart-manufacturing-oee',
                        'services' => ['smart-manufacturing-dashboard-oee', 'plant-energy-management', 'mold-management-solution']
                    ],
                    'machine-iiot' => [
                        'name' => 'Production Machine IIoT Solutions',
                        'slug' => 'machine-iiot',
                        'services' => ['injection-molding-machine-iiot', 'injection-molding-auto-purging', 'die-casting-machine-iot', 'power-press-machine-iot', 'production-machine-iot-connectivity']
                    ]
                ],
                'cta' => 'Discuss Your Industrial IoT Requirement'
            ],
            'industrial-automation' => [
                'name' => 'Industrial Automation Services',
                'short_name' => 'Industrial Automation',
                'slug' => 'industrial-automation',
                'target_keyword' => 'industrial automation services',
                'ai_hook' => 'Controls machines, integrates robotics, automates testing and maintains traceable production quality workflows.',
                'meta_title' => 'Industrial Automation Services | TC Smart',
                'meta_description' => 'Integrate PLC, HMI, VFD, robotics, automated testing and production traceability for controlled industrial workflows.',
                'icon' => 'fa-robot',
                'badge' => 'Core Capability',
                'overview' => 'TC Smart Technology delivers Industrial Automation services to coordinate machine control, automated test benches, robotics cells, and plant-floor traceability. Our solutions link PLC, HMI, VFD drives and NI LabVIEW/TestStand platforms with verifiable pass/fail reporting.',
                'subcategories' => [
                    'control-robotics' => [
                        'name' => 'Industrial Control and Robotics Integration',
                        'slug' => 'control-robotics',
                        'services' => ['plc-hmi-vfd-integration', 'industrial-robotics-integration']
                    ],
                    'test-quality' => [
                        'name' => 'Automated Test and Production Quality Systems',
                        'slug' => 'test-quality',
                        'services' => ['labview-automation', 'teststand-automation', 'test-bench-end-of-line-testing-automation', 'production-traceability']
                    ]
                ],
                'cta' => 'Discuss Your Test & Automation Requirement'
            ],
            'ai-solutions-custom-ai-agents' => [
                'name' => 'Custom AI Agent Development Services',
                'short_name' => 'Custom AI Agents',
                'slug' => 'ai-solutions-custom-ai-agents',
                'target_keyword' => 'custom AI agent development services',
                'ai_hook' => 'Controlled AI agents for marketing, search visibility, knowledge retrieval, lead workflows, messaging, email, voice and productivity with permissions and human oversight.',
                'meta_title' => 'Custom AI Agent Development Services | TC Smart',
                'meta_description' => 'Build governed AI agents for marketing, knowledge, leads, messaging, email, voice and productivity workflows.',
                'icon' => 'fa-brain',
                'badge' => '11 Approved Agents',
                'overview' => 'TC Smart Technology develops configurable AI agents that help businesses prepare content, organize information, manage enquiries, support customer communication and automate approved repetitive workflows. Every agent operates within defined boundaries, with strict permissions, access controls, and human-in-the-loop oversight.',
                'subcategories' => [
                    'marketing-search' => [
                        'name' => 'Marketing and Search Growth AI Agents',
                        'slug' => 'marketing-search',
                        'services' => ['marketing-ai-agent', 'seo-ai-agent', 'website-audit-ai-agent', 'google-business-profile-ai-agent']
                    ],
                    'knowledge-productivity' => [
                        'name' => 'Knowledge and Productivity AI Agents',
                        'slug' => 'knowledge-productivity',
                        'services' => ['rag-ai-agent', 'personal-ai-assistant-agent']
                    ],
                    'lead-outreach' => [
                        'name' => 'Lead Generation and Professional Outreach AI Agents',
                        'slug' => 'lead-outreach',
                        'services' => ['lead-generation-ai-agent', 'linkedin-ai-agent']
                    ],
                    'customer-communication' => [
                        'name' => 'Customer Communication AI Agents',
                        'slug' => 'customer-communication',
                        'services' => ['whatsapp-ai-agent', 'gmail-ai-agent', 'voice-calling-ai-agent']
                    ]
                ],
                'cta' => 'Discuss Your AI Agent Requirement'
            ]
        ];
    }

    public static function getServices(): array
    {
        return array_merge(
            Catalog\EmbeddedServices::all(),
            Catalog\IiotServices::all(),
            Catalog\AutomationServices::all(),
            Catalog\AiAgentServices::all()
        );
    }

    public static function getCategory(string $slug): ?array
    {
        $categories = self::getCategories();
        return $categories[$slug] ?? null;
    }

    public static function getService(string $slug): ?array
    {
        $services = self::getServices();
        return $services[$slug] ?? null;
    }

    public static function getServicesByCategory(string $categorySlug): array
    {
        $all = self::getServices();
        $filtered = [];
        foreach ($all as $slug => $service) {
            if ($service['category_slug'] === $categorySlug) {
                $filtered[$slug] = $service;
            }
        }
        return $filtered;
    }

    public static function getPriorityServices(): array
    {
        $all = self::getServices();
        $filtered = [];
        foreach ($all as $slug => $service) {
            if (!empty($service['is_priority'])) {
                $filtered[$slug] = $service;
            }
        }
        return $filtered;
    }
}
