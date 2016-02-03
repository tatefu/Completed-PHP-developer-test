<?php
	session_start();

	//set sent and error variables to false.

	$sent = false;
	$hasError = false;
	$errorArray = array(); 



	// Report all errors
	//error_reporting(E_ALL);

	/*Include the database connection script 
	 * Create an instance
	*/
	include_once 'DB_con.php';
	$con = new DB_con();

	
	/*
	 * Sanitize before inerting data
	 * */
	// data insert code starts here.
	if(isset($_POST['signup']))
	{
		  /*
		 * Sanitize and assign php variable name with values from the form
		 */
 		$name = trim(htmlspecialchars($_POST['name']));
 		$email = trim($_POST['email']);
 		$country = trim(htmlspecialchars($_POST['country']));

 		/*
 		Concatinate day, month and year into one variable ($dob) 
 		Convert into date
 		*/
 		$date = $_POST['dob_day'].'-'.$_POST['dob_month'].'-'.$_POST['dob_year'];
 		$d = strtotime($date);
		$dob = date('Y-m-d',$d);


		/*
			validation start here.
			create an array to hold variables
		*/
			$feildsArray = array(
					'name' => $name,
					'email' => $email,
					'country' => $country,
					'dob' => $dob
				);

		//Create an array to hold errors	
		$errorArray = array(); 

		///check indidvidual feilds agaisnt the validation
		foreach ($feildsArray as $key => $val) {
			switch ($key) {
				case 'name':
					  if(empty($val)){
					  	$hasError = true;
					  	$errorArray[$key] = ucfirst($key) . " The name feild was empty";
					  }

					  if(strlen($val) < 2)
					  {
					  		$hasError = true;
					  		$errorArray[$key] = " Your name cannot have one letter";	
					  }
					break;
				case 'email':
						if(empty($val))
						{
							$hasError = true;
							$errorArray[$key] = ucfirst($key). "The email feilds is required";
						}
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							$hasError = true;
							$errorArray[$key] = "Invalid email address entered";
						}else{
							$email = filter_var($email, FILTER_SANITIZE_EMAIL); 
						}					
					break;
			}
		}

		
		/*Check if there are no errors
		  If no errors then.... 
		  Connect to database with the $con object.
		  invoke the insert() function of the DB_class
		  insert data...
		  create session variables or get the primary key
		*/
		if($hasError !== true)
		{
			if($con->insert($name, $email, $country, $dob))
 			{	
 				$sent = true;
 				$_SESSION["name"] = $name;
 				$_SESSION["email"] = $email;
 				$_SESSION["country"] = $country;
 				$_SESSION["dob"] = $dob;

 				/*Sent user confirmation e-mail*/
 				$message = "Thank you for signing up.";

 				$to = $email;
 				$subject = "Message from signup form";
 				$msg = "Name: $name<br />Email:<br />Message: $message";
 				$headers = "MIME-Version 1.0 \r\n";
 				$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
 				$headers .= "From: Sign-up team";
 				$mailSent = mail($to, $subject, $msg, $headers);

 				if($mailSent)
 				{
 					unset($name);
 					unset($email);
 				}

			}
 		
 		
	}

}
	
