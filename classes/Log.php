<?php
class Log {
  public static function writeCSV($e) {
    $date = new DateTime();
    $date -> setTimeZone(new DateTimeZone('Europe/Paris'));
    $log = array(
       "date" => $date -> format('Y-m-d H:i:s'),
       "message" => $e -> getMessage()
     );
     $log_file = fopen('./logs/logs_'.$date -> format('d-m-y').".csv", "a+");
     fputcsv($log_file, $log, ",");
     fclose($log_file);
  }
}
 ?>
