<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Freelancer;
use App\Models\ProjectCategory;
use App\Models\User;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectTitle = [
            'I will do a perfect german English translation of the legal and technical text', 'I will edit your video professionally in 24 hours', 'I will do any kind of video editing, professionally and super fast', 'I will create 10 min TikTok compilation video super cheap and fast', 'I will do professional video editing and motion graphics in 24 hours', 'I will edit your commercial or social media video', 'I will do professional video editing and motion graphics', 'I will edit and enhance your fashion videos', 'I will do professional video editing for corporate or travel videos', 'I will do professional video editing', 'I will do elegant video editing and motion graphics', 'I will write captivating content that gets clicks', 'I will be your SEO website content writer, copywriter, or article writer',
            'Our Studio will provide professional video editing and motion graphics', 'I will edit your commercial or social media video', 'I will do professional video editing and motion graphics', 'I will edit and enhance your fashion videos', 'I will do professional video editing for corporate or travel videos', 'I will do professional video editing', 'I will do elegant video editing and motion graphics', 'I will write captivating content that gets clicks', 'I will be your SEO website content writer, copywriter, or article writer', 'I will write compelling content for you or your business', 'I will write website content and copywriting that you will love', 'I will write unique German content for your blog or website', 'I will write forex trading content for your blog or website', 'I will write creative SEO content, blog posts, or articles', 'I will write your well researched, engaging, and original content', 'I will write high-quality SEO articles, blog posts, and site content', 'I will craft a profitable digital marketing strategy and plan', 'I will be your digital marketing virtual assistant', 'I will strategize digital marketing with social media management', 'I will build your digital marketing conversion strategy', 'I will be your digital marketing manager', 'I will carefully design a profitable digital marketing plan', 'I will build a digital marketing strategy plan based on your needs', 'I will be your social media marketing manager', 'I will develop a social media marketing strategy', 'I will write and design Instagram posts for your brand', 'I will organically manage and grow your Instagram following', 'I will be a reliable virtual assistant for your social media activities', 'I will skyrocket your business through social media marketing', 'I will audit your social media profiles in 24 hours', 'I will write a professional executive resume', 'I will write you a modern, millennial resume', 'I will write your tech, software engineering, IT resume', 'I will write and design a professional resume and cover letter', 'I will support you with a professional premium CV resume writing service', 'I will write you a Canadian style resume', 'I will write you an optimized resume'
        ];

        $projectDescription = ['I am a freelance writer who lives in Canada. I’ve explored a lot of travel destinations and possess good knowledge in the travel and tourism space.I will write you an informative travel article for your website or blog.',
            'I am a Freelancer and I am a full-time graphics designer with 6+ years of experience as a freelancer.I have successfully completed hundreds of logo design projects that included some complex designs and short timelines.Designing is my passion and I enjoy doing my work.',
            'I am a professional and expert web developer. I develop and design professional websites using my skills and techniques. I develop more than 80 websites with customer satisfaction. Here are some skills which I use to develop and design a professional and responsive website.JavaScript, PHP, CSS3, WordPress, HTML5, Jquery, C#, BootStrap. ',
            'I am a Freelancer, and I can create a logo for you based on your preferences and needs. I can also keep you updated on the creation of your logo if you choose. So you know that everything is going according to plan.',
            'Hi, I’m a professional graphic designer and have 3-year of experience in graphic designing. I can work on both photoshop and illustrator.',
            'Hey, I specialize in JavaScript frameworks like React, Vue, and Express. I’m a Full Stack Web Developer having two years of experience in the field. My goal is to fulfill the growing need for fast and efficient web apps/websites.',
            'Hello There. I’m a freelance graphic designer with more than 6 years of experience. I already have 700 orders in Upwork and 1000+ orders in Fiverr. My specialty is creating custom logo designs for events, businesses, and Personal use.',
            'Hello, I’m Kim, your innovative & creative content writer. I create engaging & compelling content that excites your audience and incites action. All my contents are plagiarism-free.',
            'I’m a Freelancer and I lead a team of experts who takes care of all the digital exposure a company needs. Be it YouTube, Pinterest, Blogging, or any social channel, we can help you out.',
            'I’m a digital marketer with expertise in Search Engine Optimization (SEO), Social Media Management (SMO), and Content Writing. When it comes to my experience, I have worked as an online marketing strategist for a few international shoe companies and also worked remotely for a textile company for three years.', 'I am a freelance writer who lives in Canada. I’ve explored a lot of travel destinations and possess good knowledge in the travel and tourism space.I will write you a creative yet informative travel article for your website or blog.',
            'I am a Freelancer and I am a full-time graphics designer with 6+ years of experience as a freelancer.I have successfully completed hundreds of logo design projects that included some complex designs and short timelines.Designing is my passion and I enjoy doing my work.',
            'I am a professional and expert web developer. I develop and design professional websites using my skills and techniques. I develop more than 80 websites with customer satisfaction. Here are some skills which I use to develop and design a professional and responsive website.JavaScript, PHP, CSS3, WordPress, HTML5, Jquery, C#, BootStrap. ',
            'I am a Freelancer, and I can create a logo for you based on your preferences and needs. I can also keep you updated on the creation of your logo if you choose. So you know that everything is going according to plan.',
            'Hi, I’m a professional graphic designer and have 3-year of experience in graphic designing. I can work on both photoshop and illustrator.',
            'Hey, I specialize in JavaScript frameworks like React, Vue, and Express. I’m a Full Stack Web Developer having two years of experience in the field. My goal is to fulfill the growing need for fast and efficient web apps/websites.',
            'Hello There. I’m a freelance graphic designer with more than 6 years of experience. I already have 700 orders in Upwork and 1000+ orders in Fiverr. My specialty is creating custom logo designs for events, businesses, and Personal use.',
            'Hello, I’m Kim, your innovative & creative content writer. I create engaging & compelling content that excites your audience and incites action. All my contents are plagiarism-free.',
            'I’m a Freelancer and I lead a team of experts who takes care of all the digital exposure a company needs. Be it YouTube, Pinterest, Blogging, or any social channel, we can help you out.',
            'I’m a digital marketer with expertise in Search Engine Optimization (SEO), Social Media Management (SMO), and Content Writing. When it comes to my experience, I have worked as an online marketing strategist for a few international shoe companies and also worked remotely for a textile company for three years.', 'I am a freelance writer who lives in Canada. I’ve explored a lot of travel destinations and possess good knowledge in the travel and tourism space.I will write you a creative yet informative travel article for your website or blog.',
            'I am a Freelancer and I am a full-time graphics designer with 6+ years of experience as a freelancer.I have successfully completed hundreds of logo design projects that included some complex designs and short timelines.Designing is my passion and I enjoy doing my work.',
            'I am a professional and expert web developer. I develop and design professional websites using my skills and techniques. I develop more than 80 websites with customer satisfaction. Here are some skills which I use to develop and design a professional and responsive website.JavaScript, PHP, CSS3, WordPress, HTML5, Jquery, C#, BootStrap. ',
            'I am a Freelancer, and I can create a logo for you based on your preferences and needs. I can also keep you updated on the creation of your logo if you choose. So you know that everything is going according to plan.',
            'Hi, I’m a professional graphic designer and have 3-year of experience in graphic designing. I can work on both photoshop and illustrator.',
            'Hey, I specialize in JavaScript frameworks like React, Vue, and Express. I’m a Full Stack Web Developer having two years of experience in the field. My goal is to fulfill the growing need for fast and efficient web apps/websites.',
            'Hello There. I’m a freelance graphic designer with more than 6 years of experience. I already have 700 orders in Upwork and 1000+ orders in Fiverr. My specialty is creating custom logo designs for events, businesses, and Personal use.',
            'Hello, I’m Kim, your innovative & creative content writer. I create engaging & compelling content that excites your audience and incites action. All my contents are plagiarism-free.',
            'I’m a Freelancer and I lead a team of experts who takes care of all the digital exposure a company needs. Be it YouTube, Pinterest, Blogging, or any social channel, we can help you out.',
            'I’m a digital marketer with expertise in Search Engine Optimization (SEO), Social Media Management (SMO), and Content Writing. When it comes to my experience, I have worked as an online marketing strategist for a few international shoe companies and also worked remotely for a textile company for three years.', 'I am a freelance writer who lives in Canada. I’ve explored a lot of travel destinations and possess good knowledge in the travel and tourism space.I will write you a creative yet informative travel article for your website or blog.',
            'I am a Freelancer and I am a full-time graphics designer with 6+ years of experience as a freelancer.I have successfully completed hundreds of logo design projects that included some complex designs and short timelines.Designing is my passion and I enjoy doing my work.',
            'I am a professional and expert web developer. I develop and design professional websites using my skills and techniques. I develop more than 80 websites with customer satisfaction. Here are some skills which I use to develop and design a professional and responsive website.JavaScript, PHP, CSS3, WordPress, HTML5, Jquery, C#, BootStrap. ',
            'I am a Freelancer, and I can create a logo for you based on your preferences and needs. I can also keep you updated on the creation of your logo if you choose. So you know that everything is going according to plan.',
            'Hi, I’m a professional graphic designer and have 3-year of experience in graphic designing. I can work on both photoshop and illustrator.',
            'Hey, I specialize in JavaScript frameworks like React, Vue, and Express. I’m a Full Stack Web Developer having two years of experience in the field. My goal is to fulfill the growing need for fast and efficient web apps/websites.',
            'Hello There. I’m a freelance graphic designer with more than 6 years of experience. I already have 700 orders in Upwork and 1000+ orders in Fiverr. My specialty is creating custom logo designs for events, businesses, and Personal use.',
            'Hello, I’m Kim, your innovative & creative content writer. I create engaging & compelling content that excites your audience and incites action. All my contents are plagiarism-free.',
            'I’m a Freelancer and I lead a team of experts who takes care of all the digital exposure a company needs. Be it YouTube, Pinterest, Blogging, or any social channel, we can help you out.',
            'I’m a digital marketer with expertise in Search Engine Optimization (SEO), Social Media Management (SMO), and Content Writing. When it comes to my experience, I have worked as an online marketing strategist for a few international shoe companies and also worked remotely for a textile company for three years.', 'I am a freelance writer who lives in Canada. I’ve explored a lot of travel destinations and possess good knowledge in the travel and tourism space.I will write you a creative yet informative travel article for your website or blog.',
            'I am a Freelancer and I am a full-time graphics designer with 6+ years of experience as a freelancer.I have successfully completed hundreds of logo design projects that included some complex designs and short timelines.Designing is my passion and I enjoy doing my work.',
            'I am a professional and expert web developer. I develop and design professional websites using my skills and techniques. I develop more than 80 websites with customer satisfaction. Here are some skills which I use to develop and design a professional and responsive website.JavaScript, PHP, CSS3, WordPress, HTML5, Jquery, C#, BootStrap. ',
            'I am a Freelancer, and I can create a logo for you based on your preferences and needs. I can also keep you updated on the creation of your logo if you choose. So you know that everything is going according to plan.',
            'Hi, I’m a professional graphic designer and have 3-year of experience in graphic designing. I can work on both photoshop and illustrator.',
            'Hey, I specialize in JavaScript frameworks like React, Vue, and Express. I’m a Full Stack Web Developer having two years of experience in the field. My goal is to fulfill the growing need for fast and efficient web apps/websites.',
            'Hello There. I’m a freelance graphic designer with more than 6 years of experience. I already have 700 orders in Upwork and 1000+ orders in Fiverr. My specialty is creating custom logo designs for events, businesses, and Personal use.',
            'Hello, I’m Kim, your innovative & creative content writer. I create engaging & compelling content that excites your audience and incites action. All my contents are plagiarism-free.',
            'I’m a Freelancer and I lead a team of experts who takes care of all the digital exposure a company needs. Be it YouTube, Pinterest, Blogging, or any social channel, we can help you out.',
            'I’m a digital marketer with expertise in Search Engine Optimization (SEO), Social Media Management (SMO), and Content Writing. When it comes to my experience, I have worked as an online marketing strategist for a few international shoe companies and also worked remotely for a textile company for three years.',
        ];


        $client = User::with(['roles' => function ($query) {
            $query->select('role_name')->where('role_name', 'Client');
        }])->get()->random()->id;

        $freelancer = Freelancer::pluck('id')->toArray();

        $client1 = User::with(['roles' => function ($query) {
            $query->select('role_name')->where('role_name', 'Client');
        }])->pluck('id');

        $project1 = ProjectCategory::pluck('id')->toArray();


        for ($i = 0; $i < count($projectTitle); $i++) {
            {
                $fk = $client1[$i];

                $project[$i] = Project::create([
                    'attachment' => '1661429523.pdf',
                    'budget' => 50,
                    'duration' => 10,
                    'status' => (bool)random_int(0, 1),
                    'title' => $projectTitle[$i],
                    'description' => $projectDescription[$i],
                    'user_id' => $fk,
                    'category_id' => $project1[array_rand($project1)],
                    'assign_to' => $freelancer[array_rand($freelancer)],
                ]);

            }


        }
    }
}
