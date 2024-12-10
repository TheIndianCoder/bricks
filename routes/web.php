<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\LandOwner\LandOwnerController;
use App\Http\Controllers\Sand\SandTipController;
use App\Http\Controllers\Sardat\SardarListController;
use App\Http\Controllers\Soil\SoilOwnersController;
use App\Http\Controllers\Vehical\VehicalGroupController;
use App\Http\Controllers\Vehical\VehicalListController;
use App\Http\Controllers\Vehical\VehicalOwnerController;
use App\Models\Vehical\VehicalList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::controller(SardarListController::class)->group(function(){
    Route::get('sardar-list','sardarList')->name('sardar.list');
    Route::post('add-sardar','addSardar')->name('sardar.add');
    Route::post('update-sardar','updateSardar')->name('sardar.update');    
});

// Employee Controller ====================================================================
Route::controller(EmployeeController::class)->group(function(){
    // Employee group
    Route::get('employee-group','groupList')->name('employee.group.list');
    Route::post('employee-group-add','groupAdd')->name('employee.group.add');
    Route::post('employee-group-edit','groupEdit')->name('employee.group.edit');
    Route::get('change-status/{id}','changeGroupStatus')->name('employee.group.status');
    
    // Employee list
    Route::get('add-employee','addView')->name('employee.addView');
    Route::post('add-employee','add')->name('employee.add');
    Route::get('employee-list','list')->name('employee.list');
    Route::get('employee-edit/{id}','editView')->name('employee.editView');
    Route::post('employee-edit','edit')->name('employee.edit');
});

// Transport Section ===================================================================
// Vehical Group
Route::controller(VehicalGroupController::class)->group(function(){
    Route::get('vehical-group','vehicalGList')->name('vehical.G.list');
    Route::post('vehical-group-add','addVehicalGroup')->name('vehical.G.Add');
    Route::post('edit-vehical-group','editVehiclGroup')->name('vehical.G.edit');    
});
// Vehical Owner 
Route::controller(VehicalOwnerController::class)->group(function(){
    Route::get('vehical-owner-list','ownerList')->name('vehical.ownerList');
    Route::post('vehical-owner-add','addOwner')->name('vehical.addOwner');
    Route::post('edit-vehical-owner','editOwner')->name('vehical.editOwner');
});
// Vehical List
Route::controller(VehicalListController::class)->group(function(){
    Route::get('vehical-list','vehicalList')->name('vehical.vehicalList');
    Route::post('vehical-add','addVehical')->name('vehical.VehicalAdd');
    Route::get('vehical-list-edit/{id}','vehicalEditView')->name('vehical.vehicalEditView');
    Route::post('vehical-list-edit','vehicalListEdit')->name('vehical.vehicalListEdit');
});
// land owners
Route::controller(LandOwnerController::class)->group(function(){
    Route::get('land-owners','landOwners')->name('landOwner.list');
    Route::post('add-land-owner','addLandOwner')->name('landOwner.add');
    Route::post('edit-land-owner','editLandOwner')->name('landOwner.edit');
    Route::post('change-status','changeStatus')->name('landOwner.status');
    
});
// Soail owner 
Route::controller(SoilOwnersController::class)->group(function(){
    Route::get('soil-owner-list','soilOwnerList')->name('soilOwner.list');
    Route::post('add-soil-owner','addSoilOwner')->name('soilOwner.add');
    Route::post('update-soil-owner','updateSoilOwner')->name('soilOwner.update');
    Route::post('soil-owner-change-status','changeStatus')->name('soilOwner.change.status');
});
// Sand owner
Route::controller(SandTipController::class)->group(function(){
    Route::get('sand-tip-list','sandTipList')->name('sandTip.list');
    Route::post('add-sand-tip','addSandTip')->name('sandTip.add');
    Route::post('update-sand-tip','updateSandTip')->name('sandTip.update');
    Route::post('change-sand-tip-status','changeStatus')->name('sandTip.ctatus');
});