<?php

namespace App\Services;

use App\Models\Category;
use App\Models\ProductModel;
use App\Models\Product;

class FlagshipProductService
{
    public static function ensureIndustrialIotMonitoringProduct(): Product
    {
        $category = Category::firstOrCreate(
            ['slug' => 'industrial-iot-solutions'],
            [
                'name' => 'Industrial IoT Solutions',
                'is_active' => 1,
                'meta_title' => 'Industrial IoT Solutions | TC Smart Technology',
                'meta_description' => 'Industrial IoT monitoring devices, dashboards, edge sensor integration, and predictive maintenance solutions.'
            ]
        );

        $model = ProductModel::firstOrCreate(
            ['slug' => 'industrial-iot-monitoring-product'],
            [
                'category_id' => $category->id,
                'name' => 'Industrial IoT Monitoring Product',
                'is_active' => 1,
                'meta_title' => 'Industrial IoT Monitoring Product | TC Smart Technology',
                'meta_description' => 'Industrial IoT monitoring device with multi-sensor telemetry, temperature, humidity, AQI, door, and power status.'
            ]
        );

        $product = Product::where('slug', 'industrial-iot-monitoring-product')->first();
        if (!$product) {
            $product = Product::create([
                'category_id' => $category->id,
                'product_model_id' => $model->id,
                'name' => 'Industrial IoT Monitoring Product',
                'slug' => 'industrial-iot-monitoring-product',
                'sku' => 'TC-INDUSTRI-006',
                'price' => null,
                'delivery_charge' => 0.00,
                'offer_price' => null,
                'cost_price' => 0.00,
                'stock_quantity' => 10,
                'low_stock_threshold' => 5,
                'track_inventory' => 1,
                'stock_status' => 'in_stock',
                'is_active' => 1,
                'meta_title' => 'Industrial IoT Monitoring Product | TC Smart',
                'meta_description' => 'Monitor temperature, humidity, AQI, door and power status with dashboards, alerts, trends and scheduled reports.',
                'description' => self::getDescriptionHtml(),
                'likes' => 0
            ]);
        } else {
            $updated = false;
            if (!$product->is_active) {
                $product->is_active = 1;
                $updated = true;
            }
            if (!$product->description || strlen($product->description) < 50) {
                $product->description = self::getDescriptionHtml();
                $updated = true;
            }
            if ($updated) {
                $product->save();
            }
        }

        return $product;
    }

