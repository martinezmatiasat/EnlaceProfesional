<!DOCTYPE html>
<html lang="es">
<head>
  <base href="">
  <meta charset="UTF-8">
  
  <title><?php echo isset($d->title) ? $d->title.' - '.get_sitename() : 'Bienvenido - '.get_sitename(); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <style>
    .btn {
      border-radius: 2px;
    }

    .bg-gradient {
      background: rgba(38, 38, 38, 1);
      background: -moz-linear-gradient(left, rgba(38, 38, 38, 1) 0%, rgba(28, 33, 28, 1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(38, 38, 38, 1)), color-stop(100%, rgba(28, 33, 28, 1)));
      background: -webkit-linear-gradient(left, rgba(38, 38, 38, 1) 0%, rgba(28, 33, 28, 1) 100%);
      background: -o-linear-gradient(left, rgba(38, 38, 38, 1) 0%, rgba(28, 33, 28, 1) 100%);
      background: -ms-linear-gradient(left, rgba(38, 38, 38, 1) 0%, rgba(28, 33, 28, 1) 100%);
      background: linear-gradient(to right, rgba(38, 38, 38, 1) 0%, rgba(28, 33, 28, 1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#262626', endColorstr='#1c211c', GradientType=1);
    }
  </style>
</head>

<body class="<?php echo isset($d->bg) && $d->bg === 'dark' ? 'bg-gradient' : 'bg-light' ?>" style="padding: 200px 0px;">
<!-- ends inc_header.php -->