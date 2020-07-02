<?php
error_reporting(0);
    
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


    if(isset($_POST['daftar'])){
    $link = $_POST['inputLink'];

   $getId = substr($link,31,9);
    //echo $getId;

    $msg_type="";
    $msg_content="";

function downloadFile($file_url, $dir_location='') {
    $returns = array();
    if (!empty($dir_location) AND !is_dir($dir_location)) {
        if(!mkdir($dir_location, 0777, true)) {
            $returns['status'] = 'error';
            $returns['message'] = 'gagal membuat folder '.$dir_location;
            return $returns;
        }
    }
    
    $url = filter_var($file_url, FILTER_SANITIZE_URL);    
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        $returns['status'] = 'error';
        $returns['message'] = 'URL tidak valid';
        return $returns;
        $msg_type = 'error';
        $msg_content= 'http2';
    }
    $path = parse_url($file_url, PHP_URL_PATH);
    $eks = ".pdf";
    $file_name = basename($path.$eks);//pathinfo($file_url, PATHINFO_FILENAME);//filename
    $file_ext = pathinfo($file_url, PATHINFO_EXTENSION);//ext
    $file_ext = strtolower($file_ext);
    
    if (empty($file_name)) {
        $returns['status'] = 'error';
        $returns['message'] = 'Nama file tidak valid';
        return $returns;
    }
    
    if (strpos($file_ext, '?')!==false) {
        $file_ext = substr($file_ext,0,strpos($file_ext, '?'));
    }
    
    $ch = curl_init ();
    curl_setopt($ch, CURLOPT_URL,$file_url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36');
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    //curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $raw = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close ($ch);
    
    if (!empty($curl_error) OR $http_status!=200) {
        $returns['status'] = 'error';
        $returns['message'] = 'http status: '.$http_status.' '.$curl_error.$file_url;
        return $data;

            

    }
    $saveto = $dir_location.$file_name;
    if (file_exists($saveto)) {
        @unlink($saveto);
    }
    
    @file_put_contents($saveto, $raw);
    
    if (!is_file($saveto)) {
        $returns['status'] = 'error';
        $returns['message'] = 'Gagal simpan gambar';
        return $returns;
        $msg_type = 'error';
        $msg_content= 'http1';
    }
    
    $returns['status'] = 'ok';
    $returns['message'] = 'success';
    $returns['file_url'] = $file_url;
    $returns['dir_location'] = $dir_location;    
    $returns['file_name'] = $file_name;
    $returns['saveto'] = $saveto;
    
    return $returns;
}
$dir_location = 'download/';
$file_url = 'https://www.scribd.com/document_downloads/direct/'.$getId.'?extension=pdf&ft=1593674132&lt=1593677742&uahk=Rh1DZfricTC7YBT-5zPAEMHdspk';
if (isset($_GET['url'])) {
    $file_url = $_GET['url'];
}
$downloadFile = downloadFile($file_url, $dir_location);
if (isset($downloadFile['saveto'])) {
   $download = '<a href="'.$downloadFile['saveto'].'" class="btn btn-outline-primary mt-3">Download Here</a>';
   $msg_content = "<br>File berhasil di download";
   $msg_type= "success";
}else{
   $msg_content = "<br>file gagal didownload";
   $msg_type= "error";
}


    //header( "HTTP/1.1 301 Moved Permanently" );
    //header( "Location: https://www.scribd.com/document_downloads/direct/454402933?extension=pdf&ft=1593664908&lt=1593668518&uahk=2J3_nwzYzcAnFVmJVSW3PjZMvjQ" );

	}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://getbootstrap.com//docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="https://getbootstrap.com//docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   <form method="post" class="form-signin" name="daftar" action="">
  <h1 class="h3 mb-3 font-weight-normal">Scribd Downloader</h1>
    <?php 
										if($msg_type == "success") {
										?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                        <span class="alert-inner--text"><strong>Success!</strong> <?php echo $msg_content; ?></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
										
										<?php
										} else if ($msg_type == "error") {
										?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong>GAGAL !</strong> <?php echo $msg_content; ?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
										<?php
										} else if ($msg_type == "limit"){
										?>
											<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<meta http-equiv="Refresh" content="60; URL=https://rizkyjounioselabu.xyz/rpl/tembak.php">
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if($msg_type == "namakosong" || $msg_type == "emailkosong" || $msg_type == "passwordkosong" || $msg_type == "idktpkosong"){
										?>
											<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
  <label for="inputLink" class="sr-only">Link Scribd</label>
  <input type="text" id="inputLink" name="inputLink" class="form-control mb-3" placeholder="Link Scribd" <required autofocus>
  <button class="btn btn-lg btn-primary btn-block " name="daftar" value="daftar" type="submit">Get File Scribd</button>
  <?php echo $download; ?>
</form>
</body>
</html>
