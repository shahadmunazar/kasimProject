<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        // Static Routes
        $routes = [
            'home.index',
            'about_us.index',
            'services.index',
            'contact.index',
            'blogs.index',
            'appointment.index',
            // Add all static service routes here
            'services.embedded_systems',
            'services.embedded.hw_firmware',
            'services.embedded.pcb_power',
            'services.embedded.security',
            'services.embedded.iot_cloud',
            'services.embedded.medical_rd',
            'services.embedded.testing',
            'services.embedded_software.ux_ui_development_new',
            'services.embedded_software.iotdevice_integration_new',
            'services.embedded_software.mental_device_development_new',
            'services.embedded_software.automated_testing_development_new',
            'services.integration_systems',
            'services.industrial_automation',
            'services.software_development',
            'services.hvac_solutions',
            'services.embedded_hardware.plc_scada_hmi_programming',
            'services.embedded_hardware.robotics_integration',
            'services.embedded_hardware.machine_vision',
            'services.embedded_hardware.motion_control',
            'services.embedded_hardware.iiot_industry4',
            'services.embedded_hardware.switchgear_panel_design',
            'services.embedded_hardware.high_voltage_testing',
            'services.embedded_hardware.test_bench_design',
            'services.industrial_standard_machine',
            'services.industrial.cnc_vmc',
            'services.industrial.injection_molding',
            'services.industrial.laser_cutting',
            'services.industrial.robotic_welding',
            'services.industrial.hydraulic_servo_press',
            'services.industrial.lathe_turning',
            'services.industrial.smart_packaging',
            'services.industrial.sheet_metal',
            'services.industrial.battery_ev',
            'services.embedded_hardware.circuit_designing',
            'services.embedded_hardware.pcb_designing',
            'services.embedded_hardware.mounting_pcb',
            'services.biomedical.orthopaedic_heat_pad',
            'services.biomedical.electric_body_massager',
            'services.hvac.centralized_hvac',
            'services.hvac.split_ac',
            'services.hvac.smart_climate',
            'services.hvac.iaq_enhancement',
            'services.hvac.system_optimization',
            'services.hvac.installation',
            'services.hvac.maintenance',
            'services.hvac.repair',
            'services.hvac.heating_cooling',
            'services.hvac.ventilation',
            'services.hvac.energy',
            'services.software',
            'services.software.ai_machinelearning_solutions',
            'services.software.smart_automation',
            'services.software.blockchain_platforms',
            'services.software.mobile_application_development',
            'services.software.domain_based_solutions',
            'services.software.manpower_providing_services',
            'services.software.custom_erp_development',
            'services.software.mlm_network_software',
        ];

        // Fetch active blogs
        $blogs = \App\Models\Blog::where('status', 1)->get();

        return response()->view('sitemap.index', compact('routes', 'blogs'))->header('Content-Type', 'text/xml');
    }
}
