<!DOCTYPE html>
<html>
<head>
    <title>Area Calculator</title>
</head>
<body>
<?php

session_start();

if(isset($_POST['radius']) && isset($_POST['length']) && isset($_POST['width']) && isset($_POST['base']) && isset($_POST['height']))
{
    $_SESSION['circleRadius'] = $_POST['radius'];
    $_SESSION['rectLength'] = $_POST['length'];
    $_SESSION['rectWidth'] = $_POST['width'];
    $_SESSION['triBase'] = $_POST['base'];
    $_SESSION['triHeight'] = $_POST['height'];
}

if(isset($_SESSION['circleRadius']) && isset($_SESSION['rectLength']) && isset($_SESSION['rectWidth']) && isset($_SESSION['triBase']) && isset($_SESSION['triHeight']))
{
    "<h2>Results:</h2>";
    include_once("Circle.php");
    $myCircle = new Circle("Circle", $_SESSION['circleRadius']);
    echo "<h3>Shape: Circle</h3>";
    echo "<h4>" . $myCircle->calculateArea() . "</h4>";



    include_once("Rectangle.php");
    $myRectangle = new Rectangle("Rectangle", $_SESSION['rectLength'], $_SESSION['rectWidth']);
    echo "<h3>Shape: Rectangle</h3>";
    echo "<h4>" . $myRectangle->calculateArea() . "</h4>";


    include_once("Triangle.php");
    $myTriangle = new Triangle("Triangle", $_SESSION['triBase'], $_SESSION['triHeight']);
    echo "<h3>Shape: Triangle</h3>";
    echo "<h4>" . $myTriangle->calculateArea() . "</h4>";
}



if(isset($_POST['resize']) && $_POST['resize'] > 0 && isset($_SESSION['circleRadius']) && isset($_SESSION['triHeight']) && isset($_SESSION['triBase']))
{
    include_once("Circle.php");
    $myCircle = new Circle("Circle", $_SESSION['circleRadius']);
    echo "<h3>Shape: Circle</h3>";
    $area = $myCircle->calculateArea();
    echo "<h4>" . $myCircle->resize($_POST['resize'], $area) . "</h4>";


    include_once("Triangle.php");
    $myTriangle = new Triangle("Triangle", $_SESSION['triBase'], $_SESSION['triHeight']);
    echo "<h3>Shape: New Triangle</h3>";
    $area = $myTriangle->calculateArea();
    echo "<h4>" . $myTriangle->resize($_POST['resize'], $area) . "</h4>";

}

?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


    <fieldset>
        <legend><h3>Circle</h3></legend>
        <p><label>Radius:  <input type="text" name="radius" id="radius" /></label></p>
    </fieldset>


    <fieldset>
        <lengend><h3>Rectangle</h3></lengend>
        <p><label>Length:  <input type="text" name="length" id="length" /></label>
            <label>Width:  <input type="text" name="width" id="width" /></label></p>
    </fieldset>


    <fieldset>
        <legend><h3>Triangle</h3></legend>
        <p><label>Base:  <input type="text" name="base" id="base" /></label>
            <label>Height:  <input type="text" name="height" id="height" /></label></p>
    </fieldset>

    <!--            Submit results-->
    <p><input type="submit" name="submit" value="Calculate" /></p>



</form>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p><label> %resize:  <input type="text" name="resize" id="resize" /></label></p>
    <p><input type="submit" name="submit" value="Calculate" /></p>
</form>




</body>
</html>