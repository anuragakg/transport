$(function () {
    fetchUserRole();
    $("#formID").submit(function (e) {

        // e.preventDefault();
    }).validate({

        rules: {
        	

        },  
        submitHandler: function (form) {
            var form = $('#formID')[0];
            var data = new FormData(form);
           	var url = conf.addUser.url;
			var method = conf.addUser.method;
           
            TRIFED.fileAjaxHit(url, method, data, function (response) {
                if (response.status == 1) {
                    TRIFED.showMessage('success', 'Successfully Added');
					setTimeout(function() { window.location = 'user-listing.php'}, 500);

                } else {
                    TRIFED.showError('error', response.message);
                }
            });
            //submit via ajax
            return false;  //This doesn't prevent the form from submitting.
        }
    });

});

fetchUserRole = () => {
	var url = conf.getUserManagementRole.url;
    var method = conf.getUserManagementRole.method;
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
		html += '<option value="'+role.id+'">'+utils.generateAbbreviation(role.title)+'</option>';
	});
	$('#user-type').html(html);
}


/* Datepicker */
$(document).ready(function() {
    $('#data-calendar1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'dd/mm/yyyy',
        startDate: new Date('1920-01-01'),
        endDate: new Date()

    });
});

