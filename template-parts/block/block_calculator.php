<section class="calc"><!-- Intro Block -->
  <div>


		<div class="calcbox">
				<form id="calculate-loan" method="post" action="">
					<div class="title_calc"><h2>Your Mortgage Details...</h2></div>
					<div class="ir"><p>Interest Rate: <span id="myinterest_result"></span></p></div>
					<div class="ir_slider"><input type="range" min="1" max="15.5" value="1" step="0.5"class="slider" name="myinterest" id="myinterest"></div>
					<div class="noy"><p>No of Years: <span id="myyears_result"></span></p></div>
					<div class="noy_slider"><input type="range" min="1" max="50" value="1" step="1"class="slider" name="myyears" id="myyears"></div>
					<div class="propval"><p>Property Value: <span id="mypropertyprice_result"></span></p></div>
					<div class="propval_slider"><input type="range" min="50000" max="3500000" value="50000" step="5000" class="slider" name="mypropertyprice" id="mypropertyprice"></div>
					<div class="depamount"><p>Deposit: <span id="mydeposit_result"></span></p></div>
					<div class="depamount_slider"><input type="range" min="0" max="500000" value="0" step="5000" class="slider" name="mydeposit" id="mydeposit"></div>
				</form>
		</div>
		<div class="resultsbox">
			<div>
				  <div class="title_res"><h2>Your Figures...</h2>  </div>
				  <div class="propertyvalue"><p>Property Value: <span id="prop_result"></span></p></div>
				  <div class="morreq_res"><p>Mortgage Required: <span id="mortamount_result"></span></p></div>
				  <div class="tint_res"><p>Total Interest: <span id="totalinterest_result"></span></p></div>
				  <div class="loan_res"><p>Loan Payments: <span id="loadpayment_result"></span></p></div>
				  <div class="mpay_res"><p>Monthly Payment: <span id="monthlyPayment_result"></span></p></div>
			</div>
		</div>
</div>
</section>