// data insert code ends here.

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP Test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="styles.css" rel="stylesheet" media="screen, projection">
		<link href="small.css" rel="stylesheet" media="(max-width:400px)">

		<!--Include jQuery using CND -->

		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

		<!--<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>-->
		<!-- include validation.js script -->
		<script src="validation.js"></script>
	</head>
	<body>
		<container id="page-wrap">
			<nav id="mainNav">
				<div class="quirk">quirk</div>
			  	<ul>
	    				<li><a href="#" title="Work" class="gear">work</a></li>
	    				<li><a href="#" title="Services" class="interact">services</em></a></li>
	    				<li><a href="#" title="Resources" class="shop">resources</a></li>
	    				<li><a href="#" title="Company" class="shop">company</a></li>
	  			</ul>
			</nav>
			<article id="mainCon">
				<aside id="SignUpform">
					<form action="index.php" method="POST" class="form-group has-error" id="signup-form">
						<h2>Sign up form header</h2>
						<hr>

						<!-- handle error using php -->
						<?php if($hasError === true) 

							echo '<ul class="errorList">';
								foreach($errorArray as $key => $val){
									echo '<li>'.$val.'</li>';
								}
							echo '</ul>';
							$hasError === false;
						?>

						<p><label>Full name*:</label><br />
						   <input type="text" name="name" id="name" size="43"/>
						</p>					
						
						<p>	
						   <label>Email*:</label><br />
						   <input type="text" name="email" id="email" size="43" />
						</p>
						
						<p>
						  <label>Country*:</label><br />
						  <select id="country" name="country">
						  	<option value="">Country</option>
							<option value="Afghanistan">Afghanistan</option>
							<option value="Åland Islands">Åland Islands</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="American Samoa">American Samoa</option>
							<option value="Andorra">Andorra</option>
							<option value="Angola">Angola</option>
							<option value="Anguilla">Anguilla</option>
							<option value="Antarctica">Antarctica</option>
							<option value="Antigua and Barbuda">Antigua and Barbuda</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="bs">Bahamas</option>
							<option value="bh">Bahrain</option>
							<option value="bd">Bangladesh</option>
							<option value="bb">Barbados</option>
							<option value="by">Belarus</option>
							<option value="be">Belgium</option>
							<option value="bz">Belize</option>
							<option value="bj">Benin</option>
							<option value="bm">Bermuda</option>
							<option value="bt">Bhutan</option>
							<option value="bo">Bolivia</option>
							<option value="ba">Bosnia and Herzegovina</option>
							<option value="bw">Botswana</option>
							<option value="bv">Bouvet Island</option>
							<option value="br">Brazil</option>
							<option value="io">British Indian Ocean Territory</option>
							<option value="bn">Brunei Darussalam</option>
							<option value="bg">Bulgaria</option>
							<option value="bf">Burkina Faso</option>
							<option value="bi">Burundi</option>
							<option value="kh">Cambodia</option>
							<option value="cm">Cameroon</option>
							<option value="ca">Canada</option>
							<option value="cv">Cape Verde</option>
							<option value="ky">Cayman Islands</option>
							<option value="cf">Central African Republic</option>
							<option value="td">Chad</option>
							<option value="cl">Chile</option>
							<option value="cn">China</option>
							<option value="cx">Christmas Island</option>
							<option value="cc">Cocos (Keeling) Islands</option>
							<option value="co">Colombia</option>
							<option value="km">Comoros</option>
							<option value="cg">Congo</option>
							<option value="cd">Congo, The Democratic Republic of The</option>
							<option value="ck">Cook Islands</option>
							<option value="cr">Costa Rica</option>
							<option value="ci">Cote D'ivoire</option>
							<option value="hr">Croatia</option>
							<option value="cu">Cuba</option>
							<option value="cy">Cyprus</option>
							<option value="cz">Czech Republic</option>
							<option value="dk">Denmark</option>
							<option value="dj">Djibouti</option>
							<option value="dm">Dominica</option>
							<option value="do">Dominican Republic</option>
							<option value="ec">Ecuador</option>
							<option value="eg">Egypt</option>
							<option value="sv">El Salvador</option>
							<option value="gq">Equatorial Guinea</option>
							<option value="er">Eritrea</option>
							<option value="ee">Estonia</option>
							<option value="et">Ethiopia</option>
							<option value="fk">Falkland Islands (Malvinas)</option>
							<option value="fo">Faroe Islands</option>
							<option value="fj">Fiji</option>
							<option value="fi">Finland</option>
							<option value="fr">France</option>
							<option value="gf">French Guiana</option>
							<option value="pf">French Polynesia</option>
							<option value="tf">French Southern Territories</option>
							<option value="ga">Gabon</option>
							<option value="gm">Gambia</option>
							<option value="ge">Georgia</option>
							<option value="de">Germany</option>
							<option value="gh">Ghana</option>
							<option value="gi">Gibraltar</option>
							<option value="gr">Greece</option>
							<option value="gl">Greenland</option>
							<option value="gd">Grenada</option>
							<option value="gp">Guadeloupe</option>
							<option value="gu">Guam</option>
							<option value="gt">Guatemala</option>
							<option value="gg">Guernsey</option>
							<option value="gn">Guinea</option>
							<option value="gw">Guinea-bissau</option>
							<option value="gy">Guyana</option>
							<option value="ht">Haiti</option>
							<option value="hm">Heard Island and Mcdonald Islands</option>
							<option value="va">Holy See (Vatican City State)</option>
							<option value="hn">Honduras</option>
							<option value="hk">Hong Kong</option>
							<option value="hu">Hungary</option>
							<option value="Iceland">Iceland</option>
							<option value="India">India</option>
							<option value="Indonesia">Indonesia</option>
							<option value="Iran, Islamic Republic">Iran, Islamic Republic</option>
							<option value="Iraq">Iraq</option>
							<option value="Ireland">Ireland</option>
							<option value="Isle of Man">Isle of Man</option>
							<option value="Israel">Israel</option>
							<option value="Italy">Italy</option>
							<option value="Italy">Jamaica</option>
							<option value="Japan">Japan</option>
							<option value="Jersey">Jersey</option>
							<option value="Jordan">Jordan</option>
							<option value="Kazakhstan">Kazakhstan</option>
							<option value="Kenya">Kenya</option>
							<option value="Kiribati">Kiribati</option>
							<option value="Korea, Democratic People's Republic">Korea, Democratic People's Republic</option>
							<option value="Korea, Republic">Korea, Republic</option>
							<option value="Kuwait">Kuwait</option>
							<option value="Kyrgyzstan">Kyrgyzstan</option>
							<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
							<option value="Latvia">Latvia</option>
							<option value="Lebanon">Lebanon</option>
							<option value="Lesotho">Lesotho</option>
							<option value="Liberia">Liberia</option>
							<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
							<option value="Liechtenstein">Liechtenstein</option>
							<option value="Lithuania">Lithuania</option>
							<option value="Luxembourg">Luxembourg</option>
							<option value="Macao">Macao</option>
							<option value="Macedonia, The Former Yugoslav Republic">Macedonia, The Former Yugoslav Republic</option>
							<option value="Madagascar">Madagascar</option>
							<option value="Malawi">Malawi</option>
							<option value="Malaysia">Malaysia</option>
							<option value="Maldives">Maldives</option>
							<option value="Mali">Mali</option>
							<option value="Malta">Malta</option>	
							<option value="Marshall Islands">Marshall Islands</option>
							<option value="Martinique">Martinique</option>
							<option value="Mauritania">Mauritania</option>
							<option value="Mauritius">Mauritius</option>
							<option value="Mayotte">Mayotte</option>
							<option value="Mexico">Mexico</option>
							<option value="Micronesia, Federated States">Micronesia, Federated States</option>
							<option value="Moldova, Republic">Moldova, Republic</option>	
							<option value="Monaco">Monaco</option>
							<option value="Mongolia">Mongolia</option>
							<option value="Montenegro">Montenegro</option>
							<option value="Montserrat">Montserrat</option>
							<option value="Morocco">Morocco</option>	
							<option value="Mozambique">Mozambique</option>
							<option value="Myanmar">Myanmar</option>
							<option value="Namibia">Namibia</option>
							<option value="Nauru">Nauru</option>
							<option value="Nepal">Nepal</option>
							<option value="Netherlands">Netherlands</option>
							<option value="Netherlands Antilles">Netherlands Antilles</option>
							<option value="New Caledonia">New Caledonia</option>
							<option value="New Zealand">New Zealand</option>
							<option value="Nicaragua">Nicaragua</option>
							<option value="Niger">Niger</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Niue">Niue</option>
							<option value="Norfolk Island">Norfolk Island</option>
							<option value="Northern Mariana Islands">Northern Mariana Islands</option>
							<option value="Norway">Norway</option>
							<option value="Oman">Oman</option>	
							<option value="Pakistan">Pakistan</option>
							<option value="Palau">Palau</option>
							<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
							<option value="Panama">Panama</option>
							<option value="Papua New Guinea">Papua New Guinea</option>
							<option value="Paraguay">Paraguay</option>
							<option value="Peru">Peru</option>
							<option value="Philippines">Philippines</option>
							<option value="Pitcairn">Pitcairn</option>
							<option value="Poland">Poland</option>
							<option value="Portugal">Portugal</option>
							<option value="Puerto Rico">Puerto Rico</option>
							<option value="Qatar">Qatar</option>
							<option value="Reunion">Reunion</option>
							<option value="Romania">Romania</option>
							<option value="Russian Federation">Russian Federation</option>
							<option value="Rwanda">Rwanda</option>
							<option value="Saint Helena">Saint Helena</option>
							<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
							<option value="Saint Lucia">Saint Lucia</option>
							<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
							<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
							<option value="Samoa">Samoa</option>
							<option value="San Marino">San Marino</option>
							<option value="Sao Tome and Principe">Sao Tome and Principe</option>
							<option value="Saudi Arabia">Saudi Arabia</option>
							<option value="Senegal">Senegal</option>
							<option value="Serbia">Serbia</option>
							<option value="Seychelles">Seychelles</option>
							<option value="Sierra Leone">Sierra Leone</option>
							<option value="Singapore">Singapore</option>
							<option value="Slovakia">Slovakia</option>
							<option value="Slovenia">Slovenia</option>
							<option value="Solomon Islands">Solomon Islands</option>
							<option value="Somalia">Somalia</option>
							<option value="South Africa">South Africa</option>
							<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
							<option value="Spain">Spain</option>
							<option value="Sri Lanka">Sri Lanka</option>	
							<option value="Sudan">Sudan</option>
							<option value="Suriname">Suriname</option>
							<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
							<option value="Swaziland">Swaziland</option>
							<option value="Sweden">Sweden</option>
							<option value="Switzerland">Switzerland</option>
							<option value="Syrian Arab Republic">Syrian Arab Republic</option>
							<option value="Taiwan, Province of China">Taiwan, Province of China</option>
							<option value="Tajikistan">Tajikistan</option>
							<option value="Tanzania, United Republic">Tanzania, United Republic</option>
							<option value="Thailand">Thailand</option>
							<option value="Timor-leste">Timor-leste</option>
							<option value="Togo">Togo</option>
							<option value="Tokelau">Tokelau</option>
							<option value="Tonga">Tonga</option>
							<option value="Trinidad and Tobago">Trinidad and Tobago</option>
							<option value="Tunisia">Tunisia</option>
							<option value="Turkey">Turkey</option>
							<option value="Turkmenistan">Turkmenistan</option>
							<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
							<option value="Tuvalu">Tuvalu</option>
							<option value="Uganda">Uganda</option>
							<option value="Ukraine">Ukraine</option>
							<option value="United Arab Emirates">United Arab Emirates</option>
							<option value="United Kingdom">United Kingdom</option>
							<option value="United States">United States</option>
							<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
							<option value="Uruguay">Uruguay</option>
							<option value="Uzbekistan">Uzbekistan</option>
							<option value="Vanuatu">Vanuatu</option>
							<option value="Venezuela">Venezuela</option>
							<option value="Viet Nam">Viet Nam</option>
							<option value="Virgin Islands, British">Virgin Islands, British</option>
							<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
							<option value="Wallis and Futuna">Wallis and Futuna</option>
							<option value="Western Sahara">Western Sahara</option>
							<option value="Yemen">Yemen</option>
							<option value="Zambia">Zambia</option>
							<option value="Zimbabwe">Zimbabwe</option>
							</select>
						</p>
						
						<p id="date">
							<select name="dob_day" id="dob_day">
								<option value="">Day:</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						    <select name="dob_month" id="dob_month">
								<option value="">Month:</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>

							<select name="dob_year" id="dob_year">
								<option value="">Year:</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
								<option value="2009">2009</option>
								<option value="2008">2008</option>
								<option value="2007">2007</option>
								<option value="2006">2006</option>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="2000">2000</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="1996">1996</option>
								<option value="1995">1995</option>
								<option value="1994">1994</option>
								<option value="1993">1993</option>
								<option value="1992">1992</option>
								<option value="1991">1991</option>
								<option value="1990">1990</option>
								<option value="1989">1989</option>
								<option value="1988">1988</option>
								<option value="1987">1987</option>
								<option value="1986">1986</option>
								<option value="1985">1985</option>
								<option value="1984">1984</option>
								<option value="1983">1983</option>
								<option value="1982">1982</option>
								<option value="1981">1981</option>
								<option value="1980">1980</option>
								<option value="1979">1979</option>
								<option value="1978">1978</option>
								<option value="1977">1977</option>
								<option value="1976">1976</option>
								<option value="1975">1975</option>
								<option value="1974">1974</option>
								<option value="1973">1973</option>
								<option value="1972">1972</option>
								<option value="1971">1971</option>
								<option value="1970">1970</option>
								<option value="1969">1969</option>
								<option value="1968">1968</option>
								<option value="1967">1967</option>
								<option value="1966">1966</option>
								<option value="1965">1965</option>
								<option value="1964">1964</option>
								<option value="1963">1963</option>
								<option value="1962">1962</option>
								<option value="1961">1961</option>
								<option value="1960">1960</option>
								<option value="1959">1959</option>
								<option value="1958">1958</option>
								<option value="1957">1957</option>
								<option value="1956">1956</option>
								<option value="1955">1955</option>
								<option value="1954">1954</option>
								<option value="1953">1953</option>
								<option value="1952">1952</option>
								<option value="1951">1951</option>
								<option value="1950">1950</option>
								<option value="1949">1949</option>
								<option value="1948">1948</option>
								<option value="1947">1947</option>
								<option value="1946">1946</option>
								<option value="1945">1945</option>
								<option value="1944">1944</option>
								<option value="1943">1943</option>
								<option value="1942">1942</option>
								<option value="1941">1941</option>
								<option value="1940">1940</option>
								<option value="1939">1939</option>
								<option value="1938">1938</option>
								<option value="1937">1937</option>
								<option value="1936">1936</option>
								<option value="1935">1935</option>
								<option value="1934">1934</option>
								<option value="1933">1933</option>
								<option value="1932">1932</option>
								<option value="1931">1931</option>
								<option value="1930">1930</option>
								<option value="1929">1929</option>
								<option value="1928">1928</option>
								<option value="1927">1927</option>
								<option value="1926">1926</option>
								<option value="1925">1925</option>
								<option value="1924">1924</option>
								<option value="1923">1923</option>
								<option value="1922">1922</option>
								<option value="1921">1921</option>
								<option value="1920">1920</option>
								<option value="1919">1919</option>
								<option value="1918">1918</option>
								<option value="1917">1917</option>
								<option value="1916">1916</option>
								<option value="1915">1915</option>
								<option value="1914">1914</option>
								<option value="1913">1913</option>
								<option value="1912">1912</option>
								<option value="1911">1911</option>
								<option value="1910">1910</option>
								<option value="1909">1909</option>
								<option value="1908">1908</option>
								<option value="1907">1907</option>
								<option value="1906">1906</option>
							</select> 
						</p>
							
						<p>
							<input name="terms" id="terms" type="checkbox"> I accept the terms and conditions
						</p>
						
						<p>
							<input name="signup" class="signup" id="submit-button" type="submit" value="Sign up">
						</p>
					</form>
				</aside>
				<?php if($sent === true){?>
					<aside id="SignUpFeedBack">
						<h1>Sign up success</h1>
						
						<?php
							echo "<strong>Name</strong><br />";
							echo $_SESSION["name"].'<br /><br />';

							echo "<strong>Email</strong><br />";
							echo $_SESSION["email"].'<br /><br />';

							echo "<strong>Country</strong><br />";
							echo $_SESSION["country"].'<br /><br />';

							echo "<strong>Date of birth</strong><br />";
							echo $_SESSION["dob"].'<br />';
							

						?>

					</aside>

				<?php
					}
					session_unset();
					session_destroy();
					unset($sent);
				?>
			</article>
		</container>
	</body>
<html>