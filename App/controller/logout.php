<?php

session_start();
//$_SESSION['email'] = "";
//unset($_SESSION['email']);//destroi uma sessão especifica
session_destroy();//destroi todas as sessões
header("Location: ../view/index.php");//volta pra index
exit();