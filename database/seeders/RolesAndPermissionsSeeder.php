<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Str;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // User Permission
        $userPermission1 = Permission::create(['name' => 'menu: user']);
        $userPermission2 = Permission::create(['name' => 'create: user']);
        $userPermission3 = Permission::create(['name' => 'read: user']);
        $userPermission4 = Permission::create(['name' => 'update: user']);
        $userPermission5 = Permission::create(['name' => 'delete: user']);

        // Role Permission
        $rolePermission1 = Permission::create(['name' => 'menu: role']);
        $rolePermission2 = Permission::create(['name' => 'create: role']);
        $rolePermission3 = Permission::create(['name' => 'read: role']);
        $rolePermission4 = Permission::create(['name' => 'update: role']);
        $rolePermission5 = Permission::create(['name' => 'delete: role']);

        // Permission Permission
        $permissionPermission1 = Permission::create(['name' => 'menu: permission']);
        $permissionPermission2 = Permission::create(['name' => 'create: permission']);
        $permissionPermission3 = Permission::create(['name' => 'read: permission']);
        $permissionPermission4 = Permission::create(['name' => 'update: permission']);
        $permissionPermission5 = Permission::create(['name' => 'delete: permission']);

        // Branch Permission
        $branchPermission1 = Permission::create(['name' => 'menu: branch']);
        $branchPermission2 = Permission::create(['name' => 'create: branch']);
        $branchPermission3 = Permission::create(['name' => 'read: branch']);
        $branchPermission4 = Permission::create(['name' => 'update: branch']);
        $branchPermission5 = Permission::create(['name' => 'delete: branch']);

        // Customer Permission
        $customerPermission1 = Permission::create(['name' => 'menu: customer']);
        $customerPermission2 = Permission::create(['name' => 'create: customer']);
        $customerPermission3 = Permission::create(['name' => 'read: customer']);
        $customerPermission4 = Permission::create(['name' => 'update: customer']);
        $customerPermission5 = Permission::create(['name' => 'delete: customer']);

        // Request Type Permission
        $requestTypePermission1 = Permission::create(['name' => 'menu: requestType']);
        $requestTypePermission2 = Permission::create(['name' => 'create: requestType']);
        $requestTypePermission3 = Permission::create(['name' => 'read: requestType']);
        $requestTypePermission4 = Permission::create(['name' => 'update: requestType']);
        $requestTypePermission5 = Permission::create(['name' => 'delete: requestType']);

        // Transaction Type Permission
        $transactionTypePermission1 = Permission::create(['name' => 'menu: transactionType']);
        $transactionTypePermission2 = Permission::create(['name' => 'create: transactionType']);
        $transactionTypePermission3 = Permission::create(['name' => 'read: transactionType']);
        $transactionTypePermission4 = Permission::create(['name' => 'update: transactionType']);
        $transactionTypePermission5 = Permission::create(['name' => 'delete: transactionType']);

        // Transaction Feature Permission
        $transactionFeaturePermission1 = Permission::create(['name' => 'menu: transactionFeature']);
        $transactionFeaturePermission2 = Permission::create(['name' => 'create: transactionFeature']);
        $transactionFeaturePermission3 = Permission::create(['name' => 'read: transactionFeature']);
        $transactionFeaturePermission4 = Permission::create(['name' => 'update: transactionFeature']);
        $transactionFeaturePermission5 = Permission::create(['name' => 'delete: transactionFeature']);

        // Reason Claim Permission
        $reasonClaimPermission1 = Permission::create(['name' => 'menu: reasonClaim']);
        $reasonClaimPermission2 = Permission::create(['name' => 'create: reasonClaim']);
        $reasonClaimPermission3 = Permission::create(['name' => 'read: reasonClaim']);
        $reasonClaimPermission4 = Permission::create(['name' => 'update: reasonClaim']);
        $reasonClaimPermission5 = Permission::create(['name' => 'delete: reasonClaim']);

        // Fpkn Permission
        $fpknPermission1 = Permission::create(['name' => 'menu: fpkn']);
        $fpknPermission2 = Permission::create(['name' => 'create: fpkn']);
        $fpknPermission3 = Permission::create(['name' => 'read: fpkn']);
        $fpknPermission4 = Permission::create(['name' => 'update: fpkn']);
        $fpknPermission5 = Permission::create(['name' => 'delete: fpkn']);

        // Approval Complaint Permission
        $approvalComplaintPermission1 = Permission::create(['name' => 'menu: approvalComplaint']);
        $approvalComplaintPermission2 = Permission::create(['name' => 'create: approvalComplaint']);
        $approvalComplaintPermission3 = Permission::create(['name' => 'read: approvalComplaint']);
        $approvalComplaintPermission4 = Permission::create(['name' => 'update: approvalComplaint']);
        $approvalComplaintPermission5 = Permission::create(['name' => 'delete: approvalComplaint']);

        // Journal Slip Permission
        $journalSlipPermission1 = Permission::create(['name' => 'menu: journalSlip']);
        $journalSlipPermission2 = Permission::create(['name' => 'create: journalSlip']);
        $journalSlipPermission3 = Permission::create(['name' => 'read: journalSlip']);
        $journalSlipPermission4 = Permission::create(['name' => 'update: journalSlip']);
        $journalSlipPermission5 = Permission::create(['name' => 'delete: journalSlip']);

        // $Permission1 = Permission::create(['name' => 'menu: ']);
        // $Permission2 = Permission::create(['name' => 'create: ']);
        // $Permission3 = Permission::create(['name' => 'read: ']);
        // $Permission4 = Permission::create(['name' => 'update: ']);
        // $Permission5 = Permission::create(['name' => 'delete: ']);

        $rootRole = Role::create(['name' => 'root'])->syncPermissions([
            $userPermission1,$userPermission2,$userPermission3,$userPermission4,$userPermission5,
            $rolePermission1,$rolePermission2,$rolePermission3,$rolePermission4,$rolePermission5,
            $permissionPermission1,$permissionPermission2,$permissionPermission3,$permissionPermission4,$permissionPermission5,
            $branchPermission1, $branchPermission2, $branchPermission3, $branchPermission4, $branchPermission5,
            $customerPermission1, $customerPermission2, $customerPermission3, $customerPermission4, $customerPermission5,
            $requestTypePermission1, $requestTypePermission2, $requestTypePermission3, $requestTypePermission4, $requestTypePermission5,
            $transactionTypePermission1, $transactionTypePermission2, $transactionTypePermission3, $transactionTypePermission4, $transactionTypePermission5,
            $transactionFeaturePermission1, $transactionFeaturePermission2, $transactionFeaturePermission3, $transactionFeaturePermission4, $transactionFeaturePermission5,
            $reasonClaimPermission1, $reasonClaimPermission2, $reasonClaimPermission3, $reasonClaimPermission4, $reasonClaimPermission5,
            $fpknPermission1, $fpknPermission2, $fpknPermission3, $fpknPermission4, $fpknPermission5,
            $approvalComplaintPermission1, $approvalComplaintPermission2, $approvalComplaintPermission3, $approvalComplaintPermission4, $approvalComplaintPermission5,
            $journalSlipPermission1, $journalSlipPermission2, $journalSlipPermission3, $journalSlipPermission4, $journalSlipPermission5
        ]);

        $customerServiceRole = Role::create(['name' => 'customer service'])->syncPermissions([
            $fpknPermission1, $fpknPermission3
        ]);
        $cardCenterRole = Role::create(['name' => 'card center'])->syncPermissions([
            $reasonClaimPermission1, $reasonClaimPermission2, $reasonClaimPermission3, $reasonClaimPermission4, $reasonClaimPermission5,
            $approvalComplaintPermission1, $approvalComplaintPermission2, $approvalComplaintPermission3, $approvalComplaintPermission4, $approvalComplaintPermission5
        ]);
        $settlementRole = Role::create(['name' => 'settlement'])->syncPermissions([
            $journalSlipPermission1, $journalSlipPermission2, $journalSlipPermission3, $journalSlipPermission4, $journalSlipPermission5
        ]);

        $nasabahRole = Role::create(['name' => 'nasabah'])->syncPermissions([
            $fpknPermission1, $fpknPermission2, $fpknPermission3, $fpknPermission4
        ]);

        User::create([
            'name'              => 'Root',
            'email'             => 'root@system.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ])->assignRole($rootRole);

        User::create([
            'name'              => 'Customer Service',
            'email'             => 'customerservice@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ])->assignRole($customerServiceRole);

        User::create([
            'name'              => 'Card Center 1',
            'email'             => 'cardcenter@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ])->assignRole($cardCenterRole);

        User::create([
            'name'              => 'Settlement 1',
            'email'             => 'settlement@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ])->assignRole($settlementRole);

        User::create([
            'name'              => 'Nasabah',
            'email'             => 'nasabah@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10)
        ])->assignRole($nasabahRole);
    }
}
