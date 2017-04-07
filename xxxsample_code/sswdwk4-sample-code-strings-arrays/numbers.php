﻿<!DOCTYPE html>
<html>

<head>
<TITLE>Numbers</TITLE>
</head>

<body>
<?php # Script 1.8 - numbers.php

//  Set the variables
$quantity = 30;    //Buying 30 widgets
$price = 119.95;
$taxrate = .05;    // 5% sales tax

// Calculate the total:
$total = $quantity * $price;
$total = $total + ($total * $taxrate);
// Calculate and add the tax

// Format the total
$total = number_format($total, 2);

// Print the results 
echo '<p>You are purchasing <b>' . 
$quantity . '</b> widget(s) at a cost 
of <b>$' . $price . '</b> each.  With 
tax, the total comes to <b>$' . 
$total . '</b>.</p>';

/* If you set a $price value without using two decimals (e.g. 119.9 or 119),
   you would need to apply number_format() to $price before printing it. */
?>
</body>

</html>