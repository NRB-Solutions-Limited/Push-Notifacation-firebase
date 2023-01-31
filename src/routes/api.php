<?php
use Illuminate\Support\Facades\Route;
use Nrbsolution\Push_notification\Http\Controllers\Api\PushNotificationApiController;


// Route::group(['prefix'=>'api'], function () {
// });
Route::prefix('api')->group(function () {
    Route::post('push_notification', [PushNotificationApiController::class, 'notification_send']);
});
