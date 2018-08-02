<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
        if(15 % 5 == 0)
            if(15 % 3 ==0)
                echo "string";
        

    ?>
    <?php
// PHP program to find GCD 
// of two numbers
 
// Recursive function to 
// return gcd of a and b
function gcd($a, $b)
{
    // Everything divides 0
    if($a==0 || $b==0)
        return 0 ;
 
    // base case
    if($a == $b)
        return $a ;
     
    // a is greater
    if($a > $b)
        return gcd( $a-$b , $b ) ;
 
    return gcd( $a , $b-$a ) ;
}
 
// Driver code
$a = 10 ;
$b = 12 ;
 
echo "GCD of $a and $b is ", gcd($a , $b) ;
 
// This code is contributed by Anivesh Tiwari
?>
    <?php
$age = array("Peter"=>"39", "Ben"=>"37","Peter"=>"50", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";
print_r($age);
?>

</body>
</html>