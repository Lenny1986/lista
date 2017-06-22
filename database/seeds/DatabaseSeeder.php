<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableProtection();

        // $this->call(UsersTableSeeder::class);

        $this->enableProtection();
    }

    private function disableProtection() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();
    }

    private function enableProtection() {
        Model::reguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
