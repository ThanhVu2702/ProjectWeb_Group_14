<?php
 require('../Carbon/autoload.php');
 use Carbon\Carbon;
 use Carbon\CarbonInterval;
 printf("Now: %s",Carbon::now());
 printf(" 1 days: %s", CarbonInterval::day()->forHumans());
?>