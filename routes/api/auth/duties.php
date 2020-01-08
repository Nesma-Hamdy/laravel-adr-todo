<?php

Route::get('/duties', \App\Duties\Actions\IndexDutyAction::class);
Route::post('/duties', \App\Duties\Actions\CreateDutyAction::class);
Route::post('/duties/{id}', \App\Duties\Actions\EditDutyAction::class);
Route::delete('/duties/{id}', \App\Duties\Actions\DeleteDutyAction::class);