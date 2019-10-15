<?php

use Illuminate\Database\Seeder;

class CreatePrivacyEventsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App\PrivacyEvent::count() == 0){
            App\PrivacyEvent::create([
                'name' => 'Público',
                'definitions' => json_encode(array('view'=>array('all'),'post'=>array('all')))
            ]);
            App\PrivacyEvent::create([
                'name' => 'Público Limitado',
                'definitions' => json_encode(array('view'=>array('all'),'post'=>array('user','agents')))
            ]);
            App\PrivacyEvent::create([
                'name' => 'Privado',
                'definitions' => json_encode(array('view'=>array('user','agents'),'post'=>array('user','agents')))
            ]);
            App\PrivacyEvent::create([
                'name' => 'Privado Limitado',
                'definitions' => json_encode(array('view'=>array('user','agents'),'post'=>array('user')))
            ]);
        }
    }
}
