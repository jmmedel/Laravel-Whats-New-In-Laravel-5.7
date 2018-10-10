

In this post, i will guide you to create front end form validation without page refresh using using jquery in laravel 5.7 application. we will use bootstrap jquery validate js for font-end validation in laravel 5.7.

we always love add frontend jquery validation on registration page or product create page, because we don't require to request on server and then page refresh again and show to user. It would be great if you use jquery front end validation before submit to server. It will help to server load time and show you a quick errors on front side form.

In this example, i create simple form validation using jquery so, it can help to implement for your project. You need to just follow few step and you will get js validation.



Content Overview

 Step 1: Add Route
 Step 2: Create FormController
 Step 3: Create Blade File
Step 1: Add Route

In first step, we need to create routes for display view and another for submit method. so open your "routes/web.php" file and add following route.

routes/web.php

Route::get('validation','FormController@validation');
Route::post('validation','FormController@validationPost');
Step 2: Create FormController

In this step, we have to create new controller as FormController and we have also need to add two methods validation() and validationPost() on that controller like as you can see bellow:

app/Http/Controllers/FormController.php

<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validation()
    {
        return view('validation');
    }
      
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validationPost(Request $request)
    {
       // Here you can write code of store data....
    }
}
Step 3: Create Blade File

In Last step, let's create validation.blade.php(resources/views/validation.blade.php) for form design and jquery form validation code here and put following code:

resources/views/validation.blade.php

Read Also: Laravel 5.7 - Pagination Link Customizations Example
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.7 JQuery Form Validation Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  </head>
<body>
    <div class="container">
      <h2>Laravel 5.7 JQuery Form Validation Example - ItSolutionStuff.com</h2><br/>
  
      <form method="post" action="{{url('validation')}}" id="form">
        @csrf
  
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
  
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email">
          </div>
        </div>
  
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Number">Phone Number:</label>
              <input type="text" class="form-control" name="number">
            </div>
        </div>
  
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Min Length">Min Length(minium 5):</label>
              <input type="text" class="form-control" name="minlength">
            </div>
        </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Max Length">Max Length(maximum 8):</label>
              <input type="text" class="form-control" name="maxlength">
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Min Value">Min Value(minium 1):</label>
              <input type="text" class="form-control" name="minvalue">
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Max Value">Max Value(maximum value 100):</label>
              <input type="text" class="form-control" name="maxvalue">
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Range">Range(minium 20, maximum 40):</label>
              <input type="text" class="form-control" name="range">
            </div>
          </div>
  
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Range">URL:</label>
              <input type="text" class="form-control" name="url">
            </div>
          </div>
  
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="file" name="filename">    
         </div>
        </div>
  
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
  
      </form>
 
    </div>
   
<script>
 
    $(document).ready(function () {
 
    $('#form').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            number: {
                required: true,
                digits: true
            },
            minlength: {
                required: true,
                minlength: 5
            },
            maxlength: {
                required: true,
                maxlength: 8
            },
            minvalue: {
                required: true,
                min: 1
            },
            maxvalue: {
                required: true,
                max: 100
            },
            range: {
                required: true,
                range: [20, 40]
            },
            url: {
                required: true,
                url: true
            },
            filename: {
                required: true,
                extension: "jpeg|png"
            },
        }
    });
});
</script>
 
</body>
 
</html>
Now it's ready you can simply run this example.

I hope it can help you...

