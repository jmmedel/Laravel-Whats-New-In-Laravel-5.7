


Step 1 : Install Laravel 5.7

we are going from scratch, So we require to get fresh Laravel 5.7 application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

Step 2: Create Table and Model

In this step we have to create migration for items table using Laravel 5.7 php artisan command, so first fire bellow command:

php artisan make:migration create_items_table

After this command you will find one file in following path "database/migrations" and you have to put bellow code in your migration file for create items table.

<?php
  
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
  
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
Then after, simply run migration:

php artisan migrate

After create "items" table you should create Item model for items, so first create file in this path "app/Item.php" and put bellow content in item.php file:

app/Item.php

<?php
  
namespace App;
   
use Illuminate\Database\Eloquent\Model;
  
class Item extends Model
{
       
}
Step 3: Create Route

In this is step we need to create routes for items listing. so open your "routes/web.php" file and add following route.

routes/web.php

Route::get('ajax-pagination','AjaxController@ajaxPagination')->name('ajax.pagination');
Step 4: Create Controller

In this step, we have to create two view file one for layout and another for data. now we should create new controller as AjaxController in this path "app/Http/Controllers/AjaxController.php". this controller will manage all listing items and item ajax request and return response, so put bellow content in controller file:

app/Http/Controllers/AjaxController.php

<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Item;
  
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxPagination(Request $request)
    {
        $data = Item::paginate(5);
  
        if ($request->ajax()) {
            return view('presult', compact('data'));
        }
  
        return view('ajaxPagination',compact('data'));
    }
}
Step 5: Create Blade Files

In Last step, let's create ajaxPagination.blade.php(resources/views/ajaxPagination.blade.php) for layout and lists all items code here and put following code:

resources/views/ajaxPagination.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 AJAX Pagination Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
  
<body>
<div class="container">
    <h1>Laravel 5.7 AJAX Pagination Example - ItSolutionStuff.com</h1>
    <div id="tag_container">
           @include('presult')
    </div>
</div>
  
<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
  
            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
  
</body>
</html>
resources/views/presult.blade.php

<table class="table table-bordered">
    <thead>
        <tr>
            <th width="100px">ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
  
{!! $data->render() !!}
Make sure you have some dummy data on your items table before run this example. Now we are ready to run our example so run bellow command for quick run:

php artisan serve

Now you can open bellow URL on your browser:

Read Also: Laravel 5.7 CRUD (Create Read Update Delete) Tutorial Example
http://localhost:8000/ajax-pagination

I hope it can help you...
