<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Marker::create([
            'latitude' => '-6.91210450486582',
            'longitude' => '107.58903381654629'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.916105160864818',
            'longitude' => '107.63362140716058'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.9168651946169675',
            'longitude' => '107.63410083783356'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.913587375804737',
            'longitude' => '107.633576185771'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.908538561905502',
            'longitude' => '107.61420935734459'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.90152654149238',
            'longitude' => '107.62588315162334'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.91066089361637',
            'longitude' => '107.6094648548839'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.935409549559854',
            'longitude' => '107.56376946760007'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.945665584496446',
            'longitude' => '107.58301212772405'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.910379724794572',
            'longitude' => '107.60939577968988'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.915968262455697',
            'longitude' => '107.62902273369562'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.946433028371253',
            'longitude' => '107.59333998710584'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.9121821961985',
            'longitude' => '107.5890377296075'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.933069956514162',
            'longitude' => '107.62652893969312'
        ]);

        \App\Models\Marker::create([
            'latitude' => '-6.896216889476864',
            'longitude' => '107.60976185579172'
        ]);
    }
}
