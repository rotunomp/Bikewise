<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Rental Form Routes
 */

Route::get('/rentalForm', 'RentalFormController@getRentalForm');
Route::post('/rentalForm', 'RentalFormController@saveRental');
Route::get('/sendEmail', 'RentalFormController@sendEmail');
Route::get('/terms', 'RentalFormController@getTerms');

/*
 * Database Editor Routes
 */

Auth::routes();

Route::get('/database', 'DatabaseEditorController@getMainDatabasePage');

// Bicycles
Route::get('/database/bicycles', 'DatabaseEditorController@getBikeDatabasePage');
Route::post('/database/bicycles', 'DatabaseEditorController@storeBicycle');
Route::delete('/database/bicycles/{bicycle}', 'DatabaseEditorController@deleteBicycle');
Route::get('/database/bicycles/edit/{bicycle}', 'DatabaseEditorController@getBikeEditPage');
Route::patch('/database/bicycles/edit/{bicycle}', 'DatabaseEditorController@editBicycle');


// People
Route::get('/database/people', 'DatabaseEditorController@getPersonDatabasePage');
Route::post('/database/people', 'DatabaseEditorController@storePerson');
Route::delete('/database/people/{person}', 'DatabaseEditorController@deletePerson');
Route::get('/database/people/edit/{person}', 'DatabaseEditorController@getPersonEditPage');
Route::patch('/database/people/edit/{person}', 'DatabaseEditorController@editPerson');



// Accessories
Route::get('/database/accessories', 'DatabaseEditorController@getAccessoryDatabasePage');
Route::post('/database/accessories', 'DatabaseEditorController@storeAccessory');
Route::delete('/database/accessories/{accessory}', 'DatabaseEditorController@deleteAccessory');
Route::get('/database/accessories/edit/{accessory}', 'DatabaseEditorController@getAccessoryEditPage');
Route::patch('/database/accessories/edit/{accessory}', 'DatabaseEditorController@editAccessory');



// Rentals
Route::get('/database/rentals', 'DatabaseEditorController@getRentalDatabasePage');
Route::delete('/database/rentals/{rental}', 'DatabaseEditorController@deleteRental');
Route::get('/database/rentals/edit/{rental}', 'DatabaseEditorController@getRentalEditPage');
Route::patch('/database/rentals/edit/{rental}', 'DatabaseEditorController@editRental');

Route::get('/database/rentals/unpaid', 'DatabaseEditorController@getUnpaidRentalDatabasePage');
Route::get('/database/rentals/undelivered', 'DatabaseEditorController@getUndeliveredRentalDatabasePage');
Route::get('/database/rentals/unreturned', 'DatabaseEditorController@getUnreturnedRentalDatabasePage');




// Packages
Route::get('/database/packages', 'DatabaseEditorController@getPackageDatabasePage');
Route::get('/database/packageCreator', 'DatabaseEditorController@getPackageCreatorPage');
Route::post('/database/packageCreator', 'DatabaseEditorController@storePackage');
Route::get('/database/packages/edit/{package}', 'DatabaseEditorController@getPackageEditPage');
Route::patch('/database/packages/edit/{package}', 'DatabaseEditorController@editPackage');
Route::delete('/database/packages/{package}', 'DatabaseEditorController@deletePackage');
Route::get('/database/packages/{package}', 'DatabaseEditorController@getPackageDetailPage');

//Semesters
Route::get('/database/semesters', 'DatabaseEditorController@getSemesterDatabasePage');
Route::post('/database/semesters', 'DatabaseEditorController@storeSemester');
Route::delete('/database/semesters/{semester}', 'DatabaseEditorController@deleteSemester');
Route::get('/database/semesters/edit/{semester}', 'DatabaseEditorController@getSemesterEditPage');
Route::patch('/database/semesters/edit/{semester}', 'DatabaseEditorController@editSemester');


// Users
Route::get('/database/users', 'DatabaseEditorController@getUserDatabasePage');
Route::post('/database/users', 'DatabaseEditorController@storeUser');


