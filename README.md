Laravel 7  
  
installation:  
  
Создайте свой ENV файл  
establish a database connection in the .env file  
DB_DATABASE= `your name`  
DB_USERNAME= `your login`  
DB_PASSWORD= `your password`  
  
launch the command line:  
-php artisan migrate  

для заполнения профилей рандомными данными выполните  
-php artisan tinker
  
  >>>factory(App\User::class, 50)->create()  
