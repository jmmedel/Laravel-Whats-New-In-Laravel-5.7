

In this tutorial, i will demonstrate how to send email using queue with laravel 5.7. I will show how to use queue jobs in laravel from scratch. we will simple create email send using queue in this article.

Sometime, you see some process take time to load like email send, payment gateway etc. When you send email for verification or send invoice then it load time to send mail because it is services. If you don't want to wait to user for send email or other process on loading server side process then you can use queue. because it's very fast and visitor will happy to see loading time.

Here, i am going to share very simple example to create queue with database driver for test email sending. You can definitely understand how to work queue and how it's easy. If you haven't used before then don't worry, here if from starch and very simple. This is for startup developer on queue task. Just see bellow step:

Content Overview

 Step 1: Setup Laravel 5.7
 Step 2: Create Mail Setup
 Step 3: Configuration of Queue
 Step 4: Create Queue Job
 Step 5: Test Queue Job


Step 1: Setup Laravel 5.7

first of all we need to get fresh Laravel 5.7 version application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

Step 2: Create Mail Setup

We are going from scratch and in first step, we will create email for testing using Laravel Mail facade. So let's simple run bellow command.

php artisan make:mail SendEmailTest

Now you will have new folder "Mail" in app directory with SendEmailTest.php file. So let's simply copy bellow code and past on that file.

app/Mail/SendEmailTest.php

<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
  
class SendEmailTest extends Mailable
{
    use Queueable, SerializesModels;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
          
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test');
    }
}
Ok, now we require to create email view using blade file. So we will create simple view file and copy bellow code om following path.

resources/views/emails/test.blade.php

<!DOCTYPE html>
<html>
<head>
	<title>How to send mail using queue in Laravel 5.7? - ItSolutionStuff.com</title>
</head>
<body>
   
<center>
<h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
	<a href="https://itsolutionstuff.com">Visit Our Website : ItSolutionStuff.com</a>
</h2>
</center>
  
<p>Hi, Sir</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  
<strong>Thank you Sir. :)</strong>
  
</body>
</html>
after configuration of view file, we have to setup for email send, So let' set configuration in .env file:

.env

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xyz@gmail.com
MAIL_PASSWORD=123456
MAIL_ENCRYPTION=tls
Step 3: Configuration of Queue

Now in next step, we will make configuration on queue driver so first of all, we will set queue driver "database". You can set as you want also we will define driver as redis too. So here define database driver on ".env" file:

.env

QUEUE_CONNECTION=database
After that we need to generate migration and create tables for queue. So let's run bellow command for queue database tables:

Generate Migration:

php artisan queue:table

Run Migration:

php artisan migrate

Step 4: Create Queue Job

now we will create queue job bey following command, this command will create queue job file with Queueable. So let's run bellow command:

php artisan make:job SendEmailJob

now you have SendEmailJob.php file in "Jobs" directory. So let's see that file and put bellow code on that file.

app/Jobs/SendEmailJob.php

<?php
  
namespace App\Jobs;
   
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use Mail;
   
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    protected $details;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmailTest();
        Mail::to($this->details['email'])->send($email);
    }
}
Step 5: Test Queue Job

Now time is use and test created queue job, so let's simple create route with following code for testing created queue.

routes/web.php

Route::get('email-test', function(){
  
	$details['email'] = 'your_email@gmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
    dd('done');
});
Ok route is defined, you can watch your queue process using laravel queue command, so let's run bellow command:

php artisan queue:listen

Now run your project and bellow link:

Read Also: Laravel 5.7 JQuery Form Validation Example
http://localhost:8000/email-test

I hope it can help you....

