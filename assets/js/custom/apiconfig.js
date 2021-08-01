const endpoint = 'http://127.0.0.1:8000/api/v1/';  

var conf = {

    'generatePassword': {
        'url': endpoint + 'generate-password',
        'method': 'POST',
    },

    'forgotPassword': {
        'url': endpoint + 'forgot-password',
        'method': 'POST',
    },

    'resetPassword': {
        'url': endpoint + 'reset-password',
        'method': 'POST',
    },
    'getLocCategories':{
        'url': endpoint + 'masters/location-category',
        'method': 'GET',
    },

    
    'login': {
        'url': endpoint + 'login',
        'method': 'POST',
    },

    'logout': {
        'url': endpoint + 'logout',
        'method': 'GET',
    },

    'changePassword': {
        'url': endpoint + 'change-password',
        'method': 'POST',
    },

    'getData': {
        'url': endpoint + 'getdata',
        'method': 'GET',
    },

    /* Get all masters */ 

    'getMasterData':{
        'url':endpoint + 'masters/data/',
        'method':'GET',
    },

    /* ID Proof */ 

    'addIdProof': {
        'url': endpoint + 'masters/id-proof',
        'method': 'POST',
    },

    'getIdProofList': {
        'url': endpoint + 'masters/id-proof',
        'method': 'GET',
    },
    'getIdProofData':{
        'url':endpoint + 'masters/id-proof/',
        'method':'GET',
    },

    'updateIdProofData':{
        'url':endpoint + 'masters/id-proof/',
        'method':'PUT',
    },
    'toggleIdProofStatus' : {
        url : function (id) {
            return endpoint + 'masters/id-proof/' + id + '/status';
        },
        'method' : 'POST'
    },
    'getTribalDetailFromIdProof': {
        'url': endpoint + 'proposal/getTribalDetailFromIdProof',
        'method': 'POST',
    },
    'getTribalDetailFromName': {
        'url': endpoint + 'proposal/getTribalDetailFromName',
        'method': 'POST',
    },
    
    'getProcurementAgentProposals' : {
        url : function (id) {
            return endpoint + 'proposal/getProcurementAgentProposals/' + id ;
        },
        'method' : 'POST'
    },
    'getProcurementAgentProposalsMfp': {
        url : function (id) {
            return endpoint + 'proposal/getProcurementAgentProposalsMfp/' + id;
        },
        'method' : 'GET'
    },
    'addMfpProcurementActualDetail': {
        'url': endpoint + 'proposal/mfp-procurement-actual-detail',
        'method' : 'POST'
    },
    'getMfpProcurementActualDetail': {
        'url': endpoint + 'proposal/mfp-procurement-actual-detail',
        'method' : 'GET'
    },
    'getMfpProcurementActualDetailView': {
        url : function (id) {
            return endpoint + 'proposal/mfp-procurement-actual-detail/' + id;
        },
        'method' : 'GET'
    },
    /* Year */ 

    'addYear': {
        'url': endpoint + 'masters/year',
        'method': 'POST',
    },
    
    'getYearList':{
        'url':endpoint + 'masters/year',
        'method':'GET',
    },

    'getYearData':{
        'url':endpoint + 'masters/year/',
        'method':'GET',
    },

    'updateYearData':{
        'url':endpoint + 'masters/year',
        'method':'PUT',
    },
    'toggleYearStatus' : {
        url : function (id) {
            return endpoint + 'masters/year/' + id + '/status';
        },
        'method' : 'POST'
    },

    /* Financial Year */ 

    'addFinancialYear': {
        'url': endpoint + 'masters/financial-year',
        'method': 'POST',
    },
    
    'getFinancialYearList':{
        'url':endpoint + 'masters/financial-year',
        'method':'GET',
    },

    'getFinancialYearData':{
        'url':endpoint + 'masters/financial-year/',
        'method':'GET',
    },

    'updateFinancialYearData':{
        'url':endpoint + 'masters/financial-year',
        'method':'PUT',
    },
    'toggleFinancialYearStatus' : {
        url : function (id) {
            return endpoint + 'masters/financial-year/' + id + '/status';
        },
        'method' : 'POST'
    },

    /* Designation */ 

    'addDesignation': {
        'url': endpoint + 'masters/designation',
        'method': 'POST',
    },

    'getDesignationList':{
        'url':endpoint + 'masters/designation',
        'method':'GET',
    },

    'getDesignationData':{
        'url':endpoint + 'masters/designation/',
        'method':'GET',
    },
    'updateDesignationData':{
        'url':endpoint + 'masters/designation/',
        'method':'PUT',
    },
    'toggleDesignationStatus' : {
        url : function (id) {
            return endpoint + 'masters/designation/' + id + '/status';
        },
        'method' : 'POST'
    },




    /* Department */ 

    'addDepartment': {
        'url': endpoint + 'masters/department',
        'method': 'POST',
    },

    'getDepartmentList':{
        'url':endpoint+'masters/department',
        'method':'GET',
    },

    'getDepartmentData': {
        'url': endpoint + 'masters/department/',
        'method': 'GET',
    },

    'updateDepartmentData': {
        'url': endpoint + 'masters/department/',
        'method': 'PUT',
    },

    'toggleDepartmentStatus' : {
        url : function (id) {
            return endpoint + 'masters/department/' + id + '/status';
        },
        'method' : 'POST'
    },

    

    /* Category */ 

    'addCategory': {
        'url': endpoint + 'masters/category',
        'method': 'POST',
    },

    'getCategoryList':{
        'url':endpoint + 'masters/category',
        'method':'GET'
    },

    'getCategoryData':{
        'url':endpoint + 'masters/category/',
        'method':'GET',
    },

    'updateCategoryData':{
        'url':endpoint + 'masters/category/',
        'method':'PUT'
    },

    'toggleCategoryStatus' : {
        url : function (id) {
            return endpoint + 'masters/category/' + id + '/status';
        },
        'method' : 'POST'
    },

    /* MFP Use */ 

    'addMfpUse': {
        'url': endpoint + 'masters/mfp-use',
        'method': 'POST',
    },

    'getMfpUse':{
        'url':endpoint + 'masters/mfp-use',
        'method':'GET'
    },

    'getMfpUse':{
        'url':endpoint + 'masters/mfp-use/',
        'method':'GET',
    },

    'updateMfpUse':{
        'url':endpoint + 'masters/mfp-use/',
        'method':'PUT'
    },

    'toggleMfpUseStatus' : {
        url : function (id) {
            return endpoint + 'masters/mfp-use/' + id + '/status';
        },
        'method' : 'POST'
    },

    

    'getUserStateWiseList':{
        'url':endpoint + 'user/userManagementlist',
        'method':'GET'
    },

    

    'getCommodityData':{
        'url':endpoint + 'masters/commodity/',
        'method':'GET',
    },

    'updateCommodityData':{
        'url':endpoint + 'masters/commodity/',
        'method':'PUT'
    },

    'toggleCommodityStatus' : {
        url : function (id) {
            return endpoint + 'masters/commodity/' + id + '/status';
        },
        'method' : 'POST'
    },
    'getCommodityStateWiseList':{
        'url':endpoint + 'masters/commoditystate',
        'method':'GET'
    },
    
    


   




    /* States*/ 

    'getStates': {
        'url': endpoint + 'masters/state',
        'method': 'GET',
    },

    /* Districts */ 

    'getDistricts': {
        'url': endpoint + 'masters/district',
        'method': 'GET',
    },
    

    /* Blocks */ 

    'getBlocks': {
        'url': endpoint + 'masters/block',
        'method': 'GET',
    },
    'getBlockByDistrict': {
        url : function (id) {
            return endpoint + 'masters/block_by_district/'+id;
        },
        'method': 'GET',
    },
    
    'addRole': {
        'url': endpoint + 'masters/role',
        'method': 'POST',
    }, 
    'getRole': {
        'url': endpoint + 'masters/user-role',
        'method': 'GET',
    },
    'getRolesListing': {
        'url': endpoint + 'masters/role-listing',
        'method': 'GET',
    },
    'toggleRoleStatus' : {
        url : function (id) {
            return endpoint + 'masters/role/' + id + '/status';
        },
        'method' : 'POST'
    },
    'viewRole': {
        url : function (id) {
            return endpoint + 'masters/role/' + id ;
        },
        'method' : 'GET'

    },
    'updateRole': {
        url : function (id) {
            return endpoint + 'masters/role/' + id ;
        },
        'method' : 'PUT'

    },
   
    'getUserManagementRole': {
        'url': endpoint + 'masters/user-management-role',
        'method': 'GET',
    },

    'getUser': {
        'url': endpoint + 'user',
        'method': 'GET',
    },

    'getCurrentUserHaatInfo': {
        'url': endpoint + 'getCurrentUserHaatInfo',
        'method': 'GET',
    },

    

    'addUser': {
        'url': endpoint + 'user',
        'method': 'POST',
    }, 
    'changeUserStatus': {
        'url': function (user_id) {
            return endpoint + 'user/status/' + user_id; 
        },
        'method': 'PUT',
    },  
    /** User Bank Details */ 

    'getUserBankDetails': {
        'url': function (user_id) {
            return endpoint + 'bank-details/' + user_id; 
        },
        'method': 'GET',
    },
   
    'updateUser': {
        'url': endpoint + 'user',
        'method': 'POST',
    },

    

     /* Village */ 

     'addVillage': {
        'url': endpoint + 'masters/village',
        'method': 'POST',
    },

    'getVillageList':{
        'url':endpoint + 'masters/village',
        'method':'GET',
    },
  
    'exportVillageData':{
        'url':endpoint + 'masters/villageExport/export',
        'method':'GET',
    },

    'importExcelVillage':{
        'url':endpoint + 'masters/village/importExcel',
        'method':'POST',
    },

    'getVillageData':{
        'url':endpoint + 'masters/village/',
        'method':'GET',
    },

    'updateVillageData':{
        'url':endpoint + 'masters/village/',
        'method':'PUT'
    },
    'toggleVillageStatus' : {
        url : function (id) {
            return endpoint + 'masters/village/' + id + '/status';
        },
        'method' : 'POST'
    },
    
    
    

    /* States */ 

    'addState': {
        'url': endpoint + 'masters/state',
        'method': 'POST',
    },
 
    'getStateList':{
        'url':endpoint + 'masters/state',
        'method':'GET',
    },
 
    'getStateData':{
        'url':endpoint + 'masters/state/',
        'method':'GET',
    },
 
    'updateStateData':{
        'url':endpoint + 'masters/state/',
        'method':'PUT'
    },
    'toggleStateStatus' : {
        url : function (id) {
            return endpoint + 'masters/state/' + id + '/status';
        },
        'method' : 'POST'
    },

    /* District */ 

    'addDistrict': {
        'url': endpoint + 'masters/district',
        'method': 'POST',
    },
 
    'getDistrictList':{
        'url':endpoint + 'masters/location',
        'method':'GET',
    },
 
    'getDistrictData':{
        'url':endpoint + 'masters/district/',
        'method':'GET',
    },
 
    'updateDistrictData':{
        'url':endpoint + 'masters/district/',
        'method':'PUT'
    },
    'toggleDistrictStatus' : {
        url : function (id) {
            return endpoint + 'masters/district/' + id + '/status';
        },
        'method' : 'POST'
    },
 
    // 'getStateList':{
    //     'url':endpoint + 'masters/state/',
    //     'method':'PUT'
    // },
    'getStateListing':{
        'url':endpoint + 'masters/state/',
        'method':'PUT'
    },

    /* Block */ 

    'getBlockMaster':{
        'url':endpoint + 'masters/block-location/',
        'method':'GET'
    },
    'addBlock': {
        'url': endpoint + 'masters/block',
        'method': 'POST',
    },
    'getBlockData':{
        'url':endpoint + 'masters/block/',
        'method':'GET',
    },
    'getBlockWithStateData':{
        'url':endpoint + 'masters/block-location/',
        'method':'GET',
    },
    'updateBlockData':{
        'url':endpoint + 'masters/block/',
        'method':'PUT'
    },
    'toggleBlockStatus' : {
        url : function (id) {
            return endpoint + 'masters/block/' + id + '/status';
        },
        'method' : 'POST'
    },

    


    /* Level */ 

    'addLevel': {
        'url': endpoint + 'masters/level',
        'method': 'POST',
    },
 
    'getLevelList':{
        'url':endpoint + 'masters/level',
        'method':'GET',
    },
 
    'getLevelData':{
        'url':endpoint + 'masters/level/',
        'method':'GET',
    },
 
    'updateLevelData':{
        'url':endpoint + 'masters/level/',
        'method':'PUT'
    },
    'getLevel':{
        'url': function (level_id) {
            return endpoint + 'masters/level/' + level_id; 
        },
        'method': 'GET',
    },
    'getHaatMarket' : {
        url : function (id) {
            return endpoint + 'haat-market/get-all/'+id;
        },
       'method': 'GET',
   },
    'getBankList':{
        'url':endpoint + 'masters/bank',
        'method':'GET',
    },

    'importUserExcel':{
        'url':endpoint + 'user/importExcel',
        'method':'POST'
    },

     'getPermissionList':{
        'url':endpoint + 'masters/permission',
        'method':'GET',
    },
    'getRolesList': {
        'url': endpoint + 'masters/role',
        'method': 'GET',
    },

   
     
    /**** Role Mapping routes**/
    'getRolesMapping': {
        'url': function (id) {
            return endpoint + 'masters/permission-mapping/' + id; 
        },
        'method': 'GET',
    },
    'addRolesMapping' : {
        'url': endpoint + 'masters/permission-mapping',
        'method': 'POST'
    },
    'addUsersPermissionMapping' : {
        'url': endpoint + 'users/add-permission-mapping',
        'method': 'POST'
    },
    'getUserPermissionMapping': {
        'url': function (id) {
            return endpoint + 'users/permission-mapping/' + id; 
        },
        'method': 'GET',
    },
    
    /*User Profile*/
    'getUserProfile':{
        'url': endpoint + 'get-profile',
        'method': 'GET'
    },
    'updateUserProfile' : {
        'url': endpoint + 'update-profile',
        'method': 'PUT'
    },
    

    'getNotification':{
        'url':endpoint + 'notification/',
        'method':'GET',
    },

    'markNotificationRead':{
        url : function (id) {
            return (
              endpoint + "notification/" + id
            );
        },
        'method':'PUT',
    },

    'MarkAllNotificationRead':{
        'url':endpoint + 'notification/mark-all-read/',
        'method':'GET',
    },

    'getNotificationCount':{
        'url':endpoint + 'notification/count/',
        'method':'GET',
    },
    
    'getUserActivityLog': {
        'url': endpoint + 'users/user-activity-log',
        'method': 'GET',
    },
	
}
