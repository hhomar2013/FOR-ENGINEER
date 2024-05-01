<?php
namespace Database\Seeders;
use App\Models\Admin;
use App\Models\companies_type;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        companies_type::query()->create([
           'name'=>'حر',
            'status'=>1
        ]);

        //Admin Seeder
         Admin::create([
            'name' => 'OmarMahgoub',
            'email' => 'omar@app.com',
            'password' => bcrypt('123456'),
             'role'=>'0',
             'status'=>0
        ]);

         Admin::create([
            'name' => 'Fares',
            'email' => 'fares@for-engineer.net',
            'password' => bcrypt('123456@For'),
             'role'=>'1',
             'status'=>1
        ]);

         User::create([
            'name' => 'Super Omar Mahgoub',
            'email' => 'user@app.com',
            'password' => bcrypt('123456'),
             'status'=>1
        ]);

        Company::create([
            'name' => 'Company',
            'email' => 'company@app.com',
            'password' => bcrypt('123456'),
            'ct_id'=>1,
            'status'=>0
        ]);


    }
}
