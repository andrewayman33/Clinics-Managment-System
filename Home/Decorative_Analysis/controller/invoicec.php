<?php
class view_invoice{
	public function invoice_html($a,$b,$c,$d,$e,$f,$g,$h)
	{


$html='<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;

    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    h4 {text-align: center;}
    h5 {text-align: center;}
    h6 {text-align: center;}
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                ST.George <br>
                                Laboratory<br>
                            </td>
                            
                            <td>
                                <img src="../../../assets/img/kisspng-church-of-god-inc-west-minot-church-of-god-christi-church-5acf5ae9c28af8.5303976815235386657969.png" style="width:100%; max-width:100px;">
                                <br>
                                 Invoice NO : '.$g.'<br>
                                Time Stamp : '.$h.'<br>
                                
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                           
                            
                            <td>
                               
                                <br>

                                patient Name : '.$a.'
                                <br>
                                patient ID : '.$b.'
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
           
            
            
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   '.$c.'
                </td>
                
                <td>
                  
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    '.$d.'
                </td>
                
                <td>
                  
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                      '.$e.'
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: '.$f.'
                </td>
            </tr>
        </table>
        <h3>supervisor : DR.Kamal</h3>
        <h4 class="header">Your Helath Matter</h4>
          <h5>The Result After Three Days</h5>                
        <h6 class="header">NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</h6>
    </div>
</body>
</html>
';
return $html;
}
public function resiving()
{


  if (isset ($_POST["submit"]))
  {
    if(!empty($_POST["package"]))
    {
      foreach ($_POST["package"] as $package) {
        //echo '<p>'.$package.'</p>';
      }
    }
    
    return $_POST["package"];
    
    //return [$_POST["package"],$_POST["additive"]];
  }

 } 
}