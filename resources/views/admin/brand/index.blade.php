@extends('layouts.admin-master')
@section('brands')
    active
@endsection
@section('admin-content')
     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
          <div class="row row-sm">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Brand List</div>
                <div class="card-body">
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr>
                        <th class="wd-30p">Brand Image</th>
                        <th class="wd-25p">Brand name En</th>
                        <th class="wd-25p">Brand name Bn</th>
                        <th class="wd-20p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($brands as $item)
                      <tr>
                        <td>
                          <img src="{{ asset($item->brand_image) }}" alt="" style="width: 80px;">
                        </td>
                        <td>{{ $item->brand_name_en }}</td>
                        <td>{{ $item->brand_name_bn }}</td>
                        <td>
                          <a href="{{ url('admin/brand-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                          <a href="{{ url('admin/brand-delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div>
              </div><!-- card -->
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">Add New Brand</div>
                  <div class="card-body">
                <form action="{{ route('brand-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="brand_name_en" value="{{ old('brand_name_en') }}" placeholder="Enter brand_name_en">
                      @error('brand_name_en')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="brand_name_bn" value="{{ old('brand_name_bn') }}" placeholder="Enter brand_name_bn">
                      @error('brand_name_bn')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="file" name="brand_image" placeholder="Enter brand_name_bn">
                      @error('brand_image')
                      <span class="text-danger">{{ $message }}</span>
                   @enderror
                    </div>
                    <div class="form-layout-footer">
                      <button type="submit" class="btn btn-info">Add New</button>
                    </div><!-- form-layout-footer -->
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>


    </div>
@endsection




















<div id="indirect_man_power" class="d-none">
        <form class="form-horizontal" id="month_work_history" action="{{ route('insert-month-work-indirect') }}" method="post">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fab fa-gg-circle"></i> Indirect Man Power Month Work History</h3>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form" style="padding-top: 0;">

                <div class="form-group custom_form_group{{ $errors->has('indirect_emp_id') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Employee ID:</label>
                    <div>
                      <input type="text" class="form-control typeahead" placeholder="Type Employee ID" name="indirect_emp_id" id="emp_id_search" onkeyup="indirectempSearch()" onfocus="showResult()" onblur="hideResult()" value="{{ old('emp_id') }}">
                      @if ($errors->has('indirect_emp_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('indirect_emp_id') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div id="showEmpId"></div>
                </div>

                <div class="form-group custom_form_group">
                    <label class="control-label d-block" style="text-align: left;">Month:</label>
                    <div>
                      <select class="form-control" name="month">
                      @foreach($month as $data)
                        <option value="{{ $data->month_id }}" {{ $data->month_id == $currentMonth ? 'selected':'' }}>{{ $data->month_name }}</option>
                      @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group custom_form_group{{ $errors->has('overtime') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Overtime Hours:<span class="req_star">*</span></label>
                    <div>
                      <input type="text" class="form-control" placeholder="Overtime Hours" id="overtime" name="overtime" value="{{old('overtime')}} 0" required max="50">
                      @if ($errors->has('overtime'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('overtime') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group custom_form_group{{ $errors->has('total_work_day') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Total Days:<span class="req_star">*</span></label>
                    <div>
                      <input type="text" class="form-control" placeholder="Work Days" id="total_work_day" name="total_work_day" value="{{old('total_work_day')}}" required max="30">
                      @if ($errors->has('total_work_day'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('total_work_day') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
              </div>
          </div>
        </form>
      </div>
      <!-- Indirect Man Power -->
      <div id="direct_man_power" class="d-none">
        <form class="form-horizontal" id="month_work_history" action="{{ route('insert-month-work') }}" method="post">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fab fa-gg-circle"></i> Direct Man Power Month Work History</h3>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form" style="padding-top: 0;">

                <div class="form-group custom_form_group{{ $errors->has('emp_id') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Employee ID:</label>
                    <div>
                      <input type="text" class="form-control typeahead" placeholder="Type Employee ID" name="emp_id" id="dir_emp_id_search" onkeyup="dirEmpSearch()" onfocus="showResult()" onblur="hideResult()" value="{{ old('emp_id') }}" required>
                      @if ($errors->has('emp_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('emp_id') }}</strong>
                          </span>
                      @endif
                    </div>
                    <!-- <div id="showEmpId"></div> -->
                    <div id="showEmpId2"></div>
                </div>

                <div class="form-group custom_form_group">
                    <label class="control-label d-block" style="text-align: left;">Month:</label>
                    <div>
                      <select class="form-control" name="month">
                      @foreach($month as $data)
                        <option value="{{ $data->month_id }}" {{ $data->month_id == $currentMonth ? 'selected':'' }}>{{ $data->month_name }}</option>
                      @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group custom_form_group{{ $errors->has('work_hours') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Total Hours:<span class="req_star">*</span></label>
                    <div>
                      <input type="text" class="form-control" placeholder="Work Hours" id="work_hours" name="work_hours" value="{{old('work_hours')}}" required max="360" min="1">
                      @if ($errors->has('work_hours'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('work_hours') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group custom_form_group{{ $errors->has('overtime') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Overtime Hours:<span class="req_star">*</span></label>
                    <div>
                      <input type="text" class="form-control" placeholder="Overtime Hours" id="overtime" name="overtime" value="{{old('overtime')}} 0" required max="50">
                      @if ($errors->has('overtime'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('overtime') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group custom_form_group{{ $errors->has('total_work_day') ? ' has-error' : '' }}">
                    <label class="control-label d-block" style="text-align: left;">Total Days:<span class="req_star">*</span></label>
                    <div>
                      <input type="text" class="form-control" placeholder="Work Days" id="total_work_day" name="total_work_day" value="{{old('total_work_day')}}" required max="30">
                      @if ($errors->has('total_work_day'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('total_work_day') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
              </div>
          </div>
        </form>
      </div>