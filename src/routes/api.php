<?php
use Fnnaeem1881\Push_notification\Http\Controllers\Api\PushNotificationApiController;
use Illuminate\Support\Facades\Route;


// Route::group(['prefix'=>'api'], function () {
// });
Route::prefix('api')->group(function () {
    Route::post('push_notification', [PushNotificationApiController::class, 'notification_send']);
});
