
Guys,

Here, I want to share with you how to user custom bootstrap alert flash message in laravel 5.7 application. we will create a simple example for a redirect with an alert message from controller method and print flash message using blade file.

we will display alert success, alert danger, alert info, alert warning messages in bootstrap laravel 5.7 projects. we are not using any composer package for this because we can do it easily without any package.

Flash messages are required in laravel 5.7 application because that way we can give alter with what progress complete, error, warning etc. In this tutorial, I added several ways to give a flash message like redirect with success message, redirect with an error message, redirect with a warning message and redirect with info message. In this example, we use a bootstrap flash alert layout that way it becomes good layout.

So, you have to just follow the basic three step to integrate flash message in your laravel application. So let's follow below step:

Content Overview

 Step 1: Create Global Blade File For Flash Message
 Step 2: Include Flash Message in Theme
 Step 3: Use Flash Messages with Redirect


Step 1: Create Global Blade File For Flash Message

In first step we will create new blade file flash-message.blade.php. In this file we will write code of bootstrap alert and check which messages come.

There are following alert will added:

1)success

2)error

3)warning

4)info

5)validation error

So, let's create flash-message.blade.php file and put bellow code on that file.

resources/views/flash-message.blade.php

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
Step 2: Include Flash Message in Theme

In this step we have to just include flash-message.blade.php file in your theme default file. So we can add file like this way:

resources/views/layouts/app.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>


    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
Step 3: Use Flash Messages with Redirect

In this step we will learn how to give message when you redirect one by one:

1. Redirect with success message

We can simple redirect route or redirect url or redirect back with success flash message, we can use in controller like this way:

public function create(Request $request)
{
	$this->validate($request,[
        'title' => 'required',
        'details' => 'required'
        ]);


	$items = Item::create($request->all());


	return back()->with('success','Item created successfully!');
}
You can get layout of success flash message:



2. Redirect with error message

We can simple redirect route or redirect url or redirect back with error flash message, we can use in controller like this way:

public function create(Request $request)
{
    return redirect()->route('home')
        ->with('error','You have no permission for this page!');
}
You can get layout of error flash message:



3. Redirect with warning message

We can simple redirect route or redirect url or redirect back with warning flash message, we can use in controller like this way:

public function create(Request $request)
{
    return redirect()->route('home')
            ->with('warning','Don't Open this link);
}
You can get layout of warning flash message:



4. Redirect with info message

We can simple redirect route or redirect url or redirect back with info flash message, we can use in controller like this way:

public function create(Request $request)
{
    $this->validate($request,[
        'title' => 'required',
        'details' => 'required'
        ]);


    $items = Item::create($request->all());


    return back()->with('info','You added new items, follow next step!');
}
You can get layout of info flash message:



5. Validation Error

If you use laravel 5 validation then you will redirect back with errors automatically, At that time it will also generate error flash message.

Read Also: Laravel 5.7 - Generate PDF from HTML Example
public function create(Request $request)
{
    $this->validate($request,[
        'title' => 'required',
        'details' => 'required'
        ]);


    .....
}
You can get layout of error flash message:


