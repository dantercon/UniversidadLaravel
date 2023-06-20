<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = Role::create(['id' => '1']);
        $Maestros = Role::create(['id' => '2']);
        $Estudiantes = Role::create(['id' => '3']);

        Permission::create(['name' => 'admin'])->syncRoles([$Admin,$Maestros, $Estudiantes]);

        Permission::create(['name' => 'admin.user.index'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.user.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.user.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.user.destroy'])->syncRoles([$Admin]);

    //-----------------------------Alumno---------------------------------//

        Permission::create(['name' => 'admin.alumno.index'])->syncRoles([ $Estudiantes]);
        Permission::create(['name' => 'admin.alumno.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.alumno.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.alumno.destroy'])->syncRoles([$Admin]);

    //-----------------------------Materia---------------------------------//

        Permission::create(['name' => 'admin.materia.index'])->syncRoles([$Admin,$Maestros, $Estudiantes]);
        Permission::create(['name' => 'admin.materia.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.materia.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.materia.destroy'])->syncRoles([$Admin]);

    //----------------------------Nota----------------------------------//

        Permission::create(['name' => 'admin.nota.index'])->syncRoles([$Admin,$Maestros, $Estudiantes]);
        Permission::create(['name' => 'admin.nota.create'])->syncRoles([$Admin,$Maestros]);
        Permission::create(['name' => 'admin.nota.edit'])->syncRoles([$Admin,$Maestros]);
        Permission::create(['name' => 'admin.nota.destroy'])->syncRoles([$Admin]);

    //------------------------Profesor--------------------------------------//

        Permission::create(['name' => 'admin.profesor.index'])->syncRoles([$Admin,$Maestros]);
        Permission::create(['name' => 'admin.profesor.create'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.profesor.edit'])->syncRoles([$Admin]);
        Permission::create(['name' => 'admin.profesor.destroy'])->syncRoles([$Admin]);


    }
}
