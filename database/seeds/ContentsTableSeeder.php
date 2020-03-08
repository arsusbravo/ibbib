<?php

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'title' => 'I am a translator',
            'slug' => 'translator',
            'language_id' => 1,
            'keywords' => 'translator, jobs',
            'description' => 'I am a translator. What does IBBIB jobs mean to me?',
            'body' => '<p>I am a translator. What does IBBIB jobs mean to me?</p>',
            ],
            [
            'title' => 'Translation Agency',
            'slug' => 'agency',
            'language_id' => 1,
            'keywords' => 'agency, translator, jobs, project',
            'description' => 'We need translator for our project. What does IBBIB jobs mean to me?',
            'body' => '<p>We need translator for our project. What does IBBIB jobs mean to me?</p>',
            ],
            [
            'title' => 'About IBBIB Jobs',
            'slug' => 'about',
            'language_id' => 1,
            'keywords' => 'About, Jobs',
            'description' => 'About IBBIB Jobs',
            'body' => '<p>About IBBIB Jobs</p>',
            ],
            [
            'title' => 'Contact Info',
            'slug' => 'contact',
            'language_id' => 1,
            'keywords' => 'contact, jobs',
            'description' => 'Contact IBBIB Jobs',
            'body' => '<p>There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>',
            ],
        ];
        foreach($data as $cols){
            $insert = new Content;
            foreach($cols as $key=>$val){
                $insert->$key = $val;
            }
            $insert->save();
        }
    }
}
