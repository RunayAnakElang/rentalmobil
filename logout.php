<?php
//hapus cookie (namacookie, kosongkanvalue, waktu yang telah lewat)
setcookie('rental', '', time() - 10);
