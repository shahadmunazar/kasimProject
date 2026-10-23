<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DeliveryPersonnel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seeds one user for each system role for testing:
     * - admin
     * - warehouse
     * - delivery (with linked DeliveryPersonnel record)
     * - customer
     */
    public function run(): void
    {
        $defaultPassword = Hash::make('password123');

        // 1. Primary Test Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@tcsmarttechnology.com'],
            [
                'name' => 'System Administrator',
                'password' => $defaultPassword,
                'role' => 'admin',
                'phone' => '9876543201',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Also ensure existing primary admin has role 'admin' and active status
        User::where('email', 'kasimbroAdminBlogs@gmail.com')->update([
            'role' => 'admin',
            'is_active' => true,
        ]);

        // 2. Warehouse Manager / Staff
        $warehouseUser = User::updateOrCreate(
            ['email' => 'warehouse@tcsmarttechnology.com'],
            [
                'name' => 'Warehouse Manager',
                'password' => $defaultPassword,
                'role' => 'warehouse',
                'phone' => '9876543202',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // 3. Delivery Rider / Logistics Personnel
        $deliveryUser = User::updateOrCreate(
            ['email' => 'delivery@tcsmarttechnology.com'],
            [
                'name' => 'Delivery Agent Ramesh',
                'password' => $defaultPassword,
                'role' => 'delivery',
                'phone' => '9876543203',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Link delivery personnel profile
        DeliveryPersonnel::updateOrCreate(
            ['user_id' => $deliveryUser->id],
            [
                'employee_code' => 'DEL-001',
                'vehicle_type' => 'Electric Bike',
                'vehicle_number' => 'KA-01-TC-1001',
                'license_number' => 'DL-KA-2023-000456',
                'emergency_contact' => '9876543200',
                'is_available' => true,
                'notes' => 'Primary test delivery rider for Bangalore hub.',
            ]
        );

        // 4. Test Customer
        $customer = User::updateOrCreate(
            ['email' => 'customer@tcsmarttechnology.com'],
            [
                'name' => 'Test Customer',
                'password' => $defaultPassword,
                'role' => 'customer',
                'phone' => '9876543204',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Role test users successfully seeded:');
        $this->command->line('  • Admin:     admin@tcsmarttechnology.com / password123');
        $this->command->line('  • Warehouse: warehouse@tcsmarttechnology.com / password123');
        $this->command->line('  • Delivery:  delivery@tcsmarttechnology.com / password123');
        $this->command->line('  • Customer:  customer@tcsmarttechnology.com / password123');
    }
}
