

Today, i will share with you how to create pdf file from html design in laravel 5.7 application. we will use dompdf (barryvdh/laravel-dompdf package) for generate pdf file with laravel 5.7 project. i write tutorial step by step to generate pdf file in laravel 5.7.

PDF is one of basic requirement when you are working with erp level project or ecommerce website. we may need to create pdf file for report or invoice etc. So, here i will give you very simple example for create pdf file with laravel.

in this example, we will install barryvdh/laravel-dompdf composer package and then after we will add new route with controller. Then we will create one example blade file. Then after you have to just run project and see pdf file for download. You need to just follow few steps and get basic example of pdf file.

Content Overview

 Step 1: Download Laravel 5.7
 Step 2: Install laravel-dompdf Package
 Step 3: Create Routes
 Step 4: Create Controller
 Step 5: Create Blade File



 1. Step 1: Download Laravel 5.7

I am going to explain step by step from scratch so, we need to get fresh Laravel 5.7 application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

2. npm install composer install 
php artisan key:generate 
set the .env 

3. 
Step 2: Install laravel-dompdf Package

first of all we will install barryvdh/laravel-dompdf composer package by following composer command in your laravel 5.7 application.

composer require barryvdh/laravel-dompdf

After successfully install package, open config/app.php file and add service provider and alias.

config/app.php

'providers' => [
	....
	Barryvdh\DomPDF\ServiceProvider::class,
],
  
'aliases' => [
	....
	'PDF' => Barryvdh\DomPDF\Facade::class,
]



Step 3: Create Routes

In this is step we need to create routes for items listing. so open your "routes/web.php" file and add following route.

routes/web.php

Route::get('generate-pdf','HomeController@generatePDF');
Step 4: Create Controller

Here,we require to create new controller HomeController that will manage generatePDF method of route. So let's put bellow code.

app/Http/Controllers/HomeController.php

<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
  
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
Step 5: Create Blade File

In Last step, let's create myPDF.blade.php(resources/views/myPDF.blade.php) for layout of pdf file and put following code:

resources/views/myPDF.blade.php

Read Also: Laravel 5.7 - Create REST API with authentication using Passport Tutorial
<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
</head>
<body>
	<h1>Welcome to ItSolutionStuff.com - {{ $title }}</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</body>
</html>
Now we are ready to run this example and check it...

I hope it can help you...


