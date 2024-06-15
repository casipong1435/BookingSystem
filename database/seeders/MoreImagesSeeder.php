<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ImageList;

class MoreImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'item_id' => '100005',
                'image_name' => 'cityhostel-image1.jpg'
            ],
            [
                'item_id' => '100005',
                'image_name' => 'cityhostel-image2.jpg'
            ],
            [
                'item_id' => '100002',
                'image_name' => 'functionhall1-image1.jpg'
            ],
            [
                'item_id' => '100002',
                'image_name' => 'functionhall1-image2.jpg'
            ],
            [
                'item_id' => '100002',
                'image_name' => 'functionhall1-image3.jpg'
            ],
            [
                'item_id' => '100002',
                'image_name' => 'functionhall1-image4.jpg'
            ],
            [
                'item_id' => '100002',
                'image_name' => 'functionhall1-image5.jpg'
            ],
            [
                'item_id' => '100003',
                'image_name' => 'functionhall2-image1.jpg'
            ],
            [
                'item_id' => '100001',
                'image_name' => 'sinanduloy-image1.jpg'
            ],
            [
                'item_id' => '100001',
                'image_name' => 'sinanduloy-image2.jpg'
            ],
            [
                'item_id' => '100004',
                'image_name' => 'tldc-image1.jpg'
            ],
            [
                'item_id' => '100004',
                'image_name' => 'tldc-image2.jpg'
            ],
            [
                'item_id' => '100029',
                'image_name' => 'dancestudio-image1.jpg'
            ],
            [
                'item_id' => '100029',
                'image_name' => 'dancestudio-image2.jpg'
            ],
            [
                'item_id' => '100029',
                'image_name' => 'dancestudio-image3.jpg'
            ],
            [
                'item_id' => '100025',
                'image_name' => 'facultylounge-image2.jpg'
            ],
            [
                'item_id' => '100025',
                'image_name' => 'facultylounge-image3.jpg'
            ],
            [
                'item_id' => '100030',
                'image_name' => 'tcgcswimmingpool-image1.jpg'
            ],
        ];

        ImageList::insert($values);
    }
}
