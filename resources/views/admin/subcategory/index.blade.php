@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12">
              <button class="btn float-end p-2" id="btn" onclick="createSubCategoryForm()"> 
                <i class="feather-sm" data-feather="plus-circle"></i> Add SubCategory
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
                    <h4>All SubCategories</h4>
                </div>
                <div class="card-body">
                    <div id="alert-div">
                     
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Main Category</th>
                                    <th>Description</th>
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
            <h5 class="modal-title">SubCategory Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="error-div"></div>
            <form>
                <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                    <label for="subcat_name">Name</label>
                    <input type="text" class="form-control" id="subcat_name" name="subcat_name" required>
                </div>
                <div class="form-group">
                    <label for="main_cat">Main Category</label>
                    <select name="main_cat" id="main_cat" required class="form-control">
                        <option value="">SELECT</option>
                        @foreach($subCategories as $subcat)
                        <option value="{{$subcat->cat->id}}">{{$subcat->cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
                </div>
             
                <button type="submit" class="btn btn-sm mt-2" id="form-submit">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
   
@include('admin.footer')

<script>

    showAllSubCategories();

    function showAllSubCategories()
    {
        $.ajax({
            url: '/subcategory/create',
            type: "GET",
            success: function(response) {
                $("#table-body").html("");
                let subCategories = response.subCategories;
                for (var i = 0; i < subCategories.length; i++) 
                {
                    let editBtn =  '<button ' +
                        ' class="btn btn-outline-success btn-sm" ' +
                        ' onclick="editSubCategory(' + subCategories[i].sub_id + ')">Edit' +
                    '</button> ';
                    let deleteBtn =  '<button ' +
                        ' class="btn btn-outline-danger btn-sm" ' +
                        ' onclick="destroySubCategory(' + subCategories[i].sub_id + ')">Delete' +
                    '</button>';
 
                    let Row = '<tr>' +
                        '<td>' + editBtn + deleteBtn + '</td>' +
                        '<td>' + subCategories[i].subcat_name + '</td>' +
                        '<td>' + subCategories[i].cat.name+ '</td>' +
                        '<td>' + subCategories[i].description + '</td>' +
                    '</tr>';
                    $("#table-body").append(Row);
                }                
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }



    function createSubCategoryForm()
    {
        $("#alert-div").html("");
        $("#error-div").html("");   
        $("#update_id").val("");
        $("#subcat_name").val("");
        $("#description").val("");
        $("#form-modal").modal('show'); 
    }



    $("#form-submit").click(function(event ){
        event.preventDefault();
        if($("#update_id").val() == null || $("#update_id").val() == "")
        {
            storeSubCategory();
        }else{
            updateSubCategory();
        }
    })



    function storeSubCategory()
    {
        $("#form-submit").prop('disabled', true);
        let data = {
            subcat_name: $("#subcat_name").val(),
            main_cat: $("#main_cat").val(),
            description: $("#description").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/subcategory',
            type: "POST",
            data: data,
            success: function(response){
                $("#form-submit").prop('disabled', false);
                $("#alert-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">SubCategory is added successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $("#subcat_name").val("");
                $("#main_cat").val("");
                $("#description").val("");
                showAllSubCategories();
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
                    // description
                    let descriptionValidation = "";
                    if (typeof errors.description !== 'undefined') 
                    {
                        descriptionValidation = '<li>' + errors.description[0] + '</li>';
                    }
                    // name
                    let nameValidation = "";
                    if (typeof errors.subcat_name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.subcat_name[0] + '</li>';
                    }
                    // main category
                    let main_cateValidation = "";
                    if (typeof errors.main_cate !== 'undefined') 
                    {
                        main_cateValidation = '<li>' + errors.main_cate[0] + '</li>';
                    }
                    let errorHtml = '<div class="alert alert-danger" role="alert">' +
                        '<b>Validation Error!</b>' +
                        '<ul>' + nameValidation + descriptionValidation + main_cateValidation + '</ul>' +
                    '</div>';
                    $("#error-div").html(errorHtml);        
                }
            }
        });
    }
 


    function editSubCategory(sub_id)
    {
        let url = 'subcategory/'+ sub_id ;
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                let subCategory = response.subCategory;
                $("#alert-div").html("");
                $("#error-div").html("");   
                $("#update_id").val(subCategory.sub_id);
                $("#subcat_name").val(subCategory.subcat_name);
                $("#main_cat").val(subCategory.main_cat);
                $("#description").val(subCategory.description);
                $("#form-modal").modal('show');
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }
     


    function updateSubCategory()
    {
        $("#form-submit").prop('disabled', true);
        let url = "subcategory/" + $("#update_id").val();
        let data = {
            sub_id: $("#update_id").val(),
            subcat_name: $("#subcat_name").val(),
            main_cat: $("#main_cat").val(),
            description: $("#description").val(),
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
                $("#alert-div").html('<div class="alert alert-success alert-dismissible fade show" role="alert">SubCategory is updated successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $("#subcat_name").val("");
                $("#main_cat").val("");
                $("#description").val("");
                showAllSubCategories();
                $("#form-modal").modal('hide');
            },
            error: function(response){
                /*
                    show validation error
                */
                $("#form-submit").prop('disabled', false);
                if (typeof response.responseJSON.errors !== 'undefined') 
                {
                    let errors = response.responseJSON.errors;
                    // description
                    let descriptionValidation = "";
                    if (typeof errors.description !== 'undefined') 
                    {
                        descriptionValidation = '<li>' + errors.description[0] + '</li>';
                    }
                    // name
                    let nameValidation = "";
                    if (typeof errors.subcat_name !== 'undefined') 
                    {
                        nameValidation = '<li>' + errors.subcat_name[0] + '</li>';
                    }
                    // main category
                    let main_cateValidation = "";
                    if (typeof errors.main_cate !== 'undefined') 
                    {
                        main_cateValidation = '<li>' + errors.main_cate[0] + '</li>';
                    }
                    let errorHtml = '<div class="alert alert-danger" role="alert">' +
                        '<b>Validation Error!</b>' +
                        '<ul>' + nameValidation + descriptionValidation + main_cateValidation + '</ul>' +
                    '</div>';
                    $("#error-div").html(errorHtml);        
                }
            }
        });
    }



    function destroySubCategory(sub_id)
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "subcategory/" + sub_id,
            type: "DELETE",
            success: function(response) {
                showAllSubCategories();
                let successHtml = '<div class="alert alert-success alert-dismissible fade show" role="alert">SubCategory is deleted successfully! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                $("#alert-div").html(successHtml); 
            },
            error: function(response) {
                console.log(response.responseJSON)
            }
        });
    }


</script>