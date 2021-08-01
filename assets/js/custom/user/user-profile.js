$(function () {
    updateProfile();
    getProfile();
	updateMoProfileCertificate();
});


var profileIds = [
	'name',
	'middle_name',
	'last_name',
	'email',
	'mobile_no',
];


getProfile = () =>{
	var url = conf.getUserProfile.url;
	var method = conf.getUserProfile.method;
	var data = {};
	var localStorage = TRIFED.getLocalStorageItem();
	TRIFED.asyncAjaxHit(url, method, data, function (response, cb) {
		if (response.status) {

			profileIds.forEach(id =>{
				$('#'+id).val(response.data[id]);				
			})

			/**/

		}
	});
}


updateProfile = () => {
	$('#formID').on('submit',function(e) {
		e.preventDefault();

		var data = {};
		data.user_bank_details={};
		data.mo_details={};

		profileIds.forEach( (id)=>{
			if($('#'+id).val()){
				data[id] = $('#'+id).val().trim();
			}
		})

		

		var url = conf.updateUserProfile.url;
    	var method = conf.updateUserProfile.method;

		TRIFED.asyncAjaxHit(url, method, data, function (response) {
	        if (response.status == 1) {
	        	$('#formID')[0].reset();
	            TRIFED.showMessage('success', 'Successfully updated');
	            setTimeout(function() { window.location = '../auth/dashboard.php'}, 500);
	        } else {
	            TRIFED.showError('error', response.message);
	        }
    	});
	})
}


updateMoProfileCertificate = () => {
		$('#certificate').on('change',function(e){
			if($('#certificate').prop('files')[0]){
				var formData = new FormData();
				var file = $('#certificate').prop('files')[0];
		        formData.append('registration_certificate', file );
			}

			var url = conf.updateMoProfileCertificate.url;
	    	var method = conf.updateMoProfileCertificate.method;

			TRIFED.fileAjaxHit(url, method, formData, function (response) {
		        if (response.status == 1) {
		            TRIFED.showMessage('success', 'Registration Certification Changed Successfully');
		        } else {
		            TRIFED.showError('error', response.message);
		        }
	    	});
		})

}

/* Bank Dept Details Hide and Show */
$(document).ready(function(){
  $("#BankDept").click(function(){
    $("div#BankDeptArea").toggle();
  });
});