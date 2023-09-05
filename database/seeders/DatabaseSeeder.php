<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Plan;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'token' => Str::uuid(),
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        \App\Models\User::factory(10)->create();


        Plan::create([
            'label' => 'Bronze',
            'name' => 'bronze',
            'description' => 'Qualquer Coisa',
            'price_monthly' => 5,
            'price_yearly' => 50,
            'stripe_price_monthly_id' => 'price_1NmdwHL6ie8fhqijsG5weHiG',
            'stripe_price_yearly_id' => 'price_1NmdwHL6ie8fhqijErHKTS0r',
        ]);

        Plan::create([
            'label' => 'Silver',
            'name' => 'silver',
            'description' => 'Qualquer Coisa',
            'price_monthly' => 10,
            'price_yearly' => 100,
            'stripe_price_monthly_id' => 'price_1NmfYEL6ie8fhqijJTiiaf4x',
            'stripe_price_yearly_id' => 'price_1NmfYEL6ie8fhqijJTiiaf4x',
        ]);

        Plan::create([
            'label' => 'Gold',
            'name' => 'gold',
            'description' => 'Qualquer Coisa',
            'price_monthly' => 20,
            'price_yearly' => 200,
            'stripe_price_monthly_id' => 'price_1Nmfa5L6ie8fhqijVLOpMFPp',
            'stripe_price_yearly_id' => 'price_1Nmfa5L6ie8fhqijmyeWKwUf',
        ]);

        $roleAdmin = Role::create([
            'name' => 'admin',
            'label' => 'Administrador'
        ]);

        $roleSeller = Role::create([
            'name' => 'seller',
            'label' => 'Vendedor'
        ]);

        $permissionA = Permission::create([
            'name' => 'edit_post',
            'label' => 'Editar blog post'
        ]);

        $permissionB = Permission::create([
            'name' => 'delete_user',
            'label' => 'Deletar usuário do sistema'
        ]);

        $roleAdmin->permissions()->attach($permissionA);
        $roleSeller->permissions()->attach($permissionB);

        $user = User::first();
        $user->roles()->attach($roleAdmin);

        $user = User::find(2);
        $user->roles()->attach($roleSeller);
    }

}
