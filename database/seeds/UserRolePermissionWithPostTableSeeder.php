<?php

use App\Models\Post;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionWithPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();

        $roles = [
            ['name' => 'admin'],
            ['name' => 'writer'],
            ['name' => 'editor'],
            ['name' => 'deleter'],
            ['name' => 'publisher']
        ];

        $permissions = [
            ['name' => 'write post'],
            ['name' => 'edit post'],
            ['name' => 'delete post'],
            ['name' => 'publish post'],
        ];

        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Writer',
                'email' => 'writer@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Deleter',
                'email' => 'deleter@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Publisher',
                'email' => 'publisher@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($users as $user) {
            User::create($user);
        }

        // admin
        $admin = User::find(1);
        $role = Role::find(1);
        $role->givePermissionTo('write post');
        $role->givePermissionTo('edit post');
        $role->givePermissionTo('delete post');
        $role->givePermissionTo('publish post');
        $admin->assignRole('admin');

        // writer
        $writer = User::find(2);
        $role = Role::find(2);
        $role->givePermissionTo('write post');
        $writer->assignRole('writer');

        // editor
        $editor = User::find(3);
        $role = Role::find(3);
        $role->givePermissionTo('edit post');
        $editor->assignRole('editor');

        // deleter
        $deleter = User::find(4);
        $role = Role::find(4);
        $role->givePermissionTo('delete post');
        $deleter->assignRole('deleter');

        // publisher
        $publisher = User::find(5);
        $role = Role::find(5);
        $role->givePermissionTo('publish post');
        $publisher->assignRole('publisher');

        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Post::create([
                'title' => $faker->text(50),
                'body' => $faker->paragraph(20),
                'user_id' => $writer->id
            ]);
        }
    }
}
