<?php
require_once 'vendor/autoload.php';

date_default_timezone_set('Asia/Tokyo');                    // (1)

use Carbon\Carbon;                                          // (2)

printf("Now: %s <br />", Carbon::now());                         // (3)

// (4)
printf("tomorrow : %s <br />", Carbon::now()->addDay());
printf("lastWeek : %s <br />", Carbon::now()->subWeek());

Carbon::setToStringFormat('Ymd');                           // (5)
printf("Now: %s <br />", Carbon::now());
printf("add 3 months : %s <br />", Carbon::now()->addMonths(3)); //（6）
Carbon::resetToStringFormat();                              // (7)
printf("add 3 months : %s <br />", Carbon::now()->addMonths(3));

$dt = Carbon::create(2013, 1, 20);                          // (8)
echo $dt->diffInDays(Carbon::now()). '<br />';                        // (9)
