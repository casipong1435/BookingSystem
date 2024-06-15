<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TourismFacilitiesDescription;
use App\Models\TourismEquipmentsDescription;
use App\Models\TourismRoomsDescription;
use App\Models\Itemlist;

class tourism_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $item_data = [
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'item_img' => 'sinanduloy.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'item_img' => 'functionhall1.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100003,
                'item_name' => 'Function Hall 2',
                'item_img' => 'functionhall2.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100004,
                'item_name' => 'TLDC',
                'item_img' => 'tldc.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100005,
                'item_name' => 'City Hostel',
                'item_img' => 'cityhostel.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100006,
                'item_name' => 'Activity Center - Conference room',
                'item_img' => 'activityconference.jpg',
                'item_type' => 'room',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 1,
                'description' => ''

            ],
            [
                'item_id' => 100007,
                'item_name' => 'Sound System',
                'item_img' => 'sounsystem.jpg',
                'item_type' => 'equipment',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100008,
                'item_name' => 'Combo Facilities',
                'item_img' => 'combofacilities.jpg',
                'item_type' => 'equipment',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100009,
                'item_name' => 'Plastic Chairs',
                'item_img' => 'plasticchairs.jpg',
                'item_type' => 'equipment',
                'quantity' => 500,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100010,
                'item_name' => 'Kitchen Utensils',
                'item_img' => 'kitchenutensils.jpg',
                'item_type' => 'equipment',
                'quantity' => 500,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100011,
                'item_name' => 'Dump Track',
                'item_img' => 'dumptrack.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100012,
                'item_name' => 'Grader',
                'item_img' => 'grader.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100013,
                'item_name' => 'Pay Loader',
                'item_img' => 'payloader.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100014,
                'item_name' => 'Bulldozer',
                'item_img' => 'bulldozer.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100015,
                'item_name' => 'Backhoe/Breaker',
                'item_img' => 'backhoebreaker.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100016,
                'item_name' => 'Road Roller',
                'item_img' => 'roadballer.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100017,
                'item_name' => 'Cement Mixer (Big)',
                'item_img' => 'cementmixer.jpg',
                'item_type' => 'equipment',
                'quantity' => 10,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => ''

            ],
            [
                'item_id' => 100018,
                'item_name' => 'City Owned Swimming Pool',
                'item_img' => 'cityswimmingpool.jpg',
                'item_type' => 'facility',
                'quantity' => 1,
                'status' => 1,
                'in_charge' => 'city',
                'featured' => 0,
                'description' => 'Only Daytime on Weekdays (adult - 45.00/head, children - 30.00/head), On Weekends (adult - 50.00/head, children - 35.00/head). Night time only for Weekends ranges from 6:00 pm to 10:00 pm (adult - 55.00/head, children - 40.00/head). Payment process is walk-in.'

            ],
            [
                'item_id' => 100022,
                'item_name' => 'Covered Court',
                'item_img' => 'coveredcourt.jpg',
                'quantity' => 1,
                'item_type' => 'facility',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 1,
                'description' => 'none'

            ],
            [
                'item_id' => 100023,
                'item_name' => 'Bleacher',
                'item_img' => 'bleacher.jpg',
                'quantity' => 1,
                'item_type' => 'facility',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 1,
                'description' => 'none'

            ],
            
            [
                'item_id' => 100027,
                'item_name' => 'Oval Field',
                'item_img' => 'ovalfield.jpg',
                'quantity' => 1,
                'item_type' => 'facility',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 1,
                'description' => 'none'

            ],
            
            [
                'item_id' => 100030,
                'item_name' => 'TCGC Swimming Pool',
                'item_img' => 'tcgcswimmingpool.jpg',
                'quantity' => 1,
                'item_type' => 'facility',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100028,
                'item_name' => 'Room #',
                'item_img' => 'tcgcroom.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'
            ],
            [
                'item_id' => 100029,
                'item_name' => 'Dance Studio',
                'item_img' => 'dancestudio.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100024,
                'item_name' => 'Speech Lab',
                'item_img' => 'speechlab.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100025,
                'item_name' => 'Faculty & Staff Lounge',
                'item_img' => 'facultylounge.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100026,
                'item_name' => 'Activity Hall',
                'item_img' => 'activityhall.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100019,
                'item_name' => 'VIP Lounge',
                'item_img' => 'viplounge.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100020,
                'item_name' => 'Visitor Lounge',
                'item_img' => 'visitorlounge.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],
            [
                'item_id' => 100021,
                'item_name' => 'Audio Visual Room (AVR)',
                'item_img' => 'avr.jpg',
                'quantity' => 1,
                'item_type' => 'room',
                'status' => 1,
                'in_charge' => 'tcgc',
                'featured' => 0,
                'description' => 'none'

            ],

        ];

        $tourism_room_description = [
            //Sinanduloy cultural center

            //Seminars/Conventions to be held
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'Seminars/Conventions to be held',
                'time' => 'Daytime',
                'aircon' => 'Yes',
                'price_description' => 'First 3 Hours',
                'status' => 1,
                'price' => '4,000.00'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'Seminars/Conventions to be held',
                'time' => 'Daytime',
                'aircon' => 'No',
                'status' => 1,
                'price_description' => 'First 3 Hours',
                'price' => '3,000.00'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'Seminars/Conventions to be held',
                'time' => 'Night Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'For Succeeding Hours',
                'price' => '450.00/hour'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'Seminars/Conventions to be held',
                'time' => 'Night Time',
                'aircon' => 'No',
                'status' => 1,
                'price_description' => 'For Succeeding Hours',
                'price' => '350.00/hour'
            ],
            // End of Seminars/Conventions to be held


            //basketball/volleyball games, income based
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'basketball/volleyball games, income based',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'On tickets sold',
                'price' => '25% of the proceeds ticket'
            ],
            // End of basketball/volleyball games, income based

            //Live shows/boxing, income based on tickets
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'Live shows/boxing, income based on tickets',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'On tickets sold',
                'price' => '25% of the proceeds ticket'
            ],
            // End of Live shows/boxing, income based on tickets

            //basketball game practice, without the use of showers, locker, and dry out room
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'basketball game practice, without the use of showers, locker, and dry out room',
                'time' => 'Daytime',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 2 Hours',
                'price' => '500.00'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'basketball game practice, without the use of showers, locker, and dry out room',
                'time' => 'Daytime',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '100.00/hour'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'basketball game practice, without the use of showers, locker, and dry out room',
                'time' => 'Night Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 2 Hours',
                'price' => '700.00'
            ],
            [
                'item_id' => 100001,
                'item_name' => 'Sinanduloy Cultural Center',
                'purpose' => 'basketball game practice, without the use of showers, locker, and dry out room',
                'time' => 'Night Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '150.00/hour'
            ],
            // End of basketball game practice, without the use of showers, locker, and dry out room
            // End of Sinanduloy Cultural Center

            //Function Hall 1

            //Wedding, birthday, anniversary, baptismal, reunion, and the like
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Wedding, birthday, anniversary, baptismal, reunion, and the like',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 2 Hours',
                'price' => '4,000.00'
            ],
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Wedding, birthday, anniversary, baptismal, reunion, and the like',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '300.00/hour'
            ],
            // End of Wedding, birthday, anniversary, baptismal, reunion, and the like

            //Conference, meeting, fellowship, and similar occasion
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Conference, meeting, fellowship, and similar occasion',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 4 Hours',
                'price' => '3,000.00'
            ],
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Conference, meeting, fellowship, and similar occasion',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '300.00/hour'
            ],
            // End of Conference, meeting, fellowship, and similar occasion

            //Disco, Ballroom, and similar occasion
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Disco, Ballroom, and similar occasion',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 4 Hours',
                'price' => '2,500.00'
            ],
            [
                'item_id' => 100002,
                'item_name' => 'Function Hall 1',
                'purpose' => 'Disco, Ballroom, and similar occasion',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '300.00/hour'
            ],
            // End of Disco, Ballroom, and similar occasion
            //End of Function Hall 1


            //Function Hall 2
            [
                'item_id' => 100003,
                'item_name' => 'Function Hall 2',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'First 4 Hours',
                'price' => '2,500.00'
            ],
            [
                'item_id' => 100003,
                'item_name' => 'Function Hall 2',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Subsequent hours',
                'price' => '300.00/hour'
            ],
            // End of Function Hall 2

            //TLDC
            [
                'item_id' => 100004,
                'item_name' => 'TLDC',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Dormitory Type',
                'price' => '300.00 per pax'
            ],
            [
                'item_id' => 100004,
                'item_name' => 'TLDC',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Room Good for 2 pax',
                'price' => '700.00'
            ],
            [
                'item_id' => 100004,
                'item_name' => 'TLDC',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'For Every Extra Bed',
                'price' => '150.00'
            ],
            [
                'item_id' => 100004,
                'item_name' => 'TLDC',
                'purpose' => 'seminar and conferences',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Audio-Visual Room',
                'price' => '300.00/hour'
            ],
            // End of TLDC

            //City Hostel
            [
                'item_id' => 100005,
                'item_name' => 'City Hostel',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Rooms good for 4 pax',
                'price' => '2,000.00/day'
            ],
            [
                'item_id' => 100005,
                'item_name' => 'City Hostel',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Dormitory Type good for 10 pax',
                'price' => '300.00 per pax/day'
            ],
            [
                'item_id' => 100005,
                'item_name' => 'City Hostel',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Extra bed',
                'price' => '200.00'
            ],
            // End of City Hostel

            //Activity Center
            [
                'item_id' => 100006,
                'item_name' => 'Activity Center - Conference Room',
                'purpose' => '',
                'time' => 'All Time',
                'aircon' => 'Yes',
                'status' => 1,
                'price_description' => 'Conference room',
                'price' => '1,500.00/day'
            ],
        ];

        $tourism_equipment_description = [
            [
                'item_id' => 100007,
                'item_name' => 'Sound System',
                'status' => 1,
                'price' => '650.00/hr'

            ],
            [
                'item_id' => 100008,
                'item_name' => 'Combo Facilities',
                'status' => 1,
                'price' => '650.00/hr'
            ],
            [
                'item_id' => 100009,
                'item_name' => 'Plastic Chairs',
                'status' => 1,
                'price' => '25.00/chair'
            ],
            [
                'item_id' => 100010,
                'item_name' => 'Kitchen Utensils',
                'status' => 1,
                'price' => '15.00 per set'
            ],
            [
                'item_id' => 100011,
                'item_name' => 'Dump Track',
                'status' => 1,
                'price' => '1,000.00/hour'
            ],
            [
                'item_id' => 100012,
                'item_name' => 'Grader',
                'status' => 1,
                'price' => '2,000.00/hour'
            ],
            [
                'item_id' => 100013,
                'item_name' => 'Pay Loader',
                'status' => 1,
                'price' => '1,000.00/hour'
            ],
            [
                'item_id' => 100014,
                'item_name' => 'Bulldozer',
                'status' => 1,
                'price' => '2,000.00/hour'
            ],
            [
                'item_id' => 100015,
                'item_name' => 'Backhoe/Breaker',
                'status' => 1,
                'price' => '1,000.00/hour'
            ],
            [
                'item_id' => 100016,
                'item_name' => 'Road Roller',
                'status' => 1,
                'price' => '1,000.00/hour'
            ],
            [
                'item_id' => 100017,
                'item_name' => 'Cement Mixer (Big)',
                'status' => 1,
                'price' => '1,000.00/hour'
            ],
        ];
       
        $tourism_facility_description = [

            //All Time
            [
                'item_id' => 100018,
                'item_name' => 'City Owned Swimming Pool',
                'purpose' => 'Wedding Birthday, Anniversary, Fellowship, Reunion, Baptismal and Reception, For holding swimming sports festivites.',
                'time' => 'All Time',
                'status' => 1,
                'price_description' => 'first 4 hours',
                'price' => '3,500.00/day'
            ],

        ];

        ItemList::insert($item_data);
        TourismFacilitiesDescription::insert($tourism_facility_description);
        TourismEquipmentsDescription::insert($tourism_equipment_description);
        TourismRoomsDescription::insert($tourism_room_description);
    }
}
