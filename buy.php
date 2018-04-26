<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Mango Go Go</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300|Open+Sans:700">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mangogogo.css">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->


        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
            var a = ["Iris", "Lilies", "Muscari", "Hellebores",
                "Ranunculus", "Spray Rosee", "Sweet Peas", "Clematis",
                "Sraspedia", "Calla lilies", "Orchid", "Hydrangea", "Carnation", "Daffodils", "Violet Roses",
                "Peony", "Rose", "While rose", "Yellow Rose", "Lily", "Allium", "Tulips"];

            $(document).ready(function () {
                $("#image").fadeOut(function () {
                    $(this).load(function () {
                        $(this).fadeIn();
                    });
                    $(this).attr("src", "http://twitrheaders.com/wp-content/uploads/2014/05/Flower-Macro.jpg");
                });
            });

            function showHint(searchStr) {
                console.log(searchStr);
                var resultFound = false;
                var i = 0;

                $('#txtHint').html('');
                if (searchStr != '') {
                    $.get('http://localhost/mangogogo/mango.php?', {f_name: searchStr}, function (result) {
                        $('#txtHint').html(result);
                    });
                }
            }

            $(function () {

                function split(val) {
                    return val.split(/,\s*/);
                }
                function extractLast(term) {
                    return split(term).pop();
                }

                $("#tags")
                        // don't navigate away from the field on tab when selecting an item
                        .bind("keydown", function (event) {
                            if (event.keyCode === $.ui.keyCode.TAB &&
                                    $(this).autocomplete("instance").menu.active) {
                                event.preventDefault();
                            }
                        })
                        .autocomplete({
                            minLength: 0,
                            source: function (request, response) {
                                // delegate back to autocomplete, but extract the last term
                                response($.ui.autocomplete.filter(
                                        a, extractLast(request.term)));
                            },
                            focus: function () {
                                // prevent value inserted on focus
                                return false;
                            },
                            select: function (event, ui) {
                                var terms = split(this.value);
                                // remove the current input
                                terms.pop();
                                // add the selected item
                                terms.push(ui.item.value);
                                // add placeholder to get the comma-and-space at the end
                                terms.push("");
                                this.value = terms.join(", ");
                                return false;
                            }
                        });
            });

            $(function () {
                $(document).tooltip();
            });



            $(function () {
                $("#datepicker").datepicker();
            });
            $(function () {
                $("#accordion").accordion({
                    heightStyle: "fill"
                });
            });
            $(function () {
                $("#accordion-resizer").resizable({
                    minHeight: 140,
                    minWidth: 200,
                    resize: function () {
                        $("#accordion").accordion("refresh");
                    }
                });
            });

            function search_flower() {
                var name = $("#name").val();
                $.ajax({url: 'mango.php',
                    type: 'post',
                    data: {f_name: name},
                    success: function (output) {
                        $("#outputTable").html(output);
                    }
                });
            }
        </script>
		<script type = "text/javascript">
			function redirectpay()
			{
	 
				alert("Redirecting to Secure PayPal site");
				window.location.href = "https://www.paypal.com/signin/";			
			}
        </script>
	   	<script type = "text/javascript">
			function ordercancel()
			{
	 
				alert("Your Selection Will Be Cleared");
				window.location.href = "buy.php";			
			}
        </script>
	   	<script type = "text/javascript">
			function order()
			{
	 
				alert("Thank You for Your Order. Your Order Will Be Processed Once We Receive Your PayPal Payment");
				window.location.href = "buy.php";			
			}
       </script>
        <style>
            #accordion-resizer {
                padding: 10px;
                width: 350px;
                height: 220px;
            }

            label {
                display: inline-block;
                width: 5em;
            }

            .ui-autocomplete {
                max-height: 100px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
            }
            /* IE 6 doesn't support max-height
             * we use height instead, but this forces the menu to always be this tall
             */
            * html .ui-autocomplete {
                height: 100px;
            }
        </style>

    </head>
    <body background="http://newflowerwallpaper.com/download/flower-background-images-and-wallpapers/flower-background-images-and-wallpapers-16.jpg" id="hinh">
        <div class="page">
            <!-- ==== START MANGO ==== -->
            <header class="mango" role="banner">
                <p class="logo"><a href="/"><img src="img/sjsu.jpeg" alt="MANGO GO GO" /></a></p>

                <!--                <img id="image" src="http://www.ashleysflowersla.com/slide_img/flowers-banner.jpg" width="6" height="2"/>-->
                <ul class="social-sites">
                    <li><a href="https://www.facebook.com/sanjosestate"><img src="img/f.png"></a></li>
                    <li><a href="https://twitter.com/sjsu"><img src="img/t.png"></a></li>
                    <li><a href="http://www.flickr.com"><img src="img/g.png"></a></li>
                </ul>

                <nav role="navigation">
                    <ul class="nav-main">
					    <li><a href="home.html">Home</a></li>
						<li><a href="Creating a Form.html">Register</a></li>
						<li><a href="form.html">Prices</a></li>
						<li><a href="buy.php">Order Bouquet</a></li>
						<li><a href="buycustom.php">Custom Order</a></li>
						<li><a href="about.html">About US</a></li>
                    </ul>
                </nav>
            </header>
            <!-- end mango -->

            <div  class="container clearfix" >
                <!-- ==== START MAIN ==== -->
                <main role="main" >
				     <!-- 1st section-->
                    <section class="post">
					    <h3>Select Your Bouquets</h3>

							<table border='1'>
						<!-- FORM -->
						<!-- form action="buy.php" method="post" -->
							   <tr>
							       <td>
								      <img id='bq1' src='img/bq1.png'>
									  <!--input type="checkbox" name="bq1" value="1" checked="checked"-->
								   </td>
								   <td>
								      <img id='bq2' src='img/bq2.png'>
									  <!--input type="radio" name="bq2" value="2"-->
									  
								   </td>
								   <td>
								       <img id='bq3' src='img/bq3.png'>
								   </td>							   
								   <td>
								       <img id='bq4' src='img/bq4.png'>
								   </td>
								</tr>
								<tr>
							       <td>
								      <img id='bq5' src='img/bq5.png'>
								   </td>
								   <td>
								       <img id='bq6' src='img/bq6.png'>
								   </td>
								   <td>
								       <img id='bq7' src='img/bq7.png'>
								   </td>
								   	<td>
								       <img id='bq8' src='img/bq8.png'>
								   </td>
								</tr>
						<!-- /form --> 
						<!-- FORM -->
							</table>

					    <footer class="footer">
						
						</footer>
 
                    </section>
					<!-- end 1st section-->
					<!-- 2nd section-->
					<section class="post">
					    <h3><a href='buycustom.php'>Build a Custom Bouquet: Click Here</a></h3>
					
					    <footer class="footer">
						
						</footer>
 
                    </section>
                    <!-- end 2nd section-->

                    <nav role="navigation">
                        <ol class="pagination">
						    <li><a href="home.html">1</a></li>
                            <li><a href="Creating a Form.html">2</a></li>
                            <li><a href="form.html">3</a></li>
                            <li><a href="buy.html">4</a></li>
							<li><a href="buycustom.html">5</a></li>
                            <li><a href="about.html">6</a></li>
                        </ol>
                    </nav>
                </main>
                <!-- end main -->

                <!-- ==== START SIDEBAR ==== -->
                <div class="sidebar">
				    <!-- PHP  DISABLED FOR DEMO ONLY -->
					<div class="mod">
					    <?php
						   $error = "";
						   $username = filter_input(INPUT_GET, "username");
                           $password  = filter_input(INPUT_GET, "password");
						   // connect to db as ROOT with PASSWORD = 1470
						   try {
                                $con = new PDO("mysql:host=localhost;dbname=mangogogo", "root", "1470"); // NOTE: requires password
                                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                                $query = "SELECT customero.last_name, customero.pass FROM mangogogo.customero WHERE customero.last_name='$username' AND customero.pass='$password'";								
						        
								$result = $con->query($query);
								$row = $result->fetch(PDO::FETCH_ASSOC);
							    if ($row >= 1){ 
								    $_SESSION['username'] = $username;
									$_SESSION['password'] = $password;

								}
								else {
									 //print "<p>You are not logged in</p>";
	
								  }
							}
						    catch(PDOException $ex) {
                               echo 'ERROR: '.$ex->getMessage();
                            }
					    ?>
					</div>
					<!-- done PHP -->
				    <div class="mod">
						<fieldset>
						     <legend> Pay Now </legend>
							 <p>
						       <li><a href="https://www.paypal.com/signin/"><img src="img/paypallogo200.png"></a></li>
						     </p>
							 <p>
							   <input type="submit" value="Pay" onclick="redirectpay()"/>
							 </p>
						</fieldset>
                    </div>
                    <div class="mod">
						<article id="label1" class="ui-widget" >
							<label for= "type">Search Flowers:</label>
							<input id="name" name="f_name" placeholder="What flower ?" onkeyup="showHint(this.value)"><br>
							<span id="txtHint"></span>
						</article>

                    </div>
					<div class="mod">
						<form action="buy.php" method="get">
							<fieldset>
								<legend>Place Order</legend>
                                <p>								
                                <ul class="label1">
                                   <li>Delivery Date: <input type="text" id="datepicker"></li>
                                </ul>
                                </p>
								
								<p>
								   <ul class="label1">
								   <li>Bouquet:</li>
								   <select name="bq" size=1>
								     <option value="bq1">Flowers Same Day</option>
									 <option selected="selected" value="bq2">Upsy Daisy</option>
									 <option value="bq3">Red Roses One Dozen</option>
									 <option value="bq4">How Sweet It Is</option>
									 <option value="bq5">Smiles and Sunshine</option>
									 <option value="bq6">Wild Rainbow</option>
									 <option value="bq7">Smiles and Sunshine2</option>
									 <option value="bq8">Upsy Daisy</option>
								   <select/>
								   </ul>
								</p>
								<p>
									<input type="submit" value="Order" onclick = "order()"/>
									<input type="submit" value="Reset" onclick = "ordercancel()"/>
									<!--input type="image" name="submit" src="img/XXXX"-->
								</p>
							</fieldset>
						</form>
                    </div>
                </div>
                <!-- end sidebar -->
            </div>
            <!-- end container -->

            <!-- ==== START PAGE FOOTER ==== -->
            <footer role="contentinfo" class="footer">
                <p class="legal"><small>&copy; 2016 Mango Go Go. All Rights Reserved.</small></p>
            </footer>
            <!-- end page footer -->

        </div> <!-- end page -->

    </body>

</html>
