<?php
include_once 'invoicec.php';
include_once '../model/invoice_db.php';
$invoice_obj=new view_invoice();
$invoice_obj2=new invoicedb();
$invoice_obj2 -> Getinfo($a,$b,$c,$d,$e,$f,$g,$h);
//print_r($a);
$html="";

//echo count($a);

$l= count($a)-1;
//echo $b[l];
if ($c[$l] == "1")
{
	$tc="Blood package.";
}
if ($c[$l] == "2")
{
	$tc="Diapitic package.";
}
if ($d[$l] == "1")
{
	$td="kidney function test.";
}
else
{
	$td=" ";
}
if ($e[$l] == "1")
{
	$te="liver function test.";
}
else
{
	$te=" ";
}
$html.=$invoice_obj->invoice_html($a[$l],$b[$l],$tc,$td,$te,$f[$l],$g[$l],$h[$l]);

echo $html;
