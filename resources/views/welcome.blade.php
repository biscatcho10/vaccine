<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Melkin, Booking and Reservation form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Well Plus Compounding Pharmacy</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/logo_title.png') }}" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->

    <!-- BASE CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/rome.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/DateTimePicker.css') }}" />
	<link href="{{ asset('frontend/css/vendors.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->

	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->

	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-4 content-left">
				<div class="content-left-wrapper bg_hotel">
					<div class="wrapper">
						<a href="index.html" id="logo"><img src="{{ asset('frontend/img/logo.png') }}" alt="" ></a>
						<div id="social">
							<ul>
								<li><a href="#0"><i class="social_facebook"></i></a></li>
								<li><a href="#0"><i class="social_twitter"></i></a></li>
								<li><a href="#0"><i class="social_instagram"></i></a></li>
							</ul>
						</div>
						<!-- /social -->
						<!-- content text  -->
						<div class="content_text">
							<p>FREE Local delivery on prescription orders and $ 35 minimum on other order types | EVERY DAY Seniors Discount. For more Info Call us @ 905-591-5402 or Fax: 905-591-5403</p>
						</div>
						<!-- content text  -->
						<!-- Footer -->
						<footer>
							<span class="text-center">© Copy Right 2022 Well Pharmacy, All Right Reserved.</span>
							<span>Powerd By Creative Twinkles</span>
						</footer>
						<!-- Footer -->
					</div>
				</div>
				<!--/content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-8 content-right" id="start">
				<div id="wizard_container">
						<!-- /top-wizard -->
						<form action="{{ route('make.request') }}" id="wrapped" method="POST">
                            @csrf
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div id="" class="form_items active">
									<h3 class="main_question"><strong>1/6</strong>Book an appointment with us now</h3>
									<h3 class="main_question titles">Choose your service</h3>
									<div id="my_faxen" class="form-group">
										<div  class="styled-select clearfix ">
											<select id="products" class="ddslick" name="vaccine" data-selected="" data-filter-profile="appt">
												<option value="1" >Flu Shot "3 years to 64 years "</option>
												<option value="1" >Medication Review</option>
												<option value="2" >SENIORS FLU SHOT</option>
												<option value="3" >TRAVEL PCR COVID-19 test "For Travelling only**Proof of travel is required" 129.99$ PLUS TAX</option>
												<option value="4" >PCR TEST FOR SYMPTOMATIC &amp; ASYMPTOMATIC PATIENTS *ONLY CERTAIN ELIGBILITY "ABOVE 5 YEAR"</option>
												<option value="5" >Travel Covid-19 Rapid Antigen test -***PROOF OF TRAVEL REQUIRED*** 50$+TAX</option>
												<option value="6" >Moderna  Booster shots " 18 and above only</option>
												<option value="7" >Pediatric Pfizer Covid Vaccine "5-11 year Only " 1st and 2nd dose</option>
												<option value="8" >Pfizer Covid-19 Vaccine "12 and above"</option>
											</select>
										</div>
									</div>
									<div class="form-group option_input">
										<div class="styled-select clearfix variantss d_nones">
											<select id="variants_one" class="ddslick d_nones" name="age" data-selected="">
												<option >18 to 69 Years</option>
												<option >70 Years and above</option>
												<option >Immuncompromised</option>
											</select>
											<select id="variants_two" class="ddslick d_nones" name="age" data-selected="">
												<option >1st</option>
												<option >2nd</option>
												<option >Booster"3rd" "18 YEARS AND OLDER"</option>
												<option >4th " Immunocompromised and Long term care patient Please call for eligibility "</option>
												<option >BOOSTER "3RD" "12 TO 17 YEARS . 168 DAYS FROM SECOND DOSE"</option>
											</select>
										</div>
									</div>
									<div  class="form-group">
										<div class="overlays"></div>
   										<input type="button" name="date"  class="form-control requireds" id="input">
										<i class="icon-hotel-calendar_3"></i>
									</div>
									<div class="form-group h-time">
										<div class="styled-select clearfix">
											<select id="ChooseTime" class="ddslick" name="date" data-datepicker="date" data-prompt="Choose a date..." data-selected="">
												<option >Choose a date...</option>
											</select>
											<select id="SelectMyTime" class="ddslick overflow-auto d-none"  name="time" data-datepicker="date" data-prompt="Choose a date..." data-selected="">
												<option value="09:00" data-available="1">09:00 am</option>
												<option value="09:15" data-available="1">09:15 am</option>
												<option value="09:30" data-available="1">09:30 am</option>
												<option value="09:45" data-available="1">09:45 am</option>
												<option value="10:00" data-available="1">10:00 am</option>
												<option value="10:15" data-available="1">10:15 am</option>
												<option value="10:30" data-available="1">10:30 am</option>
												<option value="10:45" data-available="1">10:45 am</option>
												<option value="11:00" data-available="1">11:00 am</option>
												<option value="11:15" data-available="1">11:15 am</option>
												<option value="11:30" data-available="1">11:30 am</option>
												<option value="11:45" data-available="1">11:45 am</option>
												<option value="12:00" data-available="1">12:00 pm</option>
												<option value="12:15" data-available="1">12:15 pm</option>
												<option value="12:30" data-available="1">12:30 pm</option>
												<option value="12:45" data-available="1">12:45 pm</option>
												<option value="13:00" data-available="1">01:00 pm</option>
												<option value="13:15" data-available="1">01:15 pm</option>
												<option value="13:30" data-available="1">01:30 pm</option>
												<option value="13:45" data-available="1">01:45 pm</option>
												<option value="14:00" data-available="1">02:00 pm</option>
												<option value="14:15" data-available="1">02:15 pm</option>
												<option value="14:30" data-available="1">02:30 pm</option>
												<option value="14:45" data-available="1">02:45 pm</option>
												<option value="15:00" data-available="1">03:00 pm</option>
												<option value="15:15" data-available="1">03:15 pm</option>
												<option value="15:30" data-available="1">03:30 pm</option>
												<option value="15:45" data-available="1">03:45 pm</option>
												<option value="16:00" data-available="1">04:00 pm</option>
												<option value="16:15" data-available="1">04:15 pm</option>
												<option value="16:30" data-available="1">04:30 pm</option>
												<option value="16:45" data-available="1">04:45 pm</option>
												<option value="17:00" data-available="1">05:00 pm</option>
												<option value="17:15" data-available="1">05:15 pm</option>
												<option value="17:30" data-available="1">05:30 pm</option>
												<option value="17:45" data-available="1">05:45 pm</option>
												<option value="18:00" data-available="1">06:00 pm</option>
												<option value="18:15" data-available="1">06:15 pm</option>
												<option value="18:30" data-available="1">06:30 pm</option>
												<option value="18:45" data-available="1">06:45 pm</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /step-->

								<div class="form_items">
									<h3 class="main_question"><strong>2/6</strong>Contact information</h3>
									<div class="form-group">
										<input autocomplete="off" type="text" name="first_name" class="form-control requireds" placeholder="First Name">
										<i class="icon-user"></i>
									</div>
									<div class="form-group">
										<input autocomplete="off" type="text" name="last_name" class="form-control requireds" placeholder="Last Name">
										<i class="icon-user"></i>
									</div>
									<div class="form-group">
										<input autocomplete="off" type="email"  name="email" class="form-control requireds email" placeholder="Email">
										<i class="icon-envelope"></i>
									</div>
									<div class="form-group">
										<input autocomplete="off" type="text" name="telephone" class="form-control requireds" placeholder="Telephone">
										<i class="icon-phone"></i>
									</div>
								</div>
								<!-- /step-->

								<div class="form_items " >
									<h3 class="main_question"><strong>3/6</strong>Please fill with your details</h3>
									  <div class="form-group">
										<input type="text" name="dob" data-field="date" readonly class="form-control requireds myTime myDates"  placeholder="Date of birth 'MM/DD/YYYY'" id="myDateTwo">
										<i class="icon-hotel-calendar_3"></i>

										<div class="overlays"></div>
											<div id="dtBox">
											</div>

									</div>
									  <div class="form-group ">
											<input autocomplete="off" id="field-2" placeholder="Address 'street address, city'" data-name="address_'street_address,_city_'_" type="text" name="address" class="form-control requireds">
									  </div>
									  <div class="form-group ">
											<input autocomplete="off" id="field-3" placeholder="HEALTH CARD NUMBER" data-name="health_card_number" type="text" name="health_card_number" class="form-control requireds">
									  </div>
								</div>
								<!-- /step-->

								<div class="appCheckBox form_items ">
									<h3 class="main_question mb-0 mb-lg-2 d-flex align-items-center"><strong class="mr-4">4/6</strong><label>PLEASE PICK YOU ELIGABILITY FOR PCR TESTING UNDER UPDATED CRITERIA ON JAN 17,2022</label></h3>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center mb-0 mb-lg-2 mb-xl-3" >
										<em> • Symptomatic2 people who fall into one of the following groups: o Patient-facing healthcare workers</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em> o Staff, volunteers, residents/inpatients, essential care providers, and visitors in highest risk settings ▪ Highest risk settings include: hospital (including complex continuing care facilities and paramedic services) and congregate living settings, including Long-Term Care, retirement homes, First Nation elder care lodges, group hopes, shelters, hospices and correctional institutions</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em> o Household members of workers in highest risk settings</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center" >
										<em> o Temporary Foreign Workers in congregate living settings</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>o Patients seeking emergency medical care, at the discretion of the treating clinician</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>o Outpatients for whom COVID-19 treatment is being considered, including: ▪ Immunocompromised individuals not expected to mount an adequate immune response from COVID-19 vaccination or SARS-CoV-2 infection, regardless of vaccination status. ▪ Individuals who are not fully vaccinated and at highest risk of severe disease (anyone aged ≥ 70 years or ≥ 50 years who is Indigenous and/or has additional risk factors)</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center" >
										<em> o Pregnant people</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>o People who are underhoused or homeless</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>o First responders, including fire, police and paramedics</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>o Elementary and secondary students and education staff who have received a PCR self-collection kit through their school</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>• Symptomatic/asymptomatic people: o From First Nation, Inuit, and Métis communities and individuals travelling into these communities for work o On admission/transfer to or from hospital or congregate living setting o Close contacts and people in the context of confirmed or suspected outbreaks in highest risk4 settings as directed by the local public health unit o Individuals, and one accompanying caregiver, with written prior approval for out-of-country medical services from the General Manager, OHIP o Asymptomatic testing in hospital, long-term care, retirement homes and other congregate living settings and institutions as per provincial guidance and/or Directives, or as directed by public health units.</em>
										<label class="switch-light switch-ios float-right">
											<input type="checkbox" value="Pick up service" name="eligapility">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
								</div>
								<!-- /step-->

								<div class="form_items ">
									<h3 class="main_question mb-0 mb-lg-2 mb-xl-3"><strong>5/6</strong>Please complete Questions below for ***PCR TEST FOR SYMPTOMATIC & ASYMPTOMATIC PATIENTS***</h3>
									<div id="" class="form-group">
										<div  class="styled-select clearfix ">
											<select id="field-5" class="ddslick">
												<option value="1">I am fully vaccinated against COVID-19 (it has been 14 days or more since your final dose of either a two-dose or a one-dose vaccine series)</option>
												<option value="2">I have tested postive for covid -19 in the last 90 days (and since have been cleared)</option>
												<option value="3">None of the Above</option>
											</select>
										</div>
									</div>

									<label>Are you currently experiencing any of these symptoms?</label>
									<div id="" class="form-group">
										<div  class="styled-select clearfix ">
											<select id="field-7"  class="ddslick">
												<option value="1">Fever and/or chillsTemperature of 37.8 degrees Celsius/100 degrees Fahrenheit or higher</option>
												<option value="2">Cough or barking cough (croup)Continuous, more than usual, making a whistling noise when breathing (not related to asthma, post-infectious reactive airways, COPD, or other known causes or conditions you already have)</option>
												<option value="3">Shortness of breathOut of breath, unable to breathe deeply (not related to asthma or other known causes or conditions you already have)</option>
												<option value="4">Decrease or loss of taste or smellNot related to seasonal allergies, neurological disorders, or other known causes or conditions you already have</option>
												<option value="5">Muscle aches/joint painUnusual, long-lasting (not related to getting a COVID-19 vaccine in the last 48 hours, a sudden injury, fibromyalgia, or other known causes or conditions you already have)</option>
												<option value="6">Nausea, vomiting, and/or diarrheaNot related to irritable bowel syndrome, anxiety, menstrual cramps, or other known causes or conditions you already have for children under 18 only</option>
												<option value="7">NONE OF THE ABOVE</option>
											</select>
										</div>
									</div>

									<label class="mt-4">Are you currently experiencing any of these issues? Call 911 if you are, Severe difficulty breathing (struggling for each breath, can only speak in single words) Severe chest pain (constant tightness or crushing sensation) Feeling confused or unsure of where you are Losing consciousness.</label>
									<div id="" class="form-group">
										<div  class="styled-select clearfix ">
											<select id="field-8" class="ddslick">
												<option value="1">YES</option>
												<option value="2">NO</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /step-->

								<div class="oneCheckBox form_items">
									<h3 class="main_question mb-0 mb-lg-2 mb-xl-3"><strong>6/6</strong>Acknowledge the following Information ONLY FOR ***PCR TEST For Symptomatic and Asymptomatic Patients***</h3>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
											<em>***Please call us at 905-591-5402 when you arrive and stay in the ***CAR*** until advised to come for the test.</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>Individuals who are Symptomatic or Asymptomatic for COVID-19 or who have a recent exposure DONOT enter the pharmacy & for the purpose of testing MUST BE wearing at least a surgical/procedure mask.</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>***Patients must be informed to arrive no more than 5 minutes prior to their scheduled appointment time and to wait outside the pharmacy until their appointment time.</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>*** A pharmacist will come to the back door entrance for the pharmacy to perform the test IN THE CAR***.</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>Thanks for understanding and looking forward to helping you.</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-between align-items-center">
										<em>Please bring ID OR LETTER THAT PROVES YOUR ELIGABILITY</em>
									</div>
									<div class="form-group options clearfix d-flex justify-content-center align-items-center">
										<em>PROVES YOUR ELIGABILITY</em>
										<label class="switch-light switch-ios float-right">
											<input class="checkBox" type="checkbox" value="Pick up service" name="condiotions">
											<span><span>No</span><span>Yes</span></span>
											<a></a>
										</label>
									</div>
								</div>
								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backwards">Prev</button>
								<button type="button" name="forward" class="forwards">Next</button>
								<button type="submit" name="process" class="submits">Submit</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
					<!-- Footer -->
					<footer>
						<span class="text-center">© Copy Right 2022 Well Pharmacy, All Right Reserved.</span>
						<span><a target="_blank" href="https://www.creativetwinkles.com/">Powerd By Creative Twinkles</a></span>
					</footer>
					<!-- Footer -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	<!-- start Calender SCRIPTS -->
    <script defer src="{{ asset('frontend/js/thisMyTime.js') }}"></script>

	<script>
		function calendarPosition(input , classCalender) {
		  function getOffset(el) {
			const rect = el.getBoundingClientRect();
			return {
			  left: rect.left + window.scrollX,
			  top: rect.top,
			  bottom: window.screen.height - rect.bottom
			};
		  }
		  input.addEventListener('click',function w() {
			setTimeout(function() {
				let heightInput = input.clientHeight
				let Calender = document.querySelector(classCalender)
				Calender.classList.toggle("myStyle")
				let heightCalender = Calender.clientHeight
				if (getOffset(input).bottom < heightCalender || getOffset(input).bottom < getOffset(input).top) {
					Calender.style.transform = `translateY(-${heightCalender + heightInput + 5}px)`;
				}else{
					Calender.style.transform = `translateY(0)`;
				}
				document.querySelectorAll('.dd-select').forEach(e => {
					e.addEventListener('click', function name(params) {
						document.querySelector('.rd-container.rd-container-attachment').style.display = 'none'
					})
				})
				window.addEventListener('click', function(e){
					if (!document.querySelector('.rd-container.rd-container-attachment').contains(e.target) && !document.querySelector('#input').contains(e.target)){
						document.querySelector('.rd-container.rd-container-attachment').style.display = 'none'
						let Calender = document.querySelector(classCalender)
						Calender.classList.remove("myStyle")
				}
				});

				let myday = document.getElementsByClassName('rd-day-body')[5].classList.add('rd-day-disabled')
				document.querySelectorAll('.rd-day-body:not(.rd-day-disabled)').forEach(e => {
					e.addEventListener('click',function name(params) {
						thisMyTime()
					})
				})
		}, 0);

		})
	}
		calendarPosition(document.querySelector('#input'), '.rd-container.rd-container-attachment')
	</script>
	<!-- / Calender SCRIPTS -->

	<script defer src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/rome.js') }}"></script>
	<script defer src="{{ asset('frontend/js/DateTimePicker.js') }}"></script>
    <script defer src="{{ asset('frontend/js/common_scripts.min.js') }}"></script>
	<script defer src="{{ asset('frontend/js/functions.js') }}"></script>
	<script defer src="{{ asset('frontend/js/min.js') }}"></script>


</body>
</html>
