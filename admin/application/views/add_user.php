<link rel="stylesheet" href="<?= base_url()?>assets/phone_input/css/intlTelInput.css">
<script src="<?= base_url()?>assets/phone_input/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Add New User</div>
		</div>
		<div class="page-title-actions">
			<a class="btn btn-info btn-sm btn-shadow mr-3" href="<?= (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:base_url().'users/customers';?>">Back</a>
        </div>
	</div>
</div>
<?php if($this->session->flashdata('msg')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
<?php } ?>
<form id="add_user_form" action="<?= base_url()?>home/add_user_process" method="POST" enctype="multipart/form-Data">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">User Role</h5>
		<select required id="role" name="role" class="multiselect-dropdown form-control">
			<option value="">Select User Role</option>
			<!--<option value="customer">Customer</option>-->
			<option value="rider">Rider</option>
			<option value="subadmin">SubAdmin</option>
			<option value="waiter">Waiter</option>
		</select>
	</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Login Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="username" class="">Username</label>
					<input required name="username" id="username" placeholder="Username" type="text" class="form-control" autocomplete="false" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="email" class="">Email</label>
					<input required  name="email" id="email" data-inputmask="'alias': 'email'" im-insert="true" class="form-control input-mask-trigger" autocomplete="false" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="password" class="">Password</label>
					<input required name="password" id="password" placeholder="Password" type="password" class="form-control" autocomplete="false" />
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-3">
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Picture</h5>
		<div class="col-md-12">
			<input name="image" type="file" id="image" style="display: none;" onchange="change_my_image(this)" accept="image/*" />
			<div id="userimagediv" style="cursor:pointer;">
				<img id="userimage" src="<?= base_url()?>uploads/user/userdefault.jpg" width="100%" />
			</div>
		</div>
		<span>*Click on image to upload.</span>
	</div>
