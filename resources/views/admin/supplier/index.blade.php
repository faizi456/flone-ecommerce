@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12">
              <button class="btn float-end p-2" id="btn" onclick="createSupplierForm()"> 
                <i class="feather-sm" data-feather="plus-circle"></i> Add Supplier
              </button>
            </div>
            <div class="col-5 align-self-center">
             
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  
                </nav>
              </div>
            </div>
            <div class="d-flex no-block justify-content-end align-items-center">
              
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="card" style="margin: 0px auto; box-shadow: 0px 3px 7px 0px rgba(107, 107, 107, 0.349);">
                <div class="card-header">
                    <h4>All Categories</h4>
                </div>
                <div class="card-body">
                    <div id="alert-div">
                     
                    </div>
                    <div class="table-responsive">
                      <table id="example" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-1"></div>
          </div>
      </div>
    
   <!-- modal for creating and editing function -->
   <div class="modal" tabindex="-1"  id="form-modal">
    <div class="modal-dialog" >
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Supplier Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="error-div"></div>
            <form>
                <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="mobile">Contact No.</label>
                <input type="number" class="form-control" id="mobile" name="mobile">
            </div>
                <button type="submit" class="btn btn-sm mt-2" id="form-submit">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
   
@include('admin.footer')

    
<script type="text/javascript">
  
    showAllSuppliers();
 
    /*
        This function will get all the Category records
    */
    function showAllSuppliers()
    {
        $.ajax({
            url: '/supplier/create',
            type: "GET",
            success: function(response) {
                $("#table-body").html("");
                let suppliers = response.suppliers;
                for (var i = 0; i < suppliers.length; i++) 
                {
                    let editBtn =  '<button ' +
                        ' class="btn btn-outline-success btn-sm" ' +
                        ' onclick="editSupplier(' + suppliers[i].id + ')">Edit' +
                    '</button> ';
                    let deleteBtn =  '<button ' +
                        ' class="btn btn-outline-danger btn-sm" ' +
                        ' onclick="destroySupplier(' + suppliers[i].id + ')">Delete' +
                    '</button>';
 
                    let Row = '<tr>' +
                        '<td>' + editBtn + deleteBtn + '</td>' +
                        '<td>' + suppliers[i].name + '</td>' +
                        '<td>' + suppliers[i].email + '</td>' +
                        '<td>' + suppliers[i].mobile + '</td>' +
                    '</tr>';
                    $("#table-body").append(Row);
                }
 
                 
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
 
    /*
        check if form submitted is for creating or updating
    */
    $("#form-submit").click(function(event ){
        event.preventDefault();
        if($("#update_id").val() == null || $("#update_id").val() == "")
        {
            storeSupplier();
        }else{
            updateSupplier();
        }
    })
 
    /*
        show modal for creating a record and 
       
    */
    function createSupplierForm()
    {
        $("#alert-div").html("");
        $("#error-div").html("");   
        $("#update_id").val("");
        $("#name").val("");
        $("#email").val("");
        $("#mobile").val("");
        $("#form-modal").modal('show'); 
    }
 
    /*
        submit the form and will be stored to the database
    */
    function storeSupplier()
    {
        $("#form-submit").prop('disabled', true);
        let data = {
            name: $("#name").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/supplier',
            type: "POST",
            data: data,
            success: function(response){
                $("#form-submit").prop('disabled', false);
                $("#alert-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">Supplier is added successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $("#name").val("");
                $("#email").val("");
                $("#mobile").val("");
                showAllSuppliers();
                $("#form-modal").modal('hide');
            },
            error: function(response) {
                $("#form-submit").prop('disabled', false);
 
                /*
                    show validation error
                */
                if (typeof response.responseJSON.errors !== 'undefined') 
                {
                    let errors = response.responseJSON.errors;
                    // email
                    let emailValidation = "";
                    if (typeof errors.email !== 'undefined') 
                    {
                        emailValidation = '<li>' + errors.email[0] + '</li>';
                    }
                    // name
                    let nameValidation = "";
                    if (typeof errors.name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.name[0] + '</li>';
                    }
                    // mobile
                    let mobileValidation = "";
                    if (typeof errors.mobile !== 'undefined') 
                    {
                        mobileValidation = '<li>' + errors.mobile[0] + '</li>';
                    }
                    let errorHtml = '<div class="alert alert-danger" role="alert">' +
                        '<b>Validation Error!</b>' +
                        '<ul>' + nameValidation + emailValidation + mobileValidation + '</ul>' +
                    '</div>';
                    $("#error-div").html(errorHtml);        
                }
            }
        });
    }
 
 
    /*
        edit record function
        it will get the existing value and show the Category form
    */
    function editSupplier(id)
    {
        let url = 'supplier/'+ id ;
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                let supplier = response.supplier;
                $("#alert-div").html("");
                $("#error-div").html("");   
                $("#update_id").val(supplier.id);
                $("#name").val(supplier.name);
                $("#email").val(supplier.email);
                $("#mobile").val(supplier.mobile);
                $("#form-modal").modal('show'); 
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
     
 
    /*
        sumbit the form and will update a record
    */
    function updateSupplier()
    {
        $("#form-submit").prop('disabled', true);
        let url = "supplier/" + $("#update_id").val();
        let data = {
            id: $("#update_id").val(),
            name: $("#name").val(),
            email: $("#email").val(),
            mobile: $("#mobile").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "PUT",
            data: data,
            success: function(response){
                $("#form-submit").prop('disabled', false);
                $("#alert-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">Supplier is updated successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $("#name").val("");
                $("#email").val("");
                $("#mobile").val("");
                showAllSuppliers();
                $("#form-modal").modal('hide');
            },
            error: function(response){
                /*
                    show validation error
                */
                $("#form-submit").prop('disabled', false);
                if (typeof response.responseJSON.errors !== 'undefined') 
                {
                    console.log(response)
                    let errors = response.responseJSON.errors;
                    // email
                    let emailValidation = "";
                    if (typeof errors.email !== 'undefined') 
                    {
                        emailValidation = '<li>' + errors.email[0] + '</li>';
                    }
                    // name
                    let nameValidation = "";
                    if (typeof errors.name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.name[0] + '</li>';
                    }
                    // mobile
                    let mobileValidation = "";
                    if (typeof errors.mobile !== 'undefined') 
                    {
                        mobileValidation = '<li>' + errors.mobile[0] + '</li>';
                    }
                    let errorHtml = '<div class="alert alert-danger" role="alert">' +
                        '<b>Validation Error!</b>' +
                        '<ul>' + nameValidation + emailValidation + mobileValidation + '</ul>' +
                    '</div>';
                    $("#error-div").html(errorHtml);        
                }
            }
        });
    }


    /*
        delete record function
    */
    function destroySupplier(id)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "supplier/" + id,
            type: "DELETE",
            success: function(response) {
                let successHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">Supplier record is deleted successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $("#alert-div").html(successHtml);
                showAllSuppliers();
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
 
</script>

