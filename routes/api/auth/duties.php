<?php

Route::get('/duties', \App\Duties\Actions\IndexDutyAction::class);
Route::post('/duties', \App\Duties\Actions\CreateDutyAction::class);
Route::post('/duties/{duty}', \App\Duties\Actions\EditDutyAction::class);
Route::delete('/duties/{duty}', \App\Duties\Actions\DeleteDutyAction::class);