    public static function getDescriptionHtml(): string
    {
        return '<div class="monitoring-product-spec">
  <div class="mb-4">
    <span class="badge bg-primary px-3 py-2 text-uppercase fw-semibold mb-2" style="letter-spacing:1px;">Approved Industrial Product</span>
    <h3 class="fw-bold text-dark mt-1">Industrial IoT Monitoring Product</h3>
    <p class="lead text-secondary" style="font-size:1.1rem; line-height:1.7;">
      TC Smart Technology offers one Industrial IoT monitoring product for collecting, transmitting, storing, visualizing and reporting approved environmental and facility data. Depending on the approved deployment, devices send time-stamped telemetry to a local server, customer-hosted infrastructure or cloud platform for live readings, historical trends, threshold events, door-open duration, power-state history, device status, multi-location views and scheduled reports.
    </p>
  </div>

  <div class="card border-0 shadow-sm rounded-3 mb-4" style="background:#f8fafc; border-left: 4px solid #0ea5e9 !important;">
    <div class="card-body p-4">
      <h5 class="fw-bold text-dark mb-3"><i class="fa fa-sliders-h text-primary me-2"></i>Exactly Five Approved Product Configurations</h5>
      <p class="small text-muted mb-3">This product is available exclusively in the following five verified configurations. Each deployment requires project-specific verification of sensors, installation environment, connectivity, calibration, dashboards and alerts.</p>
      
      <div class="row g-3">
        <div class="col-md-6">
          <div class="p-3 bg-white rounded-3 border h-100 shadow-sm">
            <div class="d-flex align-items-center mb-2">
              <span class="badge bg-primary me-2">Config 01</span>
              <h6 class="fw-bold text-dark mb-0">Temperature Monitoring</h6>
            </div>
            <p class="small text-muted mb-0">Monitors temperature using a suitable ambient, probe, contact, surface or process-temperature sensor, with current readings, history, thresholds, alerts, device status and reports.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-white rounded-3 border h-100 shadow-sm">
            <div class="d-flex align-items-center mb-2">
              <span class="badge bg-primary me-2">Config 02</span>
              <h6 class="fw-bold text-dark mb-0">Temperature and Humidity Monitoring Solution</h6>
            </div>
            <p class="small text-muted mb-0">Monitors temperature and relative humidity with connected sensors, dashboards, historical trends, configurable alerts, multi-location comparison and scheduled reports.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-white rounded-3 border h-100 shadow-sm">
            <div class="d-flex align-items-center mb-2">
              <span class="badge bg-primary me-2">Config 03</span>
              <h6 class="fw-bold text-dark mb-0">Temperature, Humidity and AQI Monitoring</h6>
            </div>
            <p class="small text-muted mb-0">Monitors temperature, relative humidity and approved air-quality parameters such as particulate matter, carbon dioxide or volatile compounds. AQI reflects installed sensors and is not represented as certified regulatory data unless independently validated.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-white rounded-3 border h-100 shadow-sm">
            <div class="d-flex align-items-center mb-2">
              <span class="badge bg-primary me-2">Config 04</span>
              <h6 class="fw-bold text-dark mb-0">Temperature, Humidity and AQI Monitoring with Door Status</h6>
            </div>
            <p class="small text-muted mb-0">Adds a compatible door-status input to temperature, humidity and AQI monitoring, recording open and closed state, time-stamped door events and door-open duration for suitable controlled areas.</p>
          </div>
        </div>
        <div class="col-12">
          <div class="p-3 bg-white rounded-3 border h-100 shadow-sm">
            <div class="d-flex align-items-center mb-2">
              <span class="badge bg-primary me-2">Config 05</span>
              <h6 class="fw-bold text-dark mb-0">Temperature, Humidity and AQI Monitoring with Door and Power On/Off Status</h6>
            </div>
            <p class="small text-muted mb-0">Adds approved door status and isolated electrical power on/off status to temperature, humidity and AQI monitoring. The electrical interface and protection must be engineered and approved for the installation.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mb-4">
    <h5 class="fw-bold text-dark mb-3"><i class="fa fa-cubes text-primary me-2"></i>Approved Monitoring Product Use Cases</h5>
    <p class="small text-muted mb-3">Rendered as approved application clusters when one of the five configurations satisfies the site requirement:</p>
    <div class="row g-3">
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-snowflake text-info me-2"></i>Cold Chain and Controlled Storage</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Cold rooms, freezers, chillers and refrigerated warehouses</li>
            <li>Food, beverage, dairy, ingredient, pharmaceutical and vaccine storage</li>
            <li>Door-open duration and power-state correlation in temperature-controlled rooms</li>
            <li>Multi-location cold-chain dashboards and scheduled reports</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-industry text-secondary me-2"></i>Manufacturing and Industrial Facilities</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Production rooms, assembly areas, molding shops and material stores</li>
            <li>Electrical rooms, control rooms, server rooms, telecom shelters and equipment rooms</li>
            <li>Temperature, humidity and approved AQI monitoring in occupied or controlled work areas</li>
            <li>Door and power-status monitoring for suitable rooms and enclosures</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-flask text-danger me-2"></i>Laboratories, Healthcare and Life Sciences</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Research and quality laboratories, sample rooms and controlled cabinets</li>
            <li>Hospital pharmacies, medicine stores, blood banks and diagnostic storage</li>
            <li>Temperature, humidity, AQI and door-status monitoring for suitable controlled areas</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-building text-warning me-2"></i>Buildings, Warehouses and Public Spaces</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Warehouses, offices, schools, malls, hotels and public indoor spaces</li>
            <li>Server rooms, data centres, UPS rooms and communications facilities</li>
            <li>Temperature, humidity and approved indoor-air-quality monitoring</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-seedling text-success me-2"></i>Agriculture and Food Production</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Greenhouses, poultry sheds, livestock facilities, mushroom rooms and indoor farms</li>
            <li>Grain, seed, feed and agricultural-product storage</li>
            <li>Food-processing rooms, ripening chambers and ingredient-storage areas</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="border rounded-3 p-3 bg-light h-100">
          <h6 class="fw-bold text-dark"><i class="fa fa-satellite-dish text-primary me-2"></i>Remote and Multi-Location Facilities</h6>
          <ul class="small text-muted ps-3 mb-0">
            <li>Remote shelters, unattended rooms, logistics hubs and distributed facilities</li>
            <li>Temperature, humidity, AQI, door and power-state monitoring where connectivity is suitable</li>
            <li>Centralized views, alerts, history and reports across approved locations</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="alert alert-warning border-0 rounded-3 p-3 mb-4 shadow-sm">
    <div class="d-flex align-items-start">
      <i class="fa fa-shield-alt fs-4 text-warning me-3 mt-1"></i>
      <div>
        <h6 class="fw-bold text-dark mb-1">Architecture and Scope Limitation Rule</h6>
        <p class="small text-muted mb-0">
          <strong>Do not advertise gas, pressure, level, flow, energy, water-quality, weather, vibration, soil-moisture or arbitrary sensor use cases as capabilities of this product.</strong> Route broader instrumentation, machine-data, or custom industrial requirements to the appropriate project-based Industrial IoT engineering services below.
        </p>
      </div>
    </div>
  </div>

  <div class="card border-0 bg-white shadow-sm rounded-3 mb-4 p-4">
    <h5 class="fw-bold text-dark mb-3"><i class="fa fa-network-wired text-primary me-2"></i>Related Industrial IoT Engineering Services</h5>
    <p class="small text-muted mb-3">TC Smart Technology provides project-based engineering services that complement this hardware product:</p>
    <div class="row g-2">
      <div class="col-md-6">
        <a href="/services/industrial-iot-solutions/centralized-iot-dashboard" class="btn btn-outline-primary btn-sm w-100 text-start py-2">
          <i class="fa fa-chart-line me-2"></i>Centralized IoT Dashboard Service
        </a>
      </div>
      <div class="col-md-6">
        <a href="/services/industrial-iot-solutions/multi-location-monitoring" class="btn btn-outline-primary btn-sm w-100 text-start py-2">
          <i class="fa fa-map-marker-alt me-2"></i>Multi-Location Monitoring Service
        </a>
      </div>
      <div class="col-md-6">
        <a href="/services/industrial-iot-solutions/industrial-data-logging" class="btn btn-outline-primary btn-sm w-100 text-start py-2">
          <i class="fa fa-database me-2"></i>Industrial Data Logging Service
        </a>
      </div>
      <div class="col-md-6">
        <a href="/services/industrial-iot-solutions/smart-manufacturing-dashboard-oee" class="btn btn-outline-primary btn-sm w-100 text-start py-2">
          <i class="fa fa-tachometer-alt me-2"></i>Smart Manufacturing & OEE Monitoring
        </a>
      </div>
    </div>
  </div>

  <div class="p-3 bg-light rounded-3 text-center border">
    <p class="fw-semibold text-dark mb-2">Need a custom hardware configuration or multi-site deployment?</p>
    <a href="/contact" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">
      <i class="fa fa-paper-plane me-2"></i>Discuss Your Monitoring Requirement
    </a>
  </div>
</div>';
    }
}
