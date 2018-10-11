
Here, i will explain to create seeder for insert multiple records on database table in laravel 5.7 app. in this example you will show how to use seeder and how you can run specific seeder in laravel 5.7 project.

We should know what is database seeder in laravel and why we should use before start example of database seeding. Laravel provides a tool to add sample or dummy data to our databases automatically. that is call it database seeding.

Laravel database seeder through we can add simply testing data on our database table. Database seed is extremely useful because testing with various data allows you to likely detect bugs you otherwise would have overlooked. We have to simple make one time seeder with some dummy data, that way we can simply reuse when you deploy project first time. We can make seeder after migration of table.

So today in this example we will add some sample data of users table from scratch. So laravel provide us command for creating seed and run that. so first run bellow command for create "UsersTableDataSeeder" seeder.



Create Seeder:

php artisan make:seeder UsersTableDataSeeder
After run above command successfully, you will be found new created file "database/seeds/UsersTableDataSeeder.php". In this file i make three sample user for users table using insert query. So open UsersTableDataSeeder.php file and some sample data like as bellow:

database/seeds/UsersTableDataSeeder.php

<?php
  
use Illuminate\Database\Seeder;
use App\User;
  
class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
	    	User::create([
	            'name' => str_random(8),
	            'email' => str_random(12).'@mail.com',
	            'password' => bcrypt('123456')
	        ]);
    	}
    }
}
Now we are ready to run above seeder using bellow command:

Run Seeder:

Read Also: How to send mail using queue in Laravel 5.7?
php artisan db:seed --class=UsersTableDataSeeder

I hope it can help you....

