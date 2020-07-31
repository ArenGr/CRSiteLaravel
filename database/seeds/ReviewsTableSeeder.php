<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'client_name'=>'Samuel Abramov',
                'client_review'=>'CodeRiders is a quality and professional web development firm. The team we worked with was accessible, knowledgeable, and helpful throughout the entire process. Their constant flow of communication enabled to meet our pre-defined deliverables. Deadline is just as important to CodeRiders as careful and reliable work results. I give these guys five stars and would recommend them to anyone with tech needs.',
                'client_position'=>'CEO and Founder',
                'client_company_name'=>'Abramov Software',
                'client_image'=>'9c5e6ce51bb79391af2ac076d46f00be.jpg',
                'carousel_status'=>1,
                'created_at'=>'2018-11-09 14:18:10',
                'updated_at'=>'2018-11-09 18:18:40'
            ],
            [
            
                'client_name'=>'Emil Svensson',
                'client_review'=>'CodeRiders team are enthusiasts that know how to solve both business and technical issues within a limited time and also provide comprehensive end-to-end solutions working together with our own core team. Weâ€™ve worked with them for a few years and the cooperation is still ongoing. My best recommendations.',
                'client_position'=>'COO',
                'client_company_name'=>'Footmall',
                'client_image'=>'ee0f9101f4f85f65933816da3fcd6e94.png',
                'carousel_status'=>1,
                'created_at'=>'2018-11-09 14:17:34',
                'updated_at'=>'2018-11-09 18:18:32'
            ],
            [
                'client_name'=>'Laurentiu Nat',
                'client_review'=>'The team has done great job on the backend functionality of our system, and these several years we have been working together very productively. Being always available for discussions, delivering the results on time, seeking new solutions and taking care of the product - this is why I highly recommended them!',
                'client_position'=>'CTO',
                'client_company_name'=>'Worldsoft AG',
                'client_image'=>'0d31af5350e3e51385079dd9dc05c6ee.png',
                'carousel_status'=>1,
                'created_at'=>'2018-11-09 14:16:48',
                '2018-11-09 18:16:55'
            ],
            [
                'client_name'=>'Philip Zeplin-Frederiksen',
                'client_review'=>'CodeRiders has been a great help to me, as we have worked on creating a SaaS for YouTubers, pulling and analyzing data via the YouTube API into a custom online service. Very friendly, fairly priced, and always delivered quality work. If there were any problems, they were always quick to help and look into them. I am more than happy to say that I will gladly recommend them.',
                'client_position'=>'Founder',
                'client_company_name'=>'NovelConcept',
                'client_image'=>'a646b067c71dec2fb9dfb235d996975c.jpg',
                'carousel_status'=>1,
                'created_at'=>'2018-11-08 20:14:55', 
                'updated_at'=>'2019-01-24 07:37:04'
            ],
            [
                'client_name'=>'Dwel Online',
                'client_review'=>'CodeRiders are the official development team of the project Dwel.\r\nFor the past two years they have been working diligently on our project, displaying excellent skills, great communication and ability to deliver the exact desired results. I highly recommend the team for any complex, multi-faceted modern application development projects and look forward to our continued association.\r\n',
                'client_position'=>'Project Leader',
                'client_company_name'=>'Al Segian',
                'client_image'=>'d798421d7bb280cf60d57ef3232adf96.jpg',
                'carousel_status'=>1,
                'created_at'=>'2019-12-09 11:30:36', 
                'updated_at'=>'2019-12-09 11:31:58'
            ]

        ]);
    }
}
