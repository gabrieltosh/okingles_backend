<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(SeedBranchOffice::class);
         $this->call(SeedModule::class);
         $this->call(SeedProfile::class);
         $this->call(SeedModuleProfile::class);
         $this->call(SeedUser::class);
         $this->call(SeedClassroom::class);
         $this->call(SeedTime::class);
         $this->call(SeedLesson::class);
         $this->call(SeedSkills::class);
    }
}