</div>
</div>
<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Personal Information</h5>
		<div class="form-row">
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="first_name" class="">First Name</label>
					<input required name="first_name" id="first_name" placeholder="First Name" type="text" class="form-control" />
				</div>
			</div>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="last_name" class="">Last Name</label>
					<input required name="last_name" id="last_name" placeholder="Last Name" type="text" class="form-control" />
				</div>
			</div>
		<select required class="form-control" id="country_code" name="country_code" style="display:none;">
			<option value="971">United Arab Emirates</option>
			<option  value="1">United States of America</option>
			<option  value="93">Afghanistan</option>
			<option  value="355">Albania</option>
			<option  value="213">Algeria</option>
			<option  value="1">American Samoa</option>
			<option  value="376">Andorra</option>
			<option value="244">Angola</option>
			<option  value="1">Anguilla</option>
			<option  value="1">Antigua and Barbuda</option>
			<option  value="54">Argentina</option>
			<option  value="374">Armenia</option>
			<option  value="297">Aruba</option>
			<option  value="247">Ascension</option>
			<option  value="61">Australia</option>
			<option  value="43">Austria</option>
			<option  value="994">Azerbaijan</option>
			<option  value="1">Bahamas</option>
			<option  value="973">Bahrain</option>
			<option  value="880">Bangladesh</option>
			<option  value="1">Barbados</option>
			<option  value="375">Belarus</option>
			<option  value="32">Belgium</option>
			<option  value="501">Belize</option>
			<option  value="229">Benin</option>
			<option  value="1">Bermuda</option>
			<option  value="975">Bhutan</option>
			<option  value="591">Bolivia</option>
			<option  value="387">Bosnia and Herzegovina</option>
			<option  value="267">Botswana</option>
			<option  value="55">Brazil</option>
			<option  value="1">British Virgin Islands</option>
			<option  value="673">Brunei</option>
			<option  value="359">Bulgaria</option>
			<option  value="226">Burkina Faso</option>
			<option  value="257">Burundi</option>
			<option  value="855">Cambodia</option>
			<option  value="237">Cameroon</option>
			<option value="1">Canada</option>
			<option  value="238">Cape Verde</option>
			<option value="1">Cayman Islands</option>
			<option  value="236">Central African Republic</option>
			<option  value="235">Chad</option>
			<option  value="56">Chile</option>
			<option  value="86">China</option>
			<option  value="57">Colombia</option>
			<option  value="269">Comoros</option>
			<option  value="242">Congo</option>
			<option  value="682">Cook Islands</option>
			<option  value="506">Costa Rica</option>
			<option  value="385">Croatia</option>
			<option  value="53">Cuba</option>
			<option  value="357">Cyprus</option>
			<option  value="420">Czech Republic</option>
			<option  value="243">Democratic Republic of Congo</option>
			<option  value="45">Denmark</option>
			<option  value="246">Diego Garcia</option>
			<option  value="253">Djibouti</option>
			<option  value="1">Dominica</option>
			<option  value="1">Dominican Republic</option>
			<option  value="670">East Timor</option>
			<option  value="593">Ecuador</option>
			<option  value="20">Egypt</option>
			<option  value="503">El Salvador</option>
			<option  value="240">Equatorial Guinea</option>
			<option  value="291">Eritrea</option>
			<option  value="372">Estonia</option>
			<option  value="251">Ethiopia</option>
			<option  value="500">Falkland (Malvinas) Islands</option>
			<option  value="298">Faroe Islands</option>
			<option  value="679">Fiji</option>
			<option  value="358">Finland</option>
			<option  value="33">France</option>
			<option  value="594">French Guiana</option>
			<option  value="689">French Polynesia</option>
			<option  value="241">Gabon</option>
			<option  value="220">Gambia</option>
			<option  value="995">Georgia</option>
			<option  value="49">Germany</option>
			<option  value="233">Ghana</option>
			<option  value="350">Gibraltar</option>
			<option  value="30">Greece</option>
			<option  value="299">Greenland</option>
			<option  value="1">Grenada</option>
			<option  value="590">Guadeloupe</option>
			<option value="1">Guam</option>
			<option  value="502">Guatemala</option>
			<option  value="224">Guinea</option>
			<option  value="245">Guinea-Bissau</option>
			<option  value="592">Guyana</option>
			<option  value="509">Haiti</option>
			<option  value="504">Honduras</option>
			<option  value="852">Hong Kong</option>
			<option  value="36">Hungary</option>
			<option  value="354">Iceland</option>
			<option  value="91">India</option>
			<option  value="62">Indonesia</option>
			<option  value="870">Inmarsat Satellite</option>
			<option  value="98">Iran</option>
			<option  value="964">Iraq</option>
			<option  value="353">Ireland</option>
			<option  value="972">Israel</option>
			<option  value="39">Italy</option>
			<option  value="225">Ivory Coast</option>
			<option  value="1">Jamaica</option>
			<option  value="81">Japan</option>
			<option  value="962">Jordan</option>
			<option  value="7">Kazakhstan</option>
			<option  value="254">Kenya</option>
			<option  value="686">Kiribati</option>
			<option  value="965">Kuwait</option>
			<option  value="996">Kyrgyzstan</option>
			<option  value="856">Laos</option>
			<option  value="371">Latvia</option>
			<option  value="961">Lebanon</option>
			<option  value="266">Lesotho</option>
			<option  value="231">Liberia</option>
			<option  value="218">Libya</option>
			<option  value="423">Liechtenstein</option>
			<option  value="370">Lithuania</option>
			<option  value="352">Luxembourg</option>
			<option  value="853">Macau</option>
			<option  value="389">Macedonia</option>
			<option  value="261">Madagascar</option>
			<option  value="265">Malawi</option>
			<option  value="60">Malaysia</option>
			<option  value="960">Maldives</option>
			<option 223 value="223">Mali</option>
			<option 356 value="356">Malta</option>
			<option 692 value="692">Marshall Islands</option>
			<option 596 value="596">Martinique</option>
			<option 222 value="222">Mauritania</option>
			<option 230 value="230">Mauritius</option>
			<option 262 value="262">Mayotte</option>
			<option 52 value="52">Mexico</option>
			<option 691 value="691">Micronesia</option>
			<option 373 value="373">Moldova</option>
			<option 377 value="377">Monaco</option>
			<option 976 value="976">Mongolia</option>
			<option 382 value="382">Montenegro</option>
			<option 1 value="1">Montserrat</option>
			<option 212 value="212">Morocco</option>
			<option 258 value="258">Mozambique</option>
			<option 95 value="95">Myanmar</option>
			<option 264 value="264">Namibia</option>
			<option 674 value="674">Nauru</option>
			<option 977 value="977">Nepal</option>
			<option 31 value="31">Netherlands</option>
			<option 599 value="599">Netherlands Antilles</option>
			<option 687 value="687">New Caledonia</option>
			<option 64 value="64">New Zealand</option>
			<option 505 value="505">Nicaragua</option>
			<option 227 value="227">Niger</option>
			<option 234 value="234">Nigeria</option>
			<option 683 value="683">Niue Island</option>
			<option 850 value="850">North Korea</option>
			<option 1 value="1">Northern Marianas</option>
			<option 47 value="47">Norway</option>
			<option 968 value="968">Oman</option>
			<option 92 value="92">Pakistan</option>
			<option 680 value="680">Palau</option>
			<option 507 value="507">Panama</option>
			<option 675 value="675">Papua New Guinea</option>
			<option 595 value="595">Paraguay</option>
			<option 51 value="51">Peru</option>
			<option 63 value="63">Philippines</option>
			<option 48 value="48">Poland</option>
			<option 351 value="351">Portugal</option>
			<option 1 value="1">Puerto Rico</option>
			<option 974 value="974">Qatar</option>
			<option 262 value="262">Reunion</option>
			<option 40 value="40">Romania</option>
			<option 7 value="7">Russian Federation</option>
			<option 250 value="250">Rwanda</option>
			<option 290 value="290">Saint Helena</option>
			<option 1 value="1">Saint Kitts and Nevis</option>
			<option 1 value="1">Saint Lucia</option>
			<option 508 value="508">Saint Pierre and Miquelon</option>
			<option 1 value="1">Saint Vincent and the Grenadines</option>
			<option 685 value="685">Samoa</option>
			<option 378 value="378">San Marino</option>
			<option 239 value="239">Sao Tome and Principe</option>
			<option 966 value="966">Saudi Arabia</option>
			<option 221 value="221">Senegal</option>
			<option 381 value="381">Serbia</option>
			<option 248 value="248">Seychelles</option>
			<option 232 value="232">Sierra Leone</option>
			<option 65 value="65">Singapore</option>
			<option 421 value="421">Slovakia</option>
			<option 386 value="386">Slovenia</option>
			<option 677 value="677">Solomon Islands</option>
			<option 252 value="252">Somalia</option>
			<option 27 value="27">South Africa</option>
			<option 82 value="82">South Korea</option>
			<option 34 value="34">Spain</option>
			<option 94 value="94">Sri Lanka</option>
			<option 249 value="249">Sudan</option>
			<option 597 value="597">Suriname</option>
			<option 268 value="268">Swaziland</option>
			<option 46 value="46">Sweden</option>
			<option 41 value="41">Switzerland</option>
			<option 963 value="963">Syria</option>
			<option 886 value="886">Taiwan</option>
			<option 992 value="992">Tajikistan</option>
			<option 255 value="255">Tanzania</option>
			<option 66 value="66">Thailand</option>
			<option 228 value="228">Togo</option>
			<option 690 value="690">Tokelau</option>
			<option 676 value="676">Tonga</option>
			<option 1 value="1">Trinidad and Tobago</option>
			<option 216 value="216">Tunisia</option>
			<option 993 value="993">Turkey</option>
			<option 993 value="993">Turkmenistan</option>
			<option 1 value="1">Turks and Caicos Islands</option>
			<option 688 value="688">Tuvalu</option>
			<option 256 value="256">Uganda</option>
			<option 380 value="380">Ukraine</option>
			
			<option 44 value="44">United Kingdom</option>
			<option 1 value="1">U.S. Virgin Islands</option>
			<option 1 value="1">United States of America</option>
			<option 598 value="598">Uruguay</option>
			<option 998 value="998">Uzbekistan</option>
			<option 678 value="678">Vanuatu</option>
			<option 379 value="379">Vatican City</option>
			<option 58 value="58">Venezuela</option>
			<option 84 value="84">Vietnam</option>
			<option 681 value="681">Wallis and Futuna</option>
			<option 967 value="967">Yemen</option>
			<option 260 value="260">Zambia</option>
			<option 263 value="263">Zimbabwe</option>
		</select>
			<div class="col-md-4">
				<div class="position-relative form-group">
					<label for="phone" class="">Phone</label>
					<input required name="phone" id="phone" placeholder="(555)-888-1111" type="text" class="form-control" />
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main-card mb-3 card">
	<div class="card-body">
		<h5 class="card-title">Address</h5>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="building_name" class="">Building Name / Building No.</label>
					<input  name="building_name" id="building_name" placeholder="Building Name / Building No." type="text" class="form-control" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="area" class="">Area</label>
					<input  name="area" id="area" placeholder="Area" type="text" class="form-control" />
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="house_flat" class="">House / Flat</label>
					<input  name="house_flat" id="house_flat" placeholder="House / Flat" type="text" class="form-control" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="position-relative form-group">
					<label for="address" class="">Street Address</label>
					<input  name="address" id="address" placeholder="Street Address" type="text" class="form-control" />
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<div class="position-relative form-group">
					<label for="extra_direction" class="">Extra Direction</label>
					<input  name="extra_direction" id="extra_direction" placeholder="Extra Direction" type="text" class="form-control" />
				</div>
			</div>
		</div>

		<!--<div class="position-relative form-check">
			<input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
			<label for="exampleCheck" class="form-check-label">Check me out</label>
		</div>-->
		<button type="submit" class="mt-2 btn btn-primary">Create</button>
	</div>
</div>
</form>
<script>

$("#phone").intlTelInput({
  utilsScript: "<?= base_url()?>assets/phone_input/js/utils.js",
    // nationalMode:false,
  // separateDialCode:true
});
$("#phone").intlTelInput("setCountry", 'ae');
$("#phone").on("countrychange", function(e, countryData) {
	$('#country_select').val(countryData.dialCode);
});
$("#phone").mask("(99)-999-9999",{autoclear: false});
$(document).on('click','#userimagediv',function(){
	$('#image').trigger('click');
});
function change_my_image(image){
	var input = image;
	if (input.files && input.files) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#userimage').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files);
	}
}
</script>