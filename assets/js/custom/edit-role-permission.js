var allowed_permissions=[];

 var url_var=getUrlVars(); 
  role_id=url_var['id'];
$(function() {
  //getRoles();
  getPermissions();  
  getSetPermission();
 
  if (role_id != undefined && role_id != '') {
    $("#role_id").val(role_id);
    fetchRole(role_id);
  }
});

fetchRole = (role_id) => {
  var url = conf.viewRole.url(role_id);
  var method = conf.viewRole.method;
  var data = {};
  TRIFED.asyncAjaxHit(url, method, data, function (response, cb) {
    if (response) {
      data = response.data;  
      $(".roleTitle").html(data.title);
    } else {
      TRIFED.showMessage('error', cb);
    }
  });
}
 
const mustacheTemplates = {
  permission: "#listPermission",
  permissionHeading: "#listPermissionHeading"
};

const permissionGroups = [];

function processMustacheTemplates() {
  for (template in mustacheTemplates) {
    const source = $(mustacheTemplates[template]).html();
    mustacheTemplates[template] = source;
    Mustache.parse(source);
  }
}

processMustacheTemplates(); 
getPermissions = () => {
  var url = conf.getPermissionList.url;
  var method = conf.getPermissionList.method;
  var data = {};
  var options = "";
  TRIFED.asyncAjaxHit(url, method, data, function(response, cb) {
    if (response) {
      renderPermissions(response.data);
      return;
    }
  });
};

function renderPermissions(data) {
  $("#permission_container").html("");
  let index = 1;
  let disable=1;

  for (const group in data) {
    permissionGroups.push(group);
    const _data = {
      index: index,
      type: "th",
      name: utils.applyDictionary(ucFirstAllWords(group)),
      group: group
    };
    appendRow(mustacheTemplates.permissionHeading, _data);
    if (Array.isArray(data[group])) {

      data[group].forEach(v => {
        if(allowed_permissions[role_id]!=undefined)
        {
          allow_array=allowed_permissions[role_id];
          if($.inArray(v.alias, allow_array) != -1) {
            disable=0;
          }else{
            disable=1;
          }
        }else{
          disable=0;
        }
        
        const data = {
          name: v.description,
          group: group,
          type: "td",
          id: v.id,
          disable:disable,
          alias:v.alias
        };
        appendRow(mustacheTemplates.permission, data);
          
          
      });
    }
    index++;

  }

  permissionGroups.forEach(permission => {
    const all = $(".permissions." + permission).length;
    const disabled = $(".permissions." + permission + ":disabled").length;
    if (all == disabled) {
      $('#' + permission).prop("disabled", true);
    }
  });
}

function ucFirstAllWords( str )
{
    var pieces = str.split("_");
    for ( var i = 0; i < pieces.length; i++ )
    {
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1);
    }
    return pieces.join(" ");
}

function appendRow(template, _data) {
  const rendered = Mustache.render(template, _data);
  $("#permission_container").append(rendered);
}

function check_uncheck_checkbox(isChecked) {
  if (isChecked) {
    $('.permissions').each(function() {
      this.checked = true;
    });
  } else {
    $('.permissions').each(function() {
      this.checked = false;
    });
  }
}

/**
 * Renders option element
 * @param {string} id ID
 * @param {Array} records
 */
function renderOptionElements(id, records) {
  const el = $("select" + id);
  el.html("");
  el.append($('<option value="">').text("Please Select"));
  records.forEach(element => {
    el.append(
      $("<option>")
        .val(element.id)
        .text(element.title)
    );
  });
}
 function getSetPermission() { 
  $(".permissions").each(function() {
    this.checked = false;
  });
  var url_var=getUrlVars();  
  var role_id = url_var['id'];
  var url = conf.getRolesMapping.url(role_id);
  var method = conf.getRolesMapping.method;
  var data = {};
  var options = "";
  TRIFED.asyncAjaxHit(url, method, data, function(response, cb) {
    if (response) {
      response_data = response.data;
      $.each(response_data, function(i, item) {
        var permission_id = response_data[i].permission_id;
        $("#permission-" + permission_id).prop("checked", true);
      });
      afterSettingPermissions();
    }
  });
}
$(document).ready(function() {
  $("#formId").validate({
    rules: {
      role_id: "required"
    },
    messages: {
      role_id: "Please select role"
    }
  });

  $("#save").click(function() {
    if ($("#formId").valid()) {
      var url = conf.addRolesMapping.url;
      var method = conf.addRolesMapping.method;
      var data = $("#formId").serializeArray();
if (confirm("Are you sure you want to change the role permissions"))
  {
      TRIFED.asyncAjaxHit(url, method, data, function(response) {
        if (response.status == 1) {
          response_data = response.data;

          TRIFED.showMessage("success", "Successfully Added");

          setTimeout(() => {}, 1000);
        } else {
          TRIFED.showError("error", response.message);
          z = false;
        }
      });
    }
    }
  });
});

function ucFirst(s) {
  if (typeof s !== "string") return "";
  return s.charAt(0).toUpperCase() + s.slice(1);
}

function selectGroup(group, checked) {
  $("." + group).each(function(i, v) {
    v.checked = checked;
  });
}

function afterSettingPermissions() {
  toggleMasterPermissions();
}

function toggleMasterPermissions() {
  permissionGroups.forEach(permission => {
    const all = $(".permissions." + permission).length;
    const checked = $(".permissions." + permission + ":checked").length;
    if (all == checked) {
      $('#' + permission).prop("checked", true);
    }
  });
}

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
function setPermission(element)
{
  var value=element.value;
  //alert(value)
  if ($(element).is(':checked')) {
    //Master Management
    if(value==2 || value==3)
    {
        $('input[type=checkbox][value=1]').prop('checked', true);
    }
    if(value==6 || value==7)
    {
        $('input[type=checkbox][value=5]').prop('checked', true);
    }
    //Role Mapping
    if(value==10 || value==11)
    {
        $('input[type=checkbox][value=9]').prop('checked', true);
    }
    //User Management
    if(value==13 || value==14)
    {
        $('input[type=checkbox][value=15]').prop('checked', true);
    }
    //MFP Procurement Plan
    if(value==19 || value==20)
    {
        $('input[type=checkbox][value=18]').prop('checked', true);
    }
    //Infrastructure Development
    if(value==23 || value==24)
    {
        $('input[type=checkbox][value=22]').prop('checked', true);
    }
    //MFP Details
    if(value==26)
    {
        $('input[type=checkbox][value=27]').prop('checked', true);
    }
    //Fund Management
    if(value==28 || value==29 || value==30 || value==31 || value==32 || value==33 || value==34 || value==35)
    {
        $('input[type=checkbox][value=18]').prop('checked', true);
    }
    //MFP Procurement Actual Details
    if(value==37 || value==38)
    {
        $('input[type=checkbox][value=36]').prop('checked', true);
    }
  }
  
}