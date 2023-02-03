<?php
header('Content-dispostion: attachment; filename = Pack_Benchmark.rar');
header('Content-type: application/x-rar-compressed');
readfile('../Downloads/Pack_Benchmark.rar')
?>