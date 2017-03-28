<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrew
 * Date: 10/17/2016
 * Time: 5:55 PM
 */
?>

<html>
<head>
    <title>Diploma Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href = "<?php echo base_url(); ?>diploma_c/newDiploma"><i class="small material-icons">fast_rewind</i></a></button>
        <center> <h4>Diploma form</h4></center>
        <form action="<?php echo base_url(); ?>diploma_c/addStudent" method="post" enctype="multipart/form-data" class="card">
            <input type="hidden" value="<?php if (isset($student)){ foreach ($student as $s) echo $s->id; } ?>" name="reg_id">
            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="s_name">Student Name</label>
                        <input class="validate " value="<?php if (isset($student)){ foreach ($student as $s) echo $s->st_name; } ?>" name="s_name" type="text">
                        <span style="color: red"><?php echo form_error('s_name'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="form-group">
                        <input type="radio" class="with-gap" name="sex" id="male" value="Male">
                        <label for="male">Male</label><br/>
                        <input type="radio" class="with-gap" name="sex" id="female" value="Female">
                        <label for="female">Female</label>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="Maritalstatus">Marital Status</label>
                        <input class="validate " name="m_status" id="Maritalstatus"
                               type="text">
                        <span style="color: red"><?php echo form_error('m_status'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="nationality">
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                        <label for="Nationality">Nationality/Country</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="dob">Date of Birth</label>
                        <input class="datepicker" name="dob" type="date">
                    </div>
                    <span style="color: red"><?php echo form_error('dob'); ?></span>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <select name="religion">
                            <option value="Catholic">Catholic</option>
                            <option value="Anglicans">Anglicans</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Others">Others</option>
                        </select>
                        <label for="religion">Religion</label>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <label for="DistrictOfBirth">District of Birth</label>
                        <input class="validate " name="district_of_birth" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="stdmobile"><i class="material-icons right">phone</i>Mobile Number</label>
                        <input class="validate " name="phone" value="<?php if (isset($student)){ foreach ($student as $s) echo $s->st_mobile; } ?>" type="text">
                        <span style="color: red"><?php echo form_error('phone'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="stdmobile"><i class="material-icons right">phone</i>Whatsapp Number</label>
                        <input class="validate " name="whatsapp" type="text">
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="email">Email Address</label>
                        <input class="validate " name="email"
                               type="text">
                        <span style="color: red"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="address">Address</label>
                        <input class="validate " name="address"
                               type="text">
                        <span style="color: red"><?php echo form_error('appl'); ?></span>
                    </div>
                </div>
                <input type="number" name="course" value="0" hidden>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="pleIndex">PLE Index Number</label>
                        <input class="validate " name="PLE_indx_no"
                               type="text">
                        <span style="color: red"><?php echo form_error('PLE_indx_no'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="PLE_yr_exam">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 100; $i++) {
                                $year = 2000 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="pleYear">PLE Year of Exam</label>
                        <span style="color: red"><?php echo form_error('PLE_yr_exam'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="pleSchool">PLE School</label>
                        <input class="validate " name="PLE_school"
                               type="text">
                        <span style="color: red"><?php echo form_error('PLE_school'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="PLE_result">
                            <option value="">Choose Aggregates</option>
                            <?php
                            for ($i = 4; $i <= 36; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <label for="pleResult">PLE Aggregates</label>
                        <span style="color: red"><?php echo form_error('PLE_result'); ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="uceIndex">UCE Index Number</label>
                        <input class="validate " name="UCE_indx_no"
                               type="text">
                        <span style="color: red"><?php echo form_error('UCE_indx_no'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="UCE_yr_exam">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 100; $i++) {
                                $year = 2000 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="sex">UCE Year of Exam</label>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="UCE_school">UCE school</label>
                        <input class="validate " name="UCE_school"
                               type="text">
                        <span style="color: red"><?php echo form_error('UCE_school'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class=" input-field">
                        <select name="UCE_result">
                            <option value="">Choose Aggregates</option>
                            <?php
                            for ($i = 8; $i <= 72; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <label for="uceschool">UCE Aggregates</label>
                        <span style="color: red"><?php echo form_error('UCE_result'); ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="uaceno">UACE Index number</label>
                        <input class="validate " name="UACE_indx_no"
                               type="text">
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="UACE_yr_exam">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 100; $i++) {
                                $year = 2000 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="dream">UACE year of Exam</label>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="course">UACE School</label>
                        <input class="validate " name="UACE_school" id="course"
                               type="text">
                        <span style="color: red"><?php echo form_error('UACE_indx_no'); ?></span>

                    </div>
                </div>
                <div class="col s3">
                    <div class=" input-field">
                        <select name="UACE_result">
                            <option value="">Choose Points</option>
                            <?php
                            for ($i = 25; $i >= 0; $i--) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <label for="UACE_result">UACE RESULT(points)</label>
                        <span style="color: red"><?php echo form_error('UACE_result'); ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class=" input-field">
                        <label for="UACE_combination">UACE Combination</label>
                        <input class="validate " name="UACE_combination"
                               type="text">
                        <span style="color: red"><?php echo form_error('UACE_combination'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class=" input-field">
                        <select name="o_qualification">
                            <option value="Certificate">Certificate</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                        </select>
                        <label for="o_qualification">Other Qualification</label>
                        <span style="color: red"><?php echo form_error('o_qualification'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="institute_name">Institute name</label>
                        <input class="validate" name="o_institute_name" id="institute_name"
                               type="text">
                        <span style="color: red"><?php echo form_error('institute_name'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <select name="o_yr_obtained">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 100; $i++) {
                                $year = 2000 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="dream">Year Obtained</label>
                        <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="dream">SITM reg no if Registered</label>
                        <input class="validate " name="sitm_reg_no"
                               type="text">
                        <span style="color: red"><?php echo form_error('sitm_reg_no'); ?></span>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <label for="Admission">SITM course if any.</label>
                        <input class="validate " name="sitm_course"
                               type="text">
                    </div>
                </div>

                <div class="col s3">
                    <div class=" input-field">
                        <select name="sitm_qualification">
                            <option value="Certificate">Certificate</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                        </select>
                        <label for="Admission">Qualification</label>
                        <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <select name="sitm_doa">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 100; $i++) {
                                $year = 2000 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="regDate">Year of admission</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s6 l4">
                    <div class="file-field input-field">
                        <div class="btn green">
                            <span>Student Photo</span>
                            <input name="photo" type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        <span style="color: red"><?php echo form_error('photo');?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="appl">Fathers Name</label>
                        <input class="validate " name="fathers_name"
                               type="text">
                        <span style="color: red"><?php echo form_error('fathers_name'); ?></span>

                    </div>
                </div>
                <div class="col s3">
                    <div class="input-field">
                        <label for="f_contact"><i class="material-icons right">phone</i>Fathers Contact</label>
                        <input class="validate" name="f_contact"
                               type="number" length="10">
                        <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <label for="Religion">Mothers Name</label>
                        <input class="validate" name="mothers_name" id="Religion"
                               type="text">
                        <span style="color: red"><?php echo form_error('class_cert'); ?></span>
                    </div>
                </div>
                <div class="col s3">
                    <div class=" input-field">
                        <label><i class="material-icons right">phone</i>Mothers Contact</label>
                        <input class="validate " name="m_contact"
                               type="number" length="10">
                        <span style="color: red"><?php echo form_error('m_contact'); ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <label for="nok">Next of kin</label>
                        <input class="validate " name="next_kin" id="nok"
                               type="text">
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <label for="next_kin_contact"><i class="material-icons right">phone</i>Next of kin Contact</label>
                        <input class="validate " name="next_kin_contact" id="next_kin_contact"
                               type="text">
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <select name="intake">
                            <option value="">Choose a Year</option>
                            <?php
                            for ($i = 0; $i <= 98; $i++) {
                                $year = 2012 + $i;
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                        <label for="intake">Intake</label>
                        <span style="color: red"><?php echo form_error('intake'); ?></span>
                    </div>
                </div>

                <div class="col s3">
                    <div class="input-field">
                        <input class="datepicker" name="date" type="text" readonly value="<?php echo date('Y-m-d');?>">
                        <label for="regDate">Date of Registration</label>
                    </div>
                </div>
            </div>


            <div class="row center">
                <div class="col s3">
                </div>
                <div class="col s6 right">
                    <button class=" btn waves-light red"><i class="material-icons right">restore</i>Reset</button>
                    <button class=" btn waves-effect waves-light green" type="submit"><i class="material-icons right">send</i>Submit</button>
                </div>
                <div class="col s3">
                </div>
            </div>
            <br/>
    </form>

</div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 60 // Creates a dropdown of 15 years to control year
    });
</script>
<?php
if (isset($success)) {
    foreach ($success as $m) {
        ?>
        <script type="application/javascript">
            Materialize.toast('<?php echo $m; ?>', 4000)
        </script>
        <?php
    }
} ?>
</body>
</html>