<script>
				//Property Slider
				var priceslider = document.getElementById("mypropertyprice");
				var priceoutput = document.getElementById("mypropertyprice_result");
				var myyearsslider = document.getElementById("myyears");
				var myyearsoutput = document.getElementById("myyears_result");
				var mydepositslider = document.getElementById("mydeposit");
				var mydepositoutput = document.getElementById("mydeposit_result");
				var interestrate = document.getElementById("myinterest");
				var myinterestrate = document.getElementById("myinterest_result");
				var txt_propprice_result = document.getElementById("prop_result");
				var txt_morttolast_result = document.getElementById("morttolast_result");
				var txt_mortamount_result = document.getElementById("mortamount_result");
				var txt_loadpayment_result = document.getElementById("loadpayment_result");
				var txt_monthlyPayment_result = document.getElementById("monthlyPayment_result");
				var txt_totalinterest_result = document.getElementById("totalinterest_result");


				var deppercentage = 0;
				var interest_rate = interestrate.value;
				var currency = '£';
				var noofmonths = myyearsslider.value * 12;
				var balance = (priceslider.value-mydepositslider.value)
				var monthly_payment = ((interest_rate /(100 * 12)) * balance) / (1 - Math.pow(1 + interest_rate / 1200,  (-noofmonths)));

				// Slider Default Text Settings
				priceoutput.innerHTML = currency + (priceslider.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				myyearsoutput.innerHTML = myyearsslider.value;
				myinterestrate.innerHTML = interestrate.value+'%';


				txt_propprice_result.innerHTML = currency +(priceslider.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				txt_mortamount_result.innerHTML = currency +(balance + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				txt_loadpayment_result.innerHTML = currency +((monthly_payment * noofmonths).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				txt_monthlyPayment_result.innerHTML = currency +(monthly_payment.toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				txt_totalinterest_result.innerHTML = currency +((monthly_payment * noofmonths - balance).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");

				if (mydepositslider.value > 0) {
					  var deppercentage = Math.round(( mydepositslider.value/priceslider.value) * 100);
					  mydepositoutput.innerHTML = '£'+ (mydepositslider.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+' ('+ deppercentage +'%)';
				} else {
					  mydepositoutput.innerHTML = '£'+ (mydepositslider.value+ "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				};

				// Interest Change
				interestrate.oninput = function() {

					  var interest_rate = this.value;
					  var noofmonths = myyearsslider.value * 12;
					  var balance = (priceslider.value-mydepositslider.value);
					  var monthly_payment = ((interest_rate /(100 * 12)) * balance) / (1 - Math.pow(1 + interest_rate / 1200,  (-noofmonths)));
					  var interest_rate = interestrate.value;

					  myinterestrate.innerHTML = interest_rate+'%';

					  txt_mortamount_result.innerHTML = currency +(balance + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
					  txt_loadpayment_result.innerHTML = currency +((monthly_payment * noofmonths).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_monthlyPayment_result.innerHTML = currency +(monthly_payment.toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_totalinterest_result.innerHTML = currency +((monthly_payment * noofmonths - balance).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");

				}
				// Year Slider Change
					myyearsslider.oninput = function() {
					myyearsoutput.innerHTML = this.value;


					var interest_rate = interestrate.value;
					var balance = (priceslider.value-mydepositslider.value);
					var noofmonths = this.value * 12;
					var monthly_payment = ((interest_rate /(100 * 12)) * balance) / (1 - Math.pow(1 + interest_rate / 1200,  (-noofmonths)));

					txt_loadpayment_result.innerHTML = currency +((monthly_payment * noofmonths).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					txt_monthlyPayment_result.innerHTML = currency +(monthly_payment.toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					txt_totalinterest_result.innerHTML = currency +((monthly_payment * noofmonths - balance).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				}
				// Price Slider Change
				priceslider.oninput = function() {

					priceoutput.innerHTML = '£'+ (this.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					txt_propprice_result.innerHTML = currency + (this.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");

				  if (mydepositslider.value > 0) {
						var deppercentage = Math.round(( mydepositslider.value/priceslider.value) * 100);
						mydepositoutput.innerHTML = '£'+ (mydepositslider.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+' ('+ deppercentage +'%)';
				  } else {
						mydepositoutput.innerHTML = '£'+ (mydepositslider.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				  };

					  var interest_rate = interestrate.value;
					  var noofmonths = myyearsslider.value * 12;
					  var balance = (this.value-mydepositslider.value);
					  var monthly_payment = ((interest_rate /(100 * 12)) * balance) / (1 - Math.pow(1 + interest_rate / 1200,  (-noofmonths)));
					  var interest_rate = interestrate.value;

					  txt_mortamount_result.innerHTML = currency +(balance + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_loadpayment_result.innerHTML = currency +((monthly_payment * noofmonths).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_monthlyPayment_result.innerHTML = currency +(monthly_payment.toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_totalinterest_result.innerHTML = currency +((monthly_payment * noofmonths - balance).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				}
				// Deposit Slider Change
				mydepositslider.oninput = function() {

					  if (mydepositslider.value > 0) {
						var deppercentage = Math.round(( mydepositslider.value/priceslider.value) * 100);
						mydepositoutput.innerHTML = '£'+ (this.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")+' ('+ deppercentage +'%)';
					  } else {
						mydepositoutput.innerHTML = '£'+ (this.value + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  };
					  var interest_rate = interestrate.value;
					  var noofmonths = myyearsslider.value * 12;
					  var balance = (priceslider.value-this.value);
					  var monthly_payment = ((interest_rate /(100 * 12)) * balance) / (1 - Math.pow(1 + interest_rate / 1200,  (-noofmonths)));

					  txt_mortamount_result.innerHTML = currency +(balance + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_loadpayment_result.innerHTML = currency +((monthly_payment * noofmonths).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_monthlyPayment_result.innerHTML = currency +(monthly_payment.toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
					  txt_totalinterest_result.innerHTML = currency +((monthly_payment * noofmonths - balance).toFixed(2) + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
				};

		  </script>