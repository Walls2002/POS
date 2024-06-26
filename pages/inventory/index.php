<?php
session_start();
if ($_SESSION["admin"]!=true) 
{
	header("location:../../");
}
$conn=mysqli_connect("localhost","root","","pos");
$sql = "SELECT * FROM products";
$result = $conn -> query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Point-Of-Sale | Inventory</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../style/inventory.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
	<link rel="icon" type="icon" href="../../media/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
	<script src="https://cdn.tutorialjinni.com/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<script src="script.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/time.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<script type="text/javascript" src="print-inventory.js"></script>
</head>

<body>
	
<nav>
  <header>
    <div class="nav1">
      <div>
        <img class="logo" src="../../media/logo_dids.png">
      </div>
    </div>
    <div class="nav2" id="nav2">
      <script>
        document.write(new Date().toDateString());
      </script>
      <div id="time"></div>
    </div>

  </header>
    <input type="checkbox" id="check" />
    <label for="check" class="menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
      </svg>
    </label>

    <div class="nav-items">
      <ul class="overview">


        <li>

          <a href="../home/"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.91 0 0 0.91 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15)" d="M 6 4 C 4.9069372 4 4 4.9069372 4 6 L 4 19 C 4 19.594202 4.2731287 20.127692 4.6933594 20.496094 C 4.2716045 20.862707 4 21.396978 4 22 L 4 24 C 4 25.105 4.895 26 6 26 L 24 26 C 25.105 26 26 25.105 26 24 L 26 22 C 26 21.396978 25.728396 20.862707 25.306641 20.496094 C 25.726871 20.127692 26 19.594202 26 19 L 26 6 C 26 4.9069372 25.093063 4 24 4 L 6 4 z M 6 6 L 24 6 L 24 19 L 6 19 L 6 6 z M 7 22 L 17 22 C 17.552 22 18 22.448 18 23 C 18 23.552 17.552 24 17 24 L 7 24 C 6.448 24 6 23.552 6 23 C 6 22.448 6.448 22 7 22 z M 23 22 C 23.552 22 24 22.448 24 23 C 24 23.552 23.552 24 23 24 C 22.448 24 22 23.552 22 23 C 22 22.448 22.448 22 23 22 z" stroke-linecap="round" />
              </g>
            </svg>
            Home</a>
        </li>
        <li>
          <a href="../inventory/">
            <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.83 0 0 0.83 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-14.99, -15)" d="M 4 4 C 3.639364083422431 3.994899710454515 3.303918635428393 4.184375296169332 3.122112278513483 4.495872849714331 C 2.9403059215985725 4.80737040325933 2.940305921598573 5.192629596740671 3.1221122785134834 5.504127150285671 C 3.303918635428394 5.815624703830669 3.6393640834224317 6.005100289545485 4.000000000000001 6 L 5 6 C 5.360635916577569 6.005100289545485 5.696081364571606 5.815624703830668 5.877887721486517 5.50412715028567 C 6.059694078401427 5.19262959674067 6.059694078401427 4.80737040325933 5.877887721486517 4.495872849714331 C 5.696081364571607 4.184375296169332 5.36063591657757 3.994899710454515 5 4 L 4 4 z M 9 4 C 8.63936408342243 3.994899710454515 8.303918635428394 4.184375296169332 8.122112278513482 4.495872849714331 C 7.940305921598572 4.80737040325933 7.940305921598573 5.192629596740671 8.122112278513484 5.504127150285671 C 8.303918635428394 5.815624703830669 8.639364083422432 6.005100289545485 9 6 L 18 6 C 18.360635916577568 6.005100289545485 18.696081364571608 5.815624703830668 18.877887721486516 5.50412715028567 C 19.059694078401428 5.19262959674067 19.059694078401428 4.80737040325933 18.877887721486516 4.495872849714331 C 18.696081364571608 4.184375296169332 18.360635916577568 3.994899710454515 18 4 L 9 4 z M 22 4 C 21.447715250169207 4 21 4.447715250169207 21 5 C 21 5.552284749830793 21.447715250169207 6 22 6 C 22.552284749830793 6 23 5.552284749830793 23 5 C 23 4.447715250169207 22.552284749830793 4 22 4 z M 26 4 C 25.447715250169207 4 25 4.447715250169207 25 5 C 25 5.552284749830793 25.447715250169207 6 26 6 C 26.552284749830793 6 27 5.552284749830793 27 5 C 27 4.447715250169207 26.552284749830793 4 26 4 z M 4 8 C 3.639364083422431 7.994899710454515 3.303918635428393 8.184375296169332 3.122112278513483 8.495872849714331 C 2.9403059215985725 8.80737040325933 2.940305921598573 9.192629596740671 3.1221122785134834 9.50412715028567 C 3.303918635428394 9.815624703830668 3.6393640834224317 10.005100289545485 4.000000000000001 10 L 5 10 C 5.360635916577569 10.005100289545485 5.696081364571606 9.815624703830668 5.877887721486517 9.504127150285669 C 6.059694078401427 9.192629596740671 6.059694078401427 8.80737040325933 5.877887721486517 8.495872849714331 C 5.696081364571607 8.184375296169332 5.36063591657757 7.994899710454515 5 8 L 4 8 z M 9 8 C 8.63936408342243 7.994899710454515 8.303918635428394 8.184375296169332 8.122112278513482 8.495872849714331 C 7.940305921598572 8.80737040325933 7.940305921598573 9.192629596740671 8.122112278513484 9.50412715028567 C 8.303918635428394 9.815624703830668 8.639364083422432 10.005100289545485 9 10 L 14 10 C 14.36063591657757 10.005100289545485 14.696081364571606 9.815624703830668 14.877887721486516 9.504127150285669 C 15.059694078401428 9.192629596740671 15.059694078401428 8.80737040325933 14.877887721486516 8.495872849714331 C 14.696081364571606 8.184375296169332 14.36063591657757 7.994899710454515 14 8 L 9 8 z M 22 8 C 21.447715250169207 8 21 8.447715250169207 21 9 C 21 9.552284749830793 21.447715250169207 10 22 10 C 22.552284749830793 10 23 9.552284749830793 23 9 C 23 8.447715250169207 22.552284749830793 8 22 8 z M 26 8 C 25.447715250169207 8 25 8.447715250169207 25 9 C 25 9.552284749830793 25.447715250169207 10 26 10 C 26.552284749830793 10 27 9.552284749830793 27 9 C 27 8.447715250169207 26.552284749830793 8 26 8 z M 4 12 C 3.639364083422431 11.994899710454515 3.303918635428393 12.184375296169332 3.122112278513483 12.495872849714331 C 2.9403059215985725 12.80737040325933 2.940305921598573 13.192629596740671 3.1221122785134834 13.50412715028567 C 3.303918635428394 13.815624703830668 3.6393640834224317 14.005100289545485 4.000000000000001 14 L 5 14 C 5.360635916577569 14.005100289545485 5.696081364571606 13.815624703830668 5.877887721486517 13.504127150285669 C 6.059694078401427 13.192629596740671 6.059694078401427 12.80737040325933 5.877887721486517 12.495872849714331 C 5.696081364571607 12.184375296169332 5.36063591657757 11.994899710454515 5 12 L 4 12 z M 9 12 C 8.63936408342243 11.994899710454515 8.303918635428394 12.184375296169332 8.122112278513482 12.495872849714331 C 7.940305921598572 12.80737040325933 7.940305921598573 13.192629596740671 8.122112278513484 13.50412715028567 C 8.303918635428394 13.815624703830668 8.639364083422432 14.005100289545485 9 14 L 18 14 C 18.360635916577568 14.005100289545485 18.696081364571608 13.815624703830668 18.877887721486516 13.504127150285669 C 19.059694078401428 13.192629596740671 19.059694078401428 12.80737040325933 18.877887721486516 12.495872849714331 C 18.696081364571608 12.184375296169332 18.360635916577568 11.994899710454515 18 12 L 9 12 z M 22 12 C 21.447715250169207 12 21 12.447715250169207 21 13 C 21 13.552284749830793 21.447715250169207 14 22 14 C 22.552284749830793 14 23 13.552284749830793 23 13 C 23 12.447715250169207 22.552284749830793 12 22 12 z M 26 12 C 25.447715250169207 12 25 12.447715250169207 25 13 C 25 13.552284749830793 25.447715250169207 14 26 14 C 26.552284749830793 14 27 13.552284749830793 27 13 C 27 12.447715250169207 26.552284749830793 12 26 12 z M 4 16 C 3.639364083422431 15.994899710454515 3.303918635428393 16.184375296169332 3.122112278513483 16.49587284971433 C 2.9403059215985725 16.80737040325933 2.940305921598573 17.192629596740673 3.1221122785134834 17.50412715028567 C 3.303918635428394 17.815624703830668 3.6393640834224317 18.005100289545485 4.000000000000001 18 L 5 18 C 5.360635916577569 18.005100289545485 5.696081364571606 17.815624703830668 5.877887721486517 17.50412715028567 C 6.059694078401427 17.19262959674067 6.059694078401427 16.80737040325933 5.877887721486517 16.49587284971433 C 5.696081364571607 16.184375296169332 5.36063591657757 15.994899710454515 5 16 L 4 16 z M 9 16 C 8.63936408342243 15.994899710454515 8.303918635428394 16.184375296169332 8.122112278513482 16.49587284971433 C 7.940305921598572 16.80737040325933 7.940305921598573 17.192629596740673 8.122112278513484 17.50412715028567 C 8.303918635428394 17.815624703830668 8.639364083422432 18.005100289545485 9 18 L 16 18 C 16.360635916577568 18.005100289545485 16.696081364571608 17.815624703830668 16.877887721486516 17.50412715028567 C 17.059694078401428 17.19262959674067 17.059694078401428 16.80737040325933 16.877887721486516 16.49587284971433 C 16.696081364571608 16.184375296169332 16.360635916577568 15.994899710454515 16 16 L 9 16 z M 22 16 C 21.447715250169207 16 21 16.447715250169207 21 17 C 21 17.552284749830793 21.447715250169207 18 22 18 C 22.552284749830793 18 23 17.552284749830793 23 17 C 23 16.447715250169207 22.552284749830793 16 22 16 z M 26 16 C 25.447715250169207 16 25 16.447715250169207 25 17 C 25 17.552284749830793 25.447715250169207 18 26 18 C 26.552284749830793 18 27 17.552284749830793 27 17 C 27 16.447715250169207 26.552284749830793 16 26 16 z M 4 20 C 3.639364083422431 19.994899710454515 3.303918635428393 20.184375296169332 3.122112278513483 20.49587284971433 C 2.9403059215985725 20.80737040325933 2.940305921598573 21.192629596740673 3.1221122785134834 21.50412715028567 C 3.303918635428394 21.815624703830668 3.6393640834224317 22.005100289545485 4.000000000000001 22 L 5 22 C 5.360635916577569 22.005100289545485 5.696081364571606 21.815624703830668 5.877887721486517 21.50412715028567 C 6.059694078401427 21.19262959674067 6.059694078401427 20.80737040325933 5.877887721486517 20.49587284971433 C 5.696081364571607 20.184375296169332 5.36063591657757 19.994899710454515 5 20 L 4 20 z M 9 20 C 8.63936408342243 19.994899710454515 8.303918635428394 20.184375296169332 8.122112278513482 20.49587284971433 C 7.940305921598572 20.80737040325933 7.940305921598573 21.192629596740673 8.122112278513484 21.50412715028567 C 8.303918635428394 21.815624703830668 8.639364083422432 22.005100289545485 9 22 L 16 22 C 16.360635916577568 22.005100289545485 16.696081364571608 21.815624703830668 16.877887721486516 21.50412715028567 C 17.059694078401428 21.19262959674067 17.059694078401428 20.80737040325933 16.877887721486516 20.49587284971433 C 16.696081364571608 20.184375296169332 16.360635916577568 19.994899710454515 16 20 L 9 20 z M 22 20 C 21.447715250169207 20 21 20.447715250169207 21 21 C 21 21.552284749830793 21.447715250169207 22 22 22 C 22.552284749830793 22 23 21.552284749830793 23 21 C 23 20.447715250169207 22.552284749830793 20 22 20 z M 26 20 C 25.447715250169207 20 25 20.447715250169207 25 21 C 25 21.552284749830793 25.447715250169207 22 26 22 C 26.552284749830793 22 27 21.552284749830793 27 21 C 27 20.447715250169207 26.552284749830793 20 26 20 z M 4 24 C 3.639364083422431 23.994899710454515 3.303918635428393 24.184375296169332 3.122112278513483 24.49587284971433 C 2.9403059215985725 24.80737040325933 2.940305921598573 25.192629596740673 3.1221122785134834 25.50412715028567 C 3.303918635428394 25.815624703830668 3.6393640834224317 26.005100289545485 4.000000000000001 26 L 5 26 C 5.360635916577569 26.005100289545485 5.696081364571606 25.815624703830668 5.877887721486517 25.50412715028567 C 6.059694078401427 25.19262959674067 6.059694078401427 24.80737040325933 5.877887721486517 24.49587284971433 C 5.696081364571607 24.184375296169332 5.36063591657757 23.994899710454515 5 24 L 4 24 z M 9 24 C 8.63936408342243 23.994899710454515 8.303918635428394 24.184375296169332 8.122112278513482 24.49587284971433 C 7.940305921598572 24.80737040325933 7.940305921598573 25.192629596740673 8.122112278513484 25.50412715028567 C 8.303918635428394 25.815624703830668 8.639364083422432 26.005100289545485 9 26 L 18 26 C 18.360635916577568 26.005100289545485 18.696081364571608 25.815624703830668 18.877887721486516 25.50412715028567 C 19.059694078401428 25.19262959674067 19.059694078401428 24.80737040325933 18.877887721486516 24.49587284971433 C 18.696081364571608 24.184375296169332 18.360635916577568 23.994899710454515 18 24 L 9 24 z M 22 24 C 21.447715250169207 24 21 24.447715250169207 21 25 C 21 25.552284749830793 21.447715250169207 26 22 26 C 22.552284749830793 26 23 25.552284749830793 23 25 C 23 24.447715250169207 22.552284749830793 24 22 24 z M 26 24 C 25.447715250169207 24 25 24.447715250169207 25 25 C 25 25.552284749830793 25.447715250169207 26 26 26 C 26.552284749830793 26 27 25.552284749830793 27 25 C 27 24.447715250169207 26.552284749830793 24 26 24 z" stroke-linecap="round" />
              </g>
            </svg>
            Inventory</a>
        </li>
        <li>
          <a href="../supplier/"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.83 0 0 0.83 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -16.5)" d="M 4 6 L 4 7 L 4 17 L 16 17 L 16 6 L 4 6 z M 23 6 C 20.802666 6 19 7.8026661 19 10 C 19 11.151992 19.510768 12.176056 20.298828 12.908203 C 18.948528 13.80602 18 15.266416 18 17 L 20 17 C 20 15.331516 21.331516 14 23 14 C 24.668484 14 26 15.331516 26 17 L 28 17 C 28 15.266416 27.051472 13.80602 25.701172 12.908203 C 26.489232 12.176056 27 11.151992 27 10 C 27 7.8026661 25.197334 6 23 6 z M 6 8 L 14 8 L 14 15 L 6 15 L 6 8 z M 23 8 C 24.116666 8 25 8.8833339 25 10 C 25 11.116666 24.116666 12 23 12 C 21.883334 12 21 11.116666 21 10 C 21 8.8833339 21.883334 8 23 8 z M 8 10 L 8 12 L 12 12 L 12 10 L 8 10 z M 23 17.585938 L 19 21.585938 L 20.414062 23 L 22 21.414062 L 22 25 L 11 25 L 11 19 L 9 19 L 9 27 L 24 27 L 24 21.414062 L 25.585938 23 L 27 21.585938 L 23 17.585938 z" stroke-linecap="round" />
              </g>
            </svg>
            Supplier</a>
        </li>
        <li>
          <a href="../transaction/"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.77 0 0 0.77 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -16)" d="M 24 3 L 20 7 L 24 11 L 24 8 L 28 8 L 28 6 L 24 6 L 24 3 z M 12 4 C 7.5935666 4 4 7.5935666 4 12 C 4 16.406433 7.5935666 20 12 20 C 16.406433 20 20 16.406433 20 12 C 20 7.5935666 16.406433 4 12 4 z M 12 6 C 15.325553 6 18 8.6744469 18 12 C 18 15.325553 15.325553 18 12 18 C 8.6744469 18 6 15.325553 6 12 C 6 8.6744469 8.6744469 6 12 6 z M 9.9003906 8.5 L 9.1992188 12.400391 L 12.300781 12.400391 C 12.600781 12.400391 12.900391 12.7 12.900391 13 C 12.900391 13.3 12.600781 13.599609 12.300781 13.599609 L 11.699219 13.599609 C 11.299219 13.499609 11.099609 13.3 11.099609 13 L 9.0996094 13 C 9.0996094 14.5 10.199219 15.599609 11.699219 15.599609 L 12.300781 15.599609 C 13.800781 15.499609 14.900391 14.4 14.900391 13 C 14.900391 11.8 14.1 10.8 13 10.5 L 14 10.5 L 14 8.5 L 9.9003906 8.5 z M 21.798828 14 C 21.656828 14.696 21.437203 15.364 21.158203 16 L 26 16 L 26 26 L 16 26 L 16 21.158203 C 15.364 21.437203 14.696 21.656828 14 21.798828 L 14 28 L 28 28 L 28 14 L 21.798828 14 z M 20 18 C 19.639364083422432 17.994899710454515 19.303918635428392 18.184375296169332 19.122112278513484 18.49587284971433 C 18.940305921598572 18.80737040325933 18.940305921598572 19.192629596740673 19.122112278513484 19.50412715028567 C 19.303918635428396 19.815624703830668 19.639364083422432 20.005100289545485 20 20 L 22 20 C 22.360635916577568 20.005100289545485 22.696081364571608 19.815624703830668 22.877887721486516 19.50412715028567 C 23.059694078401428 19.19262959674067 23.059694078401428 18.80737040325933 22.877887721486516 18.49587284971433 C 22.696081364571608 18.184375296169332 22.360635916577568 17.994899710454515 22 18 L 20 18 z M 8 21 L 8 24 L 4 24 L 4 26 L 8 26 L 8 29 L 12 25 L 8 21 z" stroke-linecap="round" />
              </g>
            </svg>
            Transaction</a>
        </li>
        <li>
          <a href="../accounts/"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
              <g transform="matrix(0.67 0 0 0.67 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-16, -16)" d="M 9 7 C 5.699219 7 3 9.699219 3 13 C 3 14.984375 3.976563 16.75 5.46875 17.84375 C 2.832031 19.152344 1 21.863281 1 25 L 3 25 C 3 21.675781 5.675781 19 9 19 C 12.324219 19 15 21.675781 15 25 L 17 25 C 17 21.675781 19.675781 19 23 19 C 26.324219 19 29 21.675781 29 25 L 31 25 C 31 21.863281 29.167969 19.152344 26.53125 17.84375 C 28.023438 16.75 29 14.984375 29 13 C 29 9.699219 26.300781 7 23 7 C 19.699219 7 17 9.699219 17 13 C 17 14.984375 17.976563 16.75 19.46875 17.84375 C 18.011719 18.566406 16.789063 19.707031 16 21.125 C 15.210938 19.707031 13.988281 18.566406 12.53125 17.84375 C 14.023438 16.75 15 14.984375 15 13 C 15 9.699219 12.300781 7 9 7 Z M 9 9 C 11.222656 9 13 10.777344 13 13 C 13 15.222656 11.222656 17 9 17 C 6.777344 17 5 15.222656 5 13 C 5 10.777344 6.777344 9 9 9 Z M 23 9 C 25.222656 9 27 10.777344 27 13 C 27 15.222656 25.222656 17 23 17 C 20.777344 17 19 15.222656 19 13 C 19 10.777344 20.777344 9 23 9 Z" stroke-linecap="round" />
              </g>
            </svg>
            Account</a>
        </li>
        <li>
          <a href="../charts/"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.43 0 0 0.43 12 12)">
                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 23 2 C 11.413593 2 2 11.413593 2 23 L 2 24 L 24 24 L 24 23 L 24 2 L 23 2 z M 22 4.0996094 L 22 22 L 4.0996094 22 C 4.6111411 12.30882 12.30882 4.6111411 22 4.0996094 z M 27 6 C 26.662 6 26.334 6.0347813 26 6.0507812 L 26 8.0507812 C 26.333 8.0327812 26.662 8 27 8 C 37.477 8 46 16.523 46 27 C 46 37.477 37.477 46 27 46 C 16.523 46 8 37.477 8 27 C 8 26.662 8.0327813 26.333 8.0507812 26 L 6.0507812 26 C 6.0347812 26.334 6 26.662 6 27 C 6 38.58 15.42 48 27 48 C 38.58 48 48 38.58 48 27 C 48 15.42 38.58 6 27 6 z" stroke-linecap="round" />
              </g>
            </svg>
            Chart</a>
        </li>
        <li>
          <a href="#" class="logout"><svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
              <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


              <g transform="matrix(0.91 0 0 0.91 12 12)">
                <path style="stroke: rgb(255,255,255); stroke-width: 2; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 14.5 4.707 L 14.5 1 L 1.5 1 L 1.5 23 L 14.5 23 L 14.5 19.707 M 6.5 12 L 22.5 12 M 16.5 6 L 22.5 12 L 16.5 18" stroke-linecap="round" />
              </g>
            </svg>
            Logout</a>
        </li>
      </ul>

    </div>
  </nav>
	<main>
		<div class="container">
			<div class="page-header">
				<h2><i class="fa fa-cubes"></i> Product List</h2>      
			</div>
			<div style="padding: 0;" class="container alert2">
			</div>
			<div style="padding: 0;" class="container alert1">
			</div>
			<div style="padding: 0;" class="container modal-btn">

				<!-- Extra large modal -->
				<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Add Stock</h4>
							</div>
							<div class="modal-body">
								<label for="code">Barcode</label>
								<div class="input-group mb-3">
									<input  style="width: 68%;min-width:77%;" id="add-stock-code" type="text" name="code" class="form-control" placeholder="Scan Barcode First">
									<div class="input-group-append">
										<button class="btn btn-primary" id="add-stock" onclick="add_stock();">Search</button>
									</div>
								</div>
								
								<table class="table-modal">
									<tr>
										<td><label for="name-stock">Code: </label> </td>
										<td><span id="code-stock"></span></td>
									</tr>
									<tr>
										<td><label for="name-stock">Name: </label> </td>
										<td><span id="name-stock"></span></td>
									</tr>
									<tr>
										<td><label for="desc-stock">Description: </label></td>
										<td><span id="desc-stock"></span> </td>
									</tr>
									<tr>
										<td><label for="current-stock">Remaining Stocks: </label></td>
										<td><span  id="current-stock"></span></td>
									</tr>
									<tr>
										<td><label for="max-stock">Maximum Stocks: </label></td>
										<td>	<span id="max-stock"></span></td>
									</tr>
									<tr>
										<td><label for="new-stock-expiry">Expiry: </label></td>
										<td><input id="new-stock-expiry" class="form-control" type="date" name="" disabled="true"></td>
									</tr>
									<tr>
										<td><label style="margin-right: 10px;" for="qty-stock">Add Stock Qty:</label> </td>
										<td><input onkeydown="if(event.key==='.'){event.preventDefault();}" min="0" class="form-control form-control-sm" type="number" id="add-stock-input" disabled="true"></td>
									</tr>
									<tr style="display: none;">
										<td>Total Stock:</td>
										<td></td>
									</tr>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" id="close-stock-modal" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id="add-stock-btn" class="btn btn-success" >Add Stock</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Add Product Modal-->
				<div class="modal fade" id="myModal" role="dialog">

					<div class="modal-dialog">

						<!--Modal content-->
						<div class="modal-content">

							<div class="modal-header">
								<h4 class="modal-title">Add Product</h4>
							</div>
							<div class="modal-body">
								<label for="add-barcode">Barcode</label>
								<input class="form-control" type="text" name="barcode" id="add-barcode" >

								<label for="add-prodname">Product Name</label>
								<input class="form-control" type="text" name="barcode" id="add-prodname">

								<label for="add-desc">Description</label>
								<input class="form-control" type="text" name="barcode" id="add-desc">

								<label for="add-category">Category</label>
								<select class="form-control" id="add-category">
									<option></option>
									<option >Snacks</option>
									<option >Bottled Beverage</option>
									<option >Noodles</option>
									<option >Canned Goods</option>
									<option >Dairy</option>
									<option >Frozen Food</option>
									<option >Hygiene</option>
									<option >Formula Milk</option>
									<option >Cosmetics</option>
									<option >Condiments</option>
									<option >Others</option>
								</select>

								<label for="add-price">Price (Php)</label>
								<input class="form-control" type="number" name="barcode" id="add-price">

								<label for="add-unit">Unit</label>
								<select class="form-control" id="add-unit">
									<option></option>
									<option>Per Piece</option>
									<option>Per Pack</option>
									<option>Per Bottle</option>
								</select>

								<label for="add-stocks">Stocks</label>
								<input class="form-control" type="number" name="barcode" id="add-stocks">

								<label for="add-maxstocks">Max Stocks</label>
								<input class="form-control" type="number" name="barcode" id="add-maxstocks">

								<label for="add-expiry">Expiration Date</label>
								<input class="form-control" type="date" name="barcode" id="add-expiry">

								<label for="add-supplier">Supplier</label>
								<select class="form-control" id="add-supplier">
									<option></option>
									<?php
									$sql2 = "SELECT * FROM supplier";
									$result1 = $conn -> query($sql2);
									if ($result -> num_rows > 0) 
									{
										while ($row1 = $result1 -> fetch_assoc()) 
										{
											?>
											<option><?php echo $row1["company_name"]; ?></option>
											<?php
										}
									}
									?>
								</select>

							</div>
							<div class="modal-footer">
								<button type="button" id="modal-exit" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id="btn-add-prod" class="btn btn-success" >Add</button>
							</div>
						</div>

					</div>

				</div>

				<!-- Edit Product Modal-->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="exampleModalLongTitle">Update Product</h4>
							</div>
							<div class="modal-body">
								<label for="update-code">Barcode:</label>
								<input type="text" class="form-control" name="" id="update-code" placeholder="New Barcode">

								<label for="update-name">Brand Name:</label>
								<input type="text" class="form-control" name="" id="update-name" placeholder="New Name">

								<label for="update-desc">Description:</label>
								<input type="text" class="form-control" name="" id="update-desc" placeholder="New Description">

								<label for="update-category">Category:</label>
								<select class="form-control" id="update-category">
									<option ></option>
									<option >Snacks</option>
									<option >Bottled Beverage</option>
									<option >Noodles</option>
									<option >Canned Goods</option>
									<option >Dairy</option>
									<option >Frozen Food</option>
									<option >Hygiene</option>
									<option >Formula Milk</option>
									<option >Cosmetics</option>
									<option >Condiments</option>
									<option >Others</option>
								</select>
								<label for="update-unit">Unit</label>
								<select class="form-control" id="update-unit">
									<option></option>
									<option>Per Piece</option>
									<option>Per Pack</option>
									<option>Per Bottle</option>
								</select>
								<label for="update-price">Price (Php)</label>
								<input class="form-control" type="number" name="barcode" id="update-price" placeholder="New Price">

								<label for="update-max">Max Stock</label>
								<input class="form-control" type="number" name="barcode" id="update-max" placeholder="New Max Stock">

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-success save-edit">Save changes</button>
							</div>
						</div>
					</div>
				</div>

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Product</button>
				<button type="button" id="stock-modal" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-plus-square"></i> Add Stocks</button>
			</div>

			<table id="myTable" class="table table-striped">
				<thead>
					<tr>
						<th>Barcode</th>
						<th>Brand Name</th>
						<th>Description</th>
						<th>Category</th>
						<th>Sell Price</th>
						<th>Unit</th>
						<th>Stocks</th>
						<th>Max Stocks</th>
						<th>Expiration</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
					<?php
					if ($result -> num_rows > 0) 
					{
						while ($row = $result -> fetch_assoc()) 
						{
							?>
							<tr id="<?php echo $row["code"];?>">
								<td><span><?php echo $row["code"]; ?></span></td>
								<td><span><?php echo $row["prod_name"]; ?></span></td>
								<td><span><?php echo $row["description"]; ?></span></td>
								<td><span><?php echo $row["category"]; ?></span></td>
								<td>Php <span><?php echo $row["price"]; ?></span></td>
								<td><span><?php echo $row["unit"]; ?></span></td>
								<td><span><?php echo $row["current_stocks"]; ?></span></td>
								<td><span><?php echo $row["max_stocks"]; ?></span></td>
								<td><span><?php echo $row["expiration"]; ?></span></td>
								<td><button  data-toggle="modal" data-target="#exampleModalCenter" id="edit-btn" class="btn btn-info"><i style="font-size: 15px;" class='fas fa-pen'></i></button>
								  <button id="delete" type="button" class="btn btn-danger"><i style="font-size: 15px;" class='far fa-trash-alt'></i></button>
								</td>
							</tr>
							<?php
						}
					}

					?>

				</tbody>
			</table>
			<div style="padding: 0;" class="container">
				<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="exampleModalLongTitle">Other Product Information</h4>
							</div>
							<div class="modal-body">
								<table id="myTable2" class="table table-striped">
									<thead>
										<tr>
											<th>Barcode</th>
											<th>Brand Name</th>
											<th>Supplier</th>
										</tr>
									</thead>
									<tbody id="tbody2">
										<?php
										$sql3 = "SELECT * FROM products";
										$result3 = $conn -> query($sql3);
										if ($result3 -> num_rows > 0) 
										{
											while ($row3 = $result3-> fetch_assoc()) 
											{
												?>
												<tr id='<?php echo $row3['id'];?>'>
													<td><span><?php echo $row3["code"]; ?></span></td>
													<td><span><?php echo $row3["prod_name"]; ?></span></td>
													<td><span><?php echo $row3["supplier"]; ?></span></td>
												</tr>
												<?php
											}
										}
										?>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>
				</div>
				<button data-toggle="modal" data-target="#exampleModalCenter1" class="btn btn-info">Products Other Info</button>
				
			</div>

		</div>
	</main>
	<div class="footer">
  <p>Copyright ©2022 Team Yutz Developer</p>
</div>
	<div class="custom-shape-divider-bottom-1667704152">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
</body>
</html>