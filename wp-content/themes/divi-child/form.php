<?php /* Template Name: Form */
get_header();
?>
<script src="https://cdn.jsdelivr.net/gh/RobinHerbots/Inputmask@3.3/dist/jquery.inputmask.bundle.js" defer></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.mask.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-serialize-object/2.5.0/jquery.serialize-object.min.js" integrity="sha512-Gn0tSSjkIGAkaZQWjx3Ctl/0dVJuTmjW/f9QyB302kFjU4uTNP4HtA32U2qXs/TRlEsK5CoEqMEMs7LnzLOBsA==" crossorigin="anonymous"></script>

<style>
#regForm {
  background-color: #ffffff;  
  font-family: Raleway;
  padding: 40px;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input[type=text],input[type=number] {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
 background: #e4e4e4;
 border:none;
 outline: none;
}
select {padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  background: #e4e4e4;
  border: none;
  outline: none;}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
  outline: 2px solid #c00;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #000;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.thankyou{display: none;}
img.logo{margin: 0px auto;display: block;}
.form-check {margin-bottom: 15px}
textarea{
  width: 100%;height: 
  100px;padding: 10px;
  font-size: 17px;
  font-family: Raleway;
  background: #e4e4e4;
  border: none;
  outline: none;}
#signature-pad canvas{
    border: 1px solid darkgray;
    max-width: 100%;
    width: 100%;
    height: 200px;
}
#signature-pad canvas.invalid{border: 1px solid red !important;}
.start{background: #000; color: #fff;text-align: center; padding: 5px 12px;    margin: 15px auto;}

.row label:not(.form-check-label){border-bottom: 5px solid #000 ;}
input[type=checkbox]{transform : scale(2)}
</style>
<body>
<div class="bootstrap-iso">	
<div class="container">

 
  <!-- One "tab" for each step in the form: -->
  <form id="regForm" name="regForm">
  <div class="tab">
    <p><img src="logo.png" class="img-fluid text-center logo" alt="" /></p>
    <p>JA! Ik steun 168Million met een bedrag van:</p>
    <div class="row mb-3">
      <div class="col-sm-4">
        <label>BEDRAG</label><br />
        <select id="amt">
          <option value="€7">€7</option>
          <option value="€8">€8</option>
          <option value="€9">€9</option>
          <option value="€10">€10</option>
          <option value="€11">€11</option>
          <option value="€12">€12</option>
          <option value="€13">€13</option>
          <option value="€14">€14</option>
          <option value="€15">€15</option>
          <option value="€16">€16</option>
          <option value="€17">€17</option>
          <option value="€18">€18</option>
          <option value="€19">€19</option>
          <option value="€20">€20</option>
          <option value="€21">€21</option>
          <option value="€22">€22</option>
          <option value="€23">€23</option>
          <option value="€24">€24</option>
          <option value="€25">€25</option>
    
        </select>
       </div>
       <div class="col-sm-4">
        <label>Werknemer</label><br />
        <input type="number" id="employee" name="employee" value="" maxlength="3" />
       </div> 
    </div>  
     <p></p> 
    <p><img src="<?php echo get_stylesheet_directory_uri() ?>/images/banner-image.png" class="img-fluid" alt="" style="margin: 0px auto;display: block;"></p>
  </div>

  <div class="tab">   
 
    
    <div class="row mb-3">
  
        <div class="col-sm-4">
          <label>VOORLETTER(S)</label><br /><input type="text" id="fname" placeholder="" oninput="this.className = ''" name="fname">
        </div>
        <div class="col-sm-4">
          <label>ACHTERNAAM</label><br /><input type="text" id="lname" placeholder="" oninput="this.className = ''" name="lname">
        </div>
        <div class="col-sm-4">
         <input type="hidden" id="amount" placeholder="" name="amount" oninput="this.className = ''">
        </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-4">
          <label>GEBOORTEDATUM</label><br /><input type="text" id="dob" placeholder="" oninput="this.className = ''" class="date" name="dob"/>
      </div>
      <div class="col-sm-4">
          <label>GESLACHT</label><br /><select name="sex" id="sex"><option value="Man">Man</option><option value="Vrouw ">Vrouw</option></select>
      </div>
      <div class="col-sm-4">
        <label>TELEFOONNUMER</label><br /><input type="text" id="telephone" name="telephone" placeholder="+31 (0)" value="">
    </div>
    </div>
    <div class="row mb-3">
      <div class="col-sm-4">
          <label>POSTCODE</label><br /><input type="text" id="postcode" name="postcode" placeholder="" oninput="this.className = ''" name="email">
      </div>  
      <div class="col-sm-4">
          <label>HUISNUMMER </label><br /><input type="text" id="house_number" name="house_number" placeholder="" oninput="this.className = ''" name="email">
      </div>
      <div class="col-sm-4">
          <label>WOONPLAATS</label><br /><input type="text" id="residence" name="residence" placeholder="" oninput="this.className = ''" name="email">

      </div>    
 

    </div>
    <div class="row mb-3">
      <div class="col-sm-12">
          <p><label>EMAILADRES</label><br /><input type="text" id="emailaddress" placeholder="" oninput="this.className = ''" name="email"></p>
          <p><label>EMAILADRES HERHALING</label><br /><input type="text" id="emailconfirm" placeholder="" oninput="this.className = ''" name="emailconfirm"></p>
          <p><label>REKENING NUMMER IBAN</label><br /><input type="text" id="iban" placeholder="" oninput="this.className = ''" name="iban"></p>
      </div>
      
    </div>
    <div class="row mb-3">
      <div class="col-sm-6">
        <label>OPEMERKING (Optional)</label><br /><textarea name="comments" id="comments"></textarea>
      </div>
      
    </div>

  </div>

  
  <div class="tab">
    <p>Het is mij bekend dat:</p>
    <br />
 
      <div class="row mb-3">
          <div class="col-sm-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="yes" name="authorization" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Dit GEEN eenmalige machtiging is en dat ik steun tot wederopzegging.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="yes" name="direct_debit" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                 Dit een automatische incasso betreft.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="debit_permission" value="yes" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Ik 168Million toestemming geef om het gekozen bedrag (maandelijks) van mijn rekening af te schrijven.
                </label>
            </div>
          </div>
      </div>
      <div class="row mb-3">
          <div class="col-sm-4">
            <label>VOORLETTER(S)</label><br /><input type="text"id="fnamec"  placeholder="" oninput="this.className = ''" name="fname" disabled>
          </div>
          <div class="col-sm-4">
            <label>ACHTERNAAM</label><br /><input type="text" id="lnamec" placeholder="" oninput="this.className = ''" name="lname" disabled>
          </div>
          <div class="col-sm-4">
            <label>BEDRAG</label><br /><input type="text" id="amountc" placeholder="" name="amount" id="amount" oninput="this.className = ''" disabled>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-4">
            <label>GEBOORTEDATUM</label><br /><input type="text" id="dobc" placeholder="" oninput="this.className = ''" class="date" name="dob" disabled/>
        </div>
        <div class="col-sm-4">
            <label>GESLACHT</label><br /><input type="text" id="sexc" placeholder="" oninput="this.className = ''"  name="sex" disabled/>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-4">
            <label>POSTCODE</label><br /><input type="text" id="postcodec" name="postcode" placeholder="" oninput="this.className = ''" name="email" disabled>
        </div>  
        <div class="col-sm-4">
            <label>HUISNUMMER </label><br /><input type="text" id="house_numberc" name="house_number" placeholder="" oninput="this.className = ''" name="email" disabled>
        </div>
        <div class="col-sm-4">
            <label>WOONPLAATS</label><br /><input type="text" id="residencec" name="residence" placeholder="" oninput="this.className = ''" name="email" disabled>

        </div>    
      </div>
      <div class="row mb-3">
        <div class="col-sm-6">
            <p><label>EMAILADRES</label><br /><input type="text" id="emailaddressc" placeholder="" oninput="this.className = ''" name="email"  disabled></p>
            <p><label>EMAILADRES HERHALING</label><br /><input type="text" id="emailconfirmc" placeholder="" oninput="this.className = ''" name="emailconfirm" disabled></p>
            <p><label>REKENING NUMMER IBAN</label><br /><input type="text" id="ibanc" placeholder="" oninput="this.className = ''" name="iban" disabled></p>
        </div>
        <div class="col-sm-6">                        
            <div class="row mt-5">
              <div class="col-sm-3">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pic1.jpg" class="img-fluid w100" alt="" >
              </div>
              <div class="col-sm-3">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pic2.jpg" class="img-fluid w100" alt="" >
              </div>
              <div class="col-sm-3">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pic3.jpg" class="img-fluid w100" alt="" >
              </div>
              <div class="col-sm-3">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pic4.jpg" class="img-fluid w100" alt="" >
              </div>
            </div>
        </div>  
    
      </div>

    </div>  
    <div class="thankyou">
        <div class="row mb-3">
            <h2>Hartelijk bedankt voor uw donatie!</h2>
            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/thankyou-image.png" class="w-100 img-fluid" alt="">
            <a onclick="window.location.reload()" class="start">Start Again</a>
        </div>
      
    </div>
  </form>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Vorige</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Volgende</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>

</div>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Versturen";
  } else {
    document.getElementById("nextBtn").innerHTML = "Volgende";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
  



}


function nextPrev(n) {
	   console.log('inthe tab');
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
    console.log(currentTab);
  console.log(x.length)
  if(currentTab == 1)
  {
    jQuery('#amount').val( jQuery('#amt').val())
  }
  if(currentTab == 2)
  {
     jQuery('#fnamec').val( jQuery('#fname').val());
     jQuery('#lnamec').val( jQuery('#lname').val());
     jQuery('#amountc').val( jQuery('#amount').val());
     jQuery('#dobc').val( jQuery('#dob').val());
     jQuery('#sexc').val( jQuery('#sex').val());
     jQuery('#house_numberc').val( jQuery('#house_number').val());
     jQuery('#residencec').val( jQuery('#residence').val());
     jQuery('#emailaddressc').val( jQuery('#emailaddress').val());
     jQuery('#emailconfirmc').val( jQuery('#emailconfirm').val());
     jQuery('#ibanc').val( jQuery('#iban').val());
     jQuery('#postcodec').val( jQuery('#postcode').val());
  }

  if (currentTab >= x.length) {
      
    formsubmit();
    console.log('after submit');
    // ... the form gets submitted:
   // document.getElementById("regForm").submit();
   
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
  
}
function base64ToBlob(base64, mime) 
{
    mime = mime || '';
    var sliceSize = 1024;
    var byteChars = window.atob(base64);
    var byteArrays = [];

    for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    return new Blob(byteArrays, {type: mime});
}
function formsubmit()
{
 	   var f = jQuery('#regForm');
       url = 'https://script.google.com/macros/s/AKfycbx3R6A3vwYCrpDn-h92y56rKDO_gBjmkPtzAEFkNSYJmnhCLbc/exec';
       var jqxhr = jQuery.ajax({
                  url: url,
                  method: "GET",
                  crossDomain: true,
                  dataType: "jsonp",
                  data: f.serializeObject(),
                  success: function (data) {
                      console.log("successfully run ajax request...");  
                      
                  }
                   });	
       
        //e.preventDefault();
        
         
              
        
         jQuery(".tab").hide();
         jQuery(".thankyou").show();
         jQuery("#prevBtn").hide();
         jQuery("#nextBtn").hide();
}

function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}



function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  if (currentTab == x.length - 1) {
    
      //$("input[type='checkbox']").each(function(index, element){
        //if(!element.checked){
          //  this.className += " invalid";
           // valid = false;
       // }
        //});
  }

  if(currentTab ==  1)
  {
    f =  jQuery("input[name='telephone']").val();
    removedSpacesText =  f.split(" ").join(""); 

    if(removedSpacesText.length < 15)
    {
      valid = false;
    }
    if(!validateEmail(jQuery('#emailaddress').val()))
    {
      valid = false;
       jQuery("#emailaddress").addClass('invalid'); 
    }

    if( jQuery('#emailaddress').val() ==  jQuery('#emailconfirm').val())
    {

    }
    else
    {
       jQuery("#emailaddress").addClass('invalid');      
       jQuery("#emailconfirm").addClass('invalid');      
      valid = false;
    }
    var iban =   jQuery('#iban').val();
    if(iban.length < 22)
    {
      valid = false;
       jQuery("#iban").addClass('invalid');   
    }
      

  }
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  
   
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

jQuery(document).ready(function(){
     jQuery('.date').mask('00/00/0000',{placeholder:"dd/mm/yyyy"});   
     jQuery('#iban').mask('NL 99 AAAA 99999999 99',{placeholder:"NL 00 AAAA 0000000 00"});  
     jQuery("#amount").inputmask({ alias : "currency", 
        alias: 'currency',
        prefix: "€",     
        digits: 2,
        rightAlign: 0,
        clearMaskOnLostFocus: true
     });
     

     jQuery("input[name='telephone']").keyup(function() {
      var val_old =  jQuery(this).val();
      var val =  jQuery(this).val();      
      var len = val.length;
       if(val.length < 17 )  
       {
          jQuery(this).addClass('invalid');       
       }
       else
       {
         jQuery(this).removeClass('invalid');
       }
      if (len == 1)
        val = '+31 (0) ' + val.substring(0);     
      if (len >= 8)
        val = val.substring(0, 8) + '' + val.substring(len - 9);
      if (val != val_old)
         jQuery(this).focus().val('').val(val);
     
    });

});

function validateEmail(sEmail) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


  if(re.test(sEmail))
    return true;

    return false;
}



</script>


<?php
get_footer()
?>