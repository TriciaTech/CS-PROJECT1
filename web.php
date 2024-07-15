<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/driver-dashboard', function () {
        return view('driver-dashboard');
    })->name('driver-dashboard');

    Route::get('/mechanic-dashboard', function () {
        return view('mechanic-dashboard');
    })->name('mechanic-dashboard');

    
    
});



// //admin routes
//users 
Route::get('/users-table', [Controller::class, 'showUsersTable'])->name('users-table'); // shows users table in admin
Route::get('/user-edit/{id}', [Controller::class, 'editUsersTable'])->name('user-edit'); //shows the users edit page in admin
Route::put('/user-update/{id}', [Controller::class, 'updateUser'])->name('user-update'); // put route to upload the new details when button is pressed in admin
Route::delete('/user-delete/{id}', [Controller::class, 'deleteUsersTable'])->name('user-delete'); //delete user in admin
//trucks
Route::get('/view-trucks', [Controller::class, 'showTrucksTable'])->name('view-trucks'); // show the trucks on the table in admin
Route::get('/search-trucks', [Controller::class, 'searchTrucks'])->name('search-trucksadmin'); //used to filter trucks based on truck id in admin
Route::get('/add-truck', [Controller::class, 'showAddForm'])->name('add-truck'); //when the add button is clicked to add new truck in admin
Route::post('/store-truck', [Controller::class, 'storeTruck'])->name('store-truck'); //post route used to add the new truck to the database in admin
Route::get('/edit-truck/{id}', [Controller::class, 'editTruck'])->name('edit-truck'); // edit button used to edit the truck details based on truckId used in admin
Route::put('/update-truck/{id}', [Controller::class, 'updateTruck'])->name('update-truck'); //used to upload the new truck details to the database in admin 
Route::delete('/delete-truck/{id}', [Controller::class, 'deleteTruck'])->name('delete-truck'); //delete button to delete truck in admin
Route::get('/truck-services/{id}', [Controller::class, 'truckServices'])->name('truck-services'); //used to see the serives done to the truck in admin
Route::get('/service-details/{serviceId}', [Controller::class, 'serviceDetails'])->name('service-details'); //used to see the details of the service in admin
Route::post('/generate-report', [Controller::class, 'generateReport'])->name('generate-report');
Route::get('/download-report', [Controller::class, 'downloadReport'])->name('download-report');
// Route::get('/assigning-trucks', [Controller::class, 'assigningtrucks'])->name('assigning-trucks'); // show the trucks on the table in admin
Route::get('/assigning-trucks/{truck_id}', [Controller::class, 'indexx'])->name('assigning-this-truck');
// Route::get('/assigning-trucks', [Controller::class, 'indexx'])->name('assigning-trucks');
Route::post('/assign-trucks', [Controller::class, 'assign'])->name('assign-trucks');

Route::get('/updating-trucks', [Controller::class, 'update'])->name('updating-trucks');

// Route to show the edit form
Route::get('/update-assignment/{assignment}', [Controller::class, 'edit'])->name('updating-assign');

// Route to handle the update request
// Route::post('/update-assignment/{assignment}', [Controller::class, 'update'])->name('update-assignment');


// Route::get('/update-assignment/{assignment_id}', [Controller::class, 'edit'])->name('edit-assignment');
Route::patch('/update-assignment/{assignment}', [Controller::class, 'update'])->name('update-assignment');


Route::post('/assign-truck', [Controller::class, 'assign'])->name('assign-truck');
// Route::fetch(`{{ route('fetch-truck-user-details') }}?plate_number=${plateNumber}&user_id=${userId}`);
Route::get('/users', [Controller::class, 'userfilter'])->name('users-index');
Route::get('/assignuser', [Controller::class, 'userfilterassign'])->name('users-indexassign');
Route::get('/assigntruck', [Controller::class, 'indexassign'])->name('trucks-indexassign');
Route::get('/search-tables', [Controller::class, 'searchTables'])->name('search-tables');
Route::post('/assign-trucks', [Controller::class, 'assignTrucks'])->name('assign-trucks');
// Route::get('/generate-report', [Controller::class, 'generateReport'])->name('generate-report');
Route::get('/search-assignments', [Controller::class, 'searchAssignments'])->name('search-assignments');
// Route for displaying all assignments
Route::get('/assigned-trucks', [Controller::class, 'indexs'])->name('assigned-trucks');

// Route for searching assignments
Route::get('/search-assignments', [Controller::class, 'searchAssignments'])->name('search-assignments');

Route::get('/view-trucks-mech', [Controller::class, 'showTrucksTableMech'])->name('view-trucks-mech'); //shows the trucks in mechanic
Route::get('/trucks/search', [Controller::class, 'index'])->name('search-trucks'); //search truck in mechanic
Route::get('/trucks/{id}/add-service', [Controller::class, 'showAddServiceForm'])->name('add-service'); //shows the add service form in mechanic
Route::post('/trucks/{id}/save-service', [Controller::class, 'saveService'])->name('save-service'); //saves the new service in mech
// Route::get('/trucks/{id}/add-service', [Controller::class, 'addService'])->name('add-service');
// Route::post('/trucks/{truck}/save-service', [Controller::class, 'saveService'])->name('save-service');


Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
// Route::get('/users-table', [AuthManager::class, 'userstable'])->name('users-table');
// Route::get('/register', [AuthManager::class, 'register'])->name('register');





// Route::get('/view-service-driver/{truck}', [Controller::class, 'showServices'])->name('view-service-driver');
Route::get('/truck-services-driver/{id}', [Controller::class, 'truckServicesdriver'])->name('truck-services-driver'); //used to see the serives done to the truck in admin

Route::get('/driver-dashboard', [Controller::class, 'showAssignedTruck'])->name('driver-dashboard')->middleware('auth');
Route::get('/trucks/{truck}/services', [Controller::class, 'showServices'])->name('truck.services');
// Route::get('/view-service-driver/{truck}', [Controller::class, 'redirectToViewServices'])->name('view-service-driver');