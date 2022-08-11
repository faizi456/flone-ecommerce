@include('admin.header')

@include('admin.sidebar')
<div class="page-wrapper">
  <!-- -------------------------------------------------------------- -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- -------------------------------------------------------------- -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <div class="d-flex align-items-center">
        </div>
      </div>
      <div class="col-12 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <div class="">
              <button class="btn float-end p-2 mx-1" id="btn" data-bs-toggle="modal"
              data-bs-target="#attributeValueModal"><i class="feather-sm" data-feather="plus-circle"></i> Add Attribute Value</button>
              <a class="btn float-end p-2" id="btn" data-bs-toggle="modal"
              data-bs-target="#attributeModal"><i class="feather-sm" data-feather="plus-circle"></i> Add Attribute</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- -------------------------------------------------------------- -->
  <!-- End Bread crumb and right sidebar toggle -->
  <div class="container-fluid">
    <!-- -------------------------------------------------------------- -->
    <!-- Start Page Content -->
    <!-- -------------------------------------------------------------- -->
    <!-- File export -->
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 m-auto">
        <div class="card" style="box-shadow: 0px 0px 15px -5px rgba(0, 0, 0, 0.534); border-radius:8px;">
          <div class="border-bottom title-part-padding">
            <h4 class="card-title mb-0">View Attributes</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered display">
                <thead>
                  <tr>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Attribute Value</th>
                  </tr>
                </thead>
                <tbody id="tabledata">
                  @foreach($attributes as $attr)
                  <tr>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm btn-outline-danger data-del" data-id="{{$attr->id}}"><i
                          class="fa fa-trash"></i></button>
                    </td>
                    <td class="text-center">{{$attr->name}}</td>
                    <td class="text-center">
                      <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                      data-bs-target="#viewAttributeModal_{{$attr->id}}">View</button>

                      <div class="modal" id="viewAttributeModal_{{$attr->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="margin-top: -20px;">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered display">
                                  <thead> 
                                    <tr>
                                      <td colspan="3" class="text-center"><h4>{{ $attr->name }} Availabale</h4></td>
                                    </tr>
                                  </thead>
                                  <tbody id="valuetabledata">
                                    @php $i = 1; @endphp
                                    @foreach($attributeValues as $value)
                                      @if($value->attr->id == $attr->id)
                                        <tr>
                                          <td>{{$i}}</td>
                                          <td>{{$value->value}}</td>
                                          <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-outline-dark delete" data-id="{{$value->id}}"><i class="fa fa-trash"></i></button>
                                          </td>
                                        </tr>
                                        @php $i++;  @endphp
                                      @endif
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Attribute Modal -->
  <div class="modal fade" id="attributeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row" style="margin-top: -34px;">
              <div class="col-12 m-auto">
                <label for="">Attribute Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2">
              </div>
            </div>
            <button type="submit" class="btn btn-sm mt-4" id="form-submit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Attribute Value model --}}
<div class="modal fade" id="attributeValueModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row" style="margin-top: -34px;">
            <div class="col-12">
              <label for="">Attribute</label>
              <select name="val_id" id="val_id" class="form-control">
                <option value="">SELECT</option>
                  @foreach($attributes as $attribute)
                    <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="">Value</label>
              <input type="text" name="val_name" id="val_name" class="form-control mt-2">
            </div>
          </div>
          <button type="submit" class="btn btn-sm mt-4" id="value-form">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

  @include('admin.footer')

  {{-- Atribute --}}
  <script>
    $("#form-submit").click(function(event ){
        event.preventDefault();
        $("#form-submit").prop('disabled', true);
        let data = {
            name: $("#name").val(),
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/attributes',
            type: "POST",
            data: data,
            success: function(response){
                location.reload();
            },
            error: function(response) {
                $("#form-submit").prop('disabled', false);
            }
        });
    })
  </script>
  <script>
    $("#tabledata").on("click", ".data-del", function(){
    var id = $(this).data("id");
    var obj = $(this);
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: "attributes/" + id,
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function(result){
        $(obj).parent().parent().remove();
      },
      error: function(error){
        console.log(error.responseText);
      }
    });
  });
  </script>


{{-- Attributes Values --}}
<script>
  $("#value-form").click(function(event ){
      event.preventDefault();
      $("#value-form").prop('disabled', true);
      let data = {
        val_name: $("#val_name").val(),
        val_id: $("#val_id").val(),
      };
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/attribute-value',
          type: "POST",
          data: data,
          success: function(response){
              location.reload();
          },
          error: function(response) {
              $("#value-form").prop('disabled', false);
          }
      });
  })
</script>
<script>
 $(document).on("click",".delete",function(){
  var id = $(this).data("id");
  var obj = $(this);
  var token = $("meta[name='csrf-token']").attr("content");
  $.ajax({
    url: "attribute-value/" + id,
    type: 'DELETE',
    data: {
      "id": id,
      "_token": token,
    },
    success: function(result){
      $(obj).parent().parent().remove();
    },
    error: function(error){
      console.log(error.responseText);
    }
  });
});
</script>