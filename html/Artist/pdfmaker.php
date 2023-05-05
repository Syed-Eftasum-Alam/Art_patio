<?php

    require_once ('Confiq.php');
    session_start();

    require_once('./dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $art= $_GET['artID'];
    $query = "SELECT * FROM arts WHERE artID = $art";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $art= $row['artID'];
    $artname=$row['title'];
    $artprice=$row['price'];
    $artdescription=$row['description'];
    $owner= $row['owner'];
    $artimg=$row['img'];
    $artID=$row['artID'];
    $artistID=$row['user_id'];
    $bid=$row['initalbid'];
    $arttype=$row['type'];
    $artheight=$row['height'];
    $artwidth=$row['width'];
    $item= "Art";


    $q2= "SELECT * FROM user_profile WHERE id = $owner";
    $r= mysqli_query($conn, $q2);
    $row2= mysqli_fetch_array($r);
    $ownername= $row2['name'];
    $owneraddress= $row2['address'];
    $owneremail= $row2['email'];

    $q3= "SELECT * FROM user_profile WHERE id = $artistID";
    $r3= mysqli_query($conn, $q3);
    $row3= mysqli_fetch_array($r3);
    $artistname= $row3['name'];

    ob_start();
    ?>
    <!-- <img src="logo1.png" alt=""> -->
    
	
			<h1>Invoice</h1>
            <br \>
			
				<b style=> Art Patio</b><br>
				<b>United International University<br>United City, Madani Ave, Dhaka 1212</b><br>
				<b>+8801624830751</b>
			
            <br \>
            <br \>
            <br \>
            <br \>
            <h5>Bill To :</h5>
            <br>
            <address contenteditable>
				<p><?php echo $ownername  ?></p>
                <p><?php echo $owneraddress  ?></p>
                <p><?php echo $owneremail  ?></p><br>
			</address>
			<!-- <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span> -->
		
		<article>
			
			<table class="meta">
				
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>0</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						
                        <th><span >Artist Name</span></th>
						<th><span >Art Title</span></th>
                        <th><span contenteditable>Art Height</span></th>
                        <th><span contenteditable>Art Width</span></th>
                        <th><span contenteditable>Art Type</span></th>
						
						
					</tr>
				</thead>
				<tbody>
					<tr>
                        
                        <td><span ><?php echo $artistname  ?></span></td>
						<td><span ><?php echo $artname  ?></span></td>
                        <td><span contenteditable><?php echo $artheight  ?></span></td>
                        <td><span contenteditable><?php echo $artwidth  ?></span></td>
                        <td><span contenteditable><?php echo $arttype  ?></span></td>
                        
						
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span><?php echo $artprice ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable><?php echo $artprice ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>$</span><span>0</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Thanks For choosing Art Patio</span></h1>
			
		</aside>

        <style>
            /* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
        </style>

    <?php
    $html=ob_get_clean();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream("Invoice",array("Attachment"=>0));

    // $pdf= $dompdf->output();
     //file_put_contents("newfilegen.pdf",$pdf);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    
</body>
</html>
