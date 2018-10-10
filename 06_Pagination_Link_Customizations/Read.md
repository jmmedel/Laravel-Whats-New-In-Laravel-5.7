

Today, i will guide you how to customize pagination link in laravel 5.7. Laravel 5.7 has a new pagination method to customize the number of links on each side of the current page link.

Laravel release 5.7 new version with lot's of new features. One of the new feature is a Pagination Link Customizations from them. laravel provide onEachSide() helper to make customize page link. You don't require to create custom pagination view for link customize.

Here i will quick show you how it is work with linksOnEachSide. we also create simple example so you can understand how it should work.

Example 1: Current Page 7

{{ $users->onEachSide(1)->links() }}

  

//Output

1 2 .. 6 7 8 .. 25 26

Example 2: Current Page 7

{{ $users->onEachSide(2)->links() }}

  

//Output

1 2 .. 5 6 7 8 9 .. 25 26

Example 3: Current Page 7

{{ $users->onEachSide(3)->links() }}

  

//Output

1 2 .. 4 5 6 7 8 9 10 .. 25 26

Preview:



Content Overview

 Step 1 : Install Laravel 5.7
 Step 2: Create Dummy Records
 Step 3: Create Route
 Step 4: Create SearchController
 Step 5: Create View File
Step 1: Install Laravel 5.7

first of all we need to get fresh Laravel 5.7 version application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

Step 2: Create Dummy Records

In this step, we require to run migration first. So after successfully run migration you have users table, so let's run bellow command:

php artisan migrate

Now we need to add some dummy records on users table using laravel factory, so we can basically check it properly how it works.

php artisan tinker

>>> factory(\App\User::class, 100)->create();

Step 3: Create Route

In this is step we need to create one route for listing page. so open your "routes/web.php" file and add following route.

routes/web.php

Route::get('pagination', 'PaginationController@index');
Step 4: Create PaginationController

In this step, we have to create new controller as PaginationController and we have also need to one methos index() on that controller like as you can see bellow:

app/Http/Controllers/PaginationController.php

<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\User;
  
class PaginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users', compact('users'));
    }
}
Step 5: Create View File

In Last step, let's create users.blade.php(resources/views/users.blade.php) for layout and lists all users code here and put following code:

resources/views/users.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 -  Pagination Link Customizations - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
  
<div class="container">
    <h1>Laravel 5.7 -  Pagination Link Customizations - ItSolutionStuff.com</h1>
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </thead>
        @foreach($users as $user)
        <tbody>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tbody>
        @endforeach
    </table>
    {{ $users->onEachSide(1)->links() }}
</div>
  
</body>
</html>
Now we are ready to run our example so run bellow command for quick run:

php artisan serve

Now you can open bellow URL on your browser:

Read Also: Laravel 5.7 Autocomplete Search from Database using Typeahead JS
http://localhost:8000/pagination


