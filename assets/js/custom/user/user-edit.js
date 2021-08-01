$(function () {
    fetchUserRole();
    fetchUser();
    $("#formID").submit(function (e) {

        e.preventDefault();
    }).validate({

        rules: {
        	

        },
        submitHandler: function (form) {
            var form = $('#formID')[0];
            var data = new FormData(form);
           	var url = conf.updateUser.url;
			var method = conf.updateUser.method;
			var id = TRIFED.getUrlParameters().user_id;
			data.append('form_id',id);
			TRIFED.fileAjaxHit(url, method, data, function (response) {
                if (response.status == 1) {
                    TRIFED.showMessage('success', 'Successfully Updated');
					setTimeout(function(){window.location ="user-listing.php"},1000);
                } else {
                    TRIFED.showError('error', response.message);
                }
            });
            //submit via ajax
            return false;  //This doesn't prevent the form from submitting.
        }
    });
});

fetchUser = () => {
	var url = conf.getUser.url;
    var method = conf.getUser.method;
    var data = {};
    var id = TRIFED.getUrlParameters().user_id;
    TRIFED.asyncAjaxHit(url+'/'+id, method, data, function (response, cb) {
        if (response) {
            data = response.data;
			fillUser(data);
            // $('#district').val(data.district).change();
        } else {
            TRIFED.showMessage('error', cb);
        }
    });
}

fillUser = (data) => {
	
	$('#user-type').val(data.role_id);
	$('#user_name').val(data.user_name);
	$('#name').val(data.name);
	$('#middle_name').val(data.middle_name);
	$('#last_name').val(data.last_name);
	

	
	$('#email').val(data.email);
	$('#mobile').val(data.mobile);
	
}

fetchUserRole = () => {
	var url = conf.getRole.url;
    var method = conf.getRole.method;
    var data = {};
    TRIFED.asyncAjaxHit(url, 'GET', data, function (response, cb) {
        if (response) {
            addressData = response.data;
            fillUserRole(response.data);
        } else {
            TRIFED.showMessage('error', cb);
        }
    });
}

fillUserRole = (roles) => {
	html = '<option value="0">Select Role</option>';
	$.each(roles, function(i, role) {
		html += '<option value="'+role.id+'">'+role.title+'</option>';
	});
	$('#user-type').html(html);
}


