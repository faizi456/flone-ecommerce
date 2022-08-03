
var room = 1;

function product_fields() {
  room++;
  var objTo = document.getElementById("product_fields");
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "removeclass" + room);
  var rdiv = "removeclass" + room;
  divtest.innerHTML =
  '<hr><div class="form-group" id="product_fields"><div class="row"><div class="col-md-2 mt-3"><input type="text" name="stock[]" multiple class="form-control" placeholder="Stock" required></div><div class="col-md-2 mt-3"><input type="text" name="srp[]" multiple class="form-control" placeholder="SRP" required></div><div class="col-md-2 mt-3"><input type="text" multiple name="unitPrice[]" class="form-control" placeholder="Unit Price" required></div><div class="col-md-3 mt-3"><input type="text" multiple name="size[]" class="form-control" placeholder="Size" required></div><div class="col-md-3 mt-3"><input type="text" name="color[]" multiple class="form-control" placeholder="Color" required></div><div class="col-md-3 mt-3"><input type="text" multiple name="quantityType[]" placeholder="Quantity Type" class="form-control" required></div><div class="col-md-3 mt-3"><input type="file" multiple name="attr_images[]" multiple class="form-control" required></div><div class="col-md-3 mt-3"><button type="button" onclick="remove_product_fields(' + room +' );" class="btn rounded-pill px-4 btn-light-danger text-danger font-medium waves-effect waves-light"><i data-feather="minus-circle" class="feather-sm fill-white"></i></button></div></div></div>';

  objTo.appendChild(divtest);
  feather.replace();
}

function remove_product_fields(rid) {
  $(".removeclass" + rid).remove();
}
