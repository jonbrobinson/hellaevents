<?php

use App\Models\SocialAccountType;
use Illuminate\Database\Seeder;

class SocialAccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $accounts = $this->getSocialData();
        foreach ($accounts as $account) {
            $socAccType = new SocialAccountType();
            $socAccType->name = $account['name'];
            $socAccType->description = $account['description'];
            $socAccType->url = $account['url'];
            $socAccType->code = $account['code'];

            $socAccType->save();
        }
    }

    public function getSocialData()
    {
        return [
            [
                'name' => 'NoAccount',
                'description' => 'Unknown ',
                'url' => 'noaccount.com',
                'code' => 'noso',
            ],
            [
                'name' => 'UnknownAccount',
                'description' => 'Unknown ',
                'url' => 'unkownwebsite.com',
                'code' => 'unk',
            ],
            [
                'name' => 'Facebook',
                'description' => 'We build technologies to give people the power to connect with friends and family, find communities and grow businesses.',
                'url' => 'https://facebook.com',
                'code' => 'fbk',
            ],
            [
                'name' => 'Twitter',
                'description' => 'What’s happening in the world and what people are talking about right now.',
                'url' => 'https://twitter.com',
                'code' => 'twtr',
            ],
            [
                'name' => 'Linkedin',
                'description' => 'Connect the world’s professionals to make them more productive and successful',
                'url' => 'https://linkedin.com',
                'code' => 'lkdn',
            ],
            [
                'name' => 'Instagram',
                'description' => 'We bring you closer to the people and things you love',
                'url' => 'https://instagram.com',
                'code' => 'inst',
            ],
            [
                'name' => 'Youtube',
                'description' => 'Our mission is to give everyone a voice and show them the world.',
                'url' => 'https://youtube.com',
                'code' => 'ytb',
            ],
        ];
    }
}
