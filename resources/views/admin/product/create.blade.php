@extends('layouts.admin-master')
@section('admin-content')
@section('products')
    active show-sub
@endsection
@section('add-product')
    active
@endsection

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Add Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Add product</h6>
              <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="brand_id">
                              <option label="Choose one"></option>
                              @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name_en) }}</option>
                              @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                              <option label="Choose one"></option>
                              @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subcategory_id">
                              <option label="Choose one"></option>
                              {{-- @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                              @endforeach --}}
                            </select>
                            @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subsubcategory_id">
                              {{-- <option label="Choose one"></option>
                              @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                              @endforeach --}}
                            </select>
                            @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_en" value="{{ old('product_name_en') }}" placeholder="Enter Product Name English">
                        @error('product_name_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name_bn" value="{{ old('product_name_bn') }}" placeholder="Product Name Bangla">
                        @error('product_name_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product Code">
                        @error('product_code')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_qty" value="{{ old('product_qty') }}" placeholder="Enter Product Quantity">
                        @error('product_qty')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_en" value="{{ old('product_tags_en') }}" placeholder="Product Tags English" data-role="tagsinput">
                        @error('product_tags_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags_bn" value="{{ old('product_tags_bn') }}" placeholder="product tags bangla" data-role="tagsinput">
                        @error('product_tags_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_en" value="{{ old('product_size_en') }}" placeholder="Product Size English" data-role="tagsinput">
                        @error('product_size_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size_bn" value="{{ old('product_size_bn') }}" placeholder="Product Size Bangla" data-role="tagsinput">
                        @error('product_size_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_en" value="{{ old('product_color_en') }}" placeholder="Product Color Rnglish" data-role="tagsinput">
                        @error('product_color_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color_bn" value="{{ old('product_color_bn') }}" placeholder="Enter Product Color Bangla" data-role="tagsinput">
                        @error('product_color_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price" value="{{ old('selling_price') }}" placeholder="Selling Price">
                        @error('selling_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="{{ old('discount_price') }}" placeholder="Discount Price">
                        @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Main Thambnail: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="product_thambnail" value="{{ old('product_thambnail') }}" onchange="mainThambUrl(this)">
                        @error('product_thambnail')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <img src="" id="mainThmb">
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Multiple_image: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="file" name="multi_img[]" value="{{ old('multi_img') }}" multiple id="multiImg">
                        @error('multi_img')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      <div class="row" id="preview_img" >
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description English: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_en" id="summernote"></textarea>
                        @error('short_descp_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="short_descp_bn" id="summernote2"></textarea>
                        @error('short_descp_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description English: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_en" id="summernote3"></textarea>
                        @error('long_descp_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description Bangla: <span class="tx-danger">*</span></label>
                        <textarea name="long_descp_bn" id="summernote4"></textarea>
                        @error('long_descp_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deals" value="1"><span>Hot Deals</span>
                  </label>
                  </div>

                  <div class="col-md-4">
                    <label class="ckbox">
                      <input type="checkbox" name="featured" value="1"><span>Featured</span>
                    </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_offer" value="1"><span>special_offer</span>
                        </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_deals" value="1"><span>special_deals</span>
                        </label>
                    </div>

                  <div class="form-layout-footer mt-3">
                  <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Products</button>
                </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row -->


    </div>

    <script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      $('select[name="subsubcategory_id"]').html('');

                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });



        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/admin/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });

    });

    </script>


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>

  <script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(80)
                  .height(80);
        };
        reader.readAsDataURL(input.files[0]);


      }
    }
  </script>

    @endsection



























@extends('layouts.admin-master')
@section('title') Employee Entry & Out @endsection
@section('content')

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Employee Attendence (In Time)</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="active">Employee Attendence</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        @if(Session::has('success'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> Added New project information.
          </div>
        @endif
        @if(Session::has('success_soft'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> delete project information.
          </div>
        @endif

        @if(Session::has('success_update'))
          <div class="alert alert-success alertsuccess" role="alert">
             <strong>Successfully!</strong> update project information.
          </div>
        @endif

        @if(Session::has('data_not_found'))
          <div class="alert alert-warning alerterror" role="alert">
             <strong>Opps!</strong> invalid Employee Id.
          </div>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form class="form-horizontal project-details-form" id="employeeEntryTime">

          <div class="card">
              <div class="card-body card_form">

                <div class="form-group row custom_form_group">
                    <label class="control-label col-md-3">Employee ID:</label>
                    <div class="col-md-7">
                      <input type="text" class="form-control typeahead" placeholder="Input Employee ID" name="emp_id" value="{{ old('emp_id') }}">
                      <span class="error d-none" id="error_massage"></span>
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Select Date:</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Entry Time:</label>
                    <div class="col-sm-7">
                        <input type="number" name="entry_time" value="{{ old('entry_time') }}" class="form-control" placeholder="Input Time (1 to 24 Hours)" required max="24" min="0">
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label"> Night Shift:</label>
                    <div class="col-sm-7">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="emp_io_shift" id="emp_io_shift" value="1" >
                        <label class="form-check-label">If Night Shift Then Check This Box</label>
                      </div>
                    </div>
                </div>



              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" onclick="employeeEntryTime()" class="btn btn-primary waves-effect">SAVE</button>

              </div>
          </div>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>
<!-- script area -->
<script type="text/javascript">
/* form validation */
$(document).ready(function(){

  $("#employeeEntryTime").validate({
    /* form tag off  */
    submitHandler: function(form) {
         return false;
     },
    /* form tag off  */
    rules: {
      emp_id: {
        required : true,
      },
      date: {
        required : true,
      },
      entry_time: {
        required : true,
        number: true,
        max: 24,
      },
    },

    messages: {
      emp_id: {
        required : "You Must Be Input This Field!",
      },
      date: {
        required : "You Must Be Select This Field!",
      },
      entry_time: {
        required : "Please Input This Field!",
        number : "You Must Be Input Number!",
        max : "You Must Be Input Maximum 24!",
      },
    },


  });
});

/* insert data in ajax */
function employeeEntryTime(){
  var emp_id = $('input[name="emp_id"]').val();
  var date = $('input[name="date"]').val();
  var entry_time = $('input[name="entry_time"]').val();
  var emp_io_shift = $('input[name="emp_io_shift"]').val();

  alert(emp_io_shift);


  
  /* ajax request */
  if(emp_id != "" && entry_time != "" && date !=""){

    $.ajax({
      type:'POST',
      dataType: 'json',
      data:{ emp_id:emp_id, date:date, entry_time:entry_time, emp_io_shift:emp_io_shift },
      url:"{{ route('employee-entry-time-insert') }}",
      success:function(data){

        // error_massage
        if(data.error){
          $("span[id='error_massage']").text("Employee Not Found!");
          $("span[id='error_massage']").removeClass('d-none').addClass('d-block');
        }else{
          var emp_id = $('input[name="emp_id"]').val("");
          var date = $('input[name="date"]').val("");
          var entry_time = $('input[name="entry_time"]').val("");
          var emp_io_shift = $('input[name="emp_io_shift"]').prop('checked', false);
          $("span[id='error_massage']").addClass('d-none').removeClass('d-block');
        }
        //  start message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if($.isEmptyObject(data.error)){
            Toast.fire({
              type: 'success',
              title: data.success
            })
        }else{
          Toast.fire({
            type: 'error',
            title: data.error
          })
        }
        //  end message
      }
    });
  }



}
</script>

@endsection
