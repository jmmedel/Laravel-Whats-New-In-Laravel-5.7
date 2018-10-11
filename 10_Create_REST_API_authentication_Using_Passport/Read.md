
API is also known as Web services. Are you looking for create restful api in laravel 5.7? If yes then here i write step by step tutorial about how to create rest api with authentication using passport.

In Today, As we know laravel is a more popular because of security feature. So many of the developer choose laravel to create rest api for mobile app developing. Yes Web services is a very important when you create web and mobile developing, because you can create same database and work with same data.

If you don't know laravel or you don't know how to start to create API with laravel then don't worry. in this tutorial i will explain step by step how to create rest api using passport in laravel 5.7. So, you have to just follow few steps to get those login, register, products(insert, update, delete) apis.

Content Overview

 Step 1: Install Laravel 5.7
 Step 2: Install Passport
 Step 3: Passport Configuration
 Step 4: Add Product Table and Model
 Step 5: Create API Routes
 Step 6: Create Controller Files


Step 1: Install Laravel 5.7

I am going to explain step by step from scratch so, we need to get fresh Laravel 5.7 application using bellow command, So open your terminal OR command prompt and run bellow command:

composer create-project --prefer-dist laravel/laravel blog

Step 2: Install Passport

In this step we need to install passport via the Composer package manager, so one your terminal and fire bellow command:

composer require laravel/passport

After successfully install package, we require to get default migration for create new passport tables in our database. so let's run bellow command.

php artisan migrate

Next, we need to install passport using command, Using passport:install command, it will create token keys for security. So let's run bellow command:

php artisan passport:install

Step 3: Passport Configuration

In this step, we have to configuration on three place model, service provider and auth config file. So you have to just following change on that file.

In model we added HasApiTokens class of Passport,

In AuthServiceProvider we added "Passport::routes()",

In auth.php, we added api auth configuration.

app/User.php

<?php
  
namespace App;
  
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
  
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
app/Providers/AuthServiceProvider.php

<?php


namespace App\Providers;


use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Passport::routes();
    }
}
config/auth.php

<?php


return [
    .....
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],
    ],
    .....
]
Step 4: Add Product Table and Model

next, we require to create migration for posts table using Laravel 5.7 php artisan command, so first fire bellow command:

php artisan make:migration create_products_table

After this command you will find one file in following path database/migrations and you have to put bellow code in your migration file for create products table.

<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('detail');
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
        Schema::dropIfExists('products');
    }
}
After create migration we need to run above migration by following command:

php artisan migrate

After create "products" table you should create Product model for products, so first create file in this path app/Product.php and put bellow content in item.php file:

app/Product.php

<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'detail'
    ];
}
Step 5: Create API Routes

In this step, we will create api routes. Laravel provide api.php file for write web services route. So, let's add new route on that file.

routes/api.php

<?php
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  
Route::post('register', 'API\RegisterController@register');
  
Route::middleware('auth:api')->group( function () {
	Route::resource('products', 'API\ProductController');
});
Step 6: Create Controller Files

in next step, now we have create new controller as BaseController, ProductController and RegisterController, i created new folder "API" in Controllers folder because we will make alone APIs controller, So let's create both controller:

app/Http/Controllers/API/BaseController.php

<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
app/Http/Controllers/API/ProductController.php

<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Product;
use Validator;


class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();


        return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $product = Product::create($input);


        return $this->sendResponse($product->toArray(), 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);


        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }


        return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();


        return $this->sendResponse($product->toArray(), 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return $this->sendResponse($product->toArray(), 'Product deleted successfully.');
    }
}
app/Http/Controllers/API/RegisterController.php

<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'User register successfully.');
    }
}
Now we are ready to to run full restful api and also passport api in laravel. so let's run our example so run bellow command for quick run:

php artisan serve

make sure in details api we will use following headers as listed bellow:

Read Also: How to create database seeder in Laravel 5.7?
'headers' => [

    'Accept' => 'application/json',

    'Authorization' => 'Bearer '.$accessToken,

]

Here is Routes URL with Verb:

1) Login: Verb:GET, URL:http://localhost:8000/oauth/token

2) Register: Verb:GET, URL:http://localhost:8000/api/register

3) List: Verb:GET, URL:http://localhost:8000/api/products

4) Create: Verb:POST, URL:http://localhost:8000/api/products

5) Show: Verb:GET, URL:http://localhost:8000/api/products/{id}

6) Update: Verb:PUT, URL:http://localhost:8000/api/products/{id}

7) Delete: Verb:DELETE, URL:http://localhost:8000/api/products/{id}

Now simply you can run above listed url like as bellow screen shot:

Login API:



Register API:



Product List API:



Product Create API:



Product Show API:



Product Update API:



Product Delete API:



I hope it can help you...


