$(document).ready(function() {
    // employee group update ===========================================================

    // Event listener for button click
    $('button.btn-employee-group-edit').on('click', function() {
        // Get the data attributes from the clicked button
        var groupName = $(this).data('name');
        var id = $(this).data('id');
        // Fill the input fields with the retrieved values
        $('#id').val(id); // Set the value of the hidden input
        $('input[name="group_name"]').val(groupName); // Set the value of the text input
    });
    // delete list
    $('button.btn-delete-emp_group').on('click',function(){
        var id = $(this).data('id');
        
        $('#delete-id').val(id);
    });
    
    // sardar list  =====================================================================
    $('button.btn-sardar-edit').on('click',function(){
        var id = $(this).data('id');
        var consultancy_name = $(this).data('consultancy_name');
        var contact_person = $(this).data('contact_person');
        var address = $(this).data('address');
        var aadhar_number = $(this).data('aadhar_number');
        var mobile1 = $(this).data('mobile1');
        var mobile2 = $(this).data('mobile2');

        $('#id').val(id);
        $('#consultancy_name').val(consultancy_name);
        $('#contact_person').val(contact_person);
        $('#address').val(address);
        $('#aadhar').val(aadhar_number);
        $('#mobile1').val(mobile1);
        $('#mobile2').val(mobile2);
    });
    // delete list
    $('button.btn-delete-sardar').on('click',function(){
        var id = $(this).data('id');
        
        $('#delete-id').val(id);
    });

    // delete labour ====================================================================
    $('button.btn-delete-labour').on('click',function(){
        var id = $(this).data('id');
        $('#delete-id').val(id);
    });

    // vehical group =====================================================================

    $('button.btn-vehical-group-edit').on('click',function(){
        var id = $(this).data('id');
        var group_name = $(this).data('group_name');

        $('#id').val(id);
        $('#group_name').val(group_name);
    });
    // delete vehical group
    $('button.btn-delete-vehical-group').on('click',function(){
        var id = $(this).data('id');
        $('#delete-id').val(id);
    });
    
    // Vehical Owner ======================================================================
    $('button.btn-vehical-owner-edit').on('click',function(){        
        var id = $(this).data('id');
        var company_name = $(this).data('company_name');
        var owner_name = $(this).data('owner_name');
        var gst_number = $(this).data('gst_number');
        var registration = $(this).data('registration');
        // console.log("reg" + registration)

        $('#id').val(id);
        $('#company_name').val(company_name);
        $('#owner_name').val(owner_name);
        $('#gst').val(gst_number);
        $('#registration').val(registration);        
    });

    $('button.btn-delete-vehical-owner').on('click',function(){
        var id = $(this).data('id');
        $('#delete-id').val(id);
    });
    // Vehical List
    $('button.btn-delete-vehical-list').on('click',function(){
        var id = $(this).data('id');
        $('#delete-id').val(id);
    });
    // Owner Edit =========================================================================
    $('button.btn-land-owner-edit').on('click',function(){
        var id = $(this).data('id');
        var owner_name = $(this).data('owner_name');
        var owner_address = $(this).data('address');
        var begha = $(this).data('begha');
        var land_location = $(this).data('location');
        var contract_amt = $(this).data('contract_amt');
        var from_date = $(this).data('from_date');
        var to_date = $(this).data('to_date');
        var agg_date = $(this).data('agg_date');
        var other = $(this).data('other');
        
        $('#id').val(id);
        $('#owner_name').val(owner_name);
        $('#owner_address').val(owner_address);
        $('#bigha').val(begha);
        $('#ploat_location').val(land_location);
        $('#from_edit_date').val(from_date);
        $('#to_date').val(to_date);
        $('#contract_amt').val(contract_amt);
        $('#contract_date').val(agg_date);
        $('#other_details').val(other);
    });
    // change status
    $('button.btn-land-owner-change-status').on('click',function(){
        var id = $(this).data('id');
        $('#status-id').val(id);
    });
    // Soil Owner =========================================================================
    $('button.btn-soil-owner-edit').on('click',function(){
        var id = $(this).data('id');
        var owner_name = $(this).data('owner_name');
        var owner_mobile = $(this).data('owner_mobile');
        var address = $(this).data('address');
        var begha = $(this).data('begha');
        var contract_amt = $(this).data('contract_amt');

        $('#id').val(id);
        $('#owner_name').val(owner_name);
        $('#ploat_location').val(address);
        $('#owner_mobile').val(owner_mobile);
        $('#bigha').val(begha);
        $('#contract_amt').val(contract_amt);
    });
});