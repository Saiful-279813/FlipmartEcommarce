@extends('layouts.admin-master')
@section('admin-content')
@section('permission') active show-sub @endsection
@section('all-permission') active @endsection

     <!-- ########## START: MAIN PANEL ########## -->
     <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">SHopMama</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
          <div class="row row-sm">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">Update permission</div>
                  <div class="card-body">
                <form action="{{ route('permission.update',$permission->id) }}" method="POST" >
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-4">
                               <div class="form-group">
                                 <label for="role">Select Role</label>
                                 <select class="form-control" name="role_id" id="role">
                                   <option value="">Select Role</option>
                                   @foreach ($roles as $role)
                                   <option value="{{ $role->id }}" {{ ($permission->role_id == $role->id) ? 'selected':'' }}>{{ $role->name }}</option>
                                   @endforeach
                                 </select>
                                 @error('role_id')
                                 <span class="text-danger">{{ $message }}</span>
                                @enderror
                               </div>

                              <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                              </div><!-- form-layout-footer -->
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-responsive table-danger">
                                <thead>

                                <tr>
                                    <th>Permission</th>
                                    <th>Add</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>List</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Sliders</td>
                                    <td>
                                        <input type="checkbox" name="permission[slider][add]"
                                        @isset($permission['permission']['slider']['add']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[slider][view]"
                                        @isset($permission['permission']['slider']['view']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[slider][edit]"
                                        @isset($permission['permission']['slider']['edit']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[slider][delete]"
                                        @isset($permission['permission']['slider']['delete']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[slider][list]"
                                        @isset($permission['permission']['slider']['list']) checked @endisset
                                         value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brand</td>
                                    <td>
                                        <input type="checkbox" name="permission[brand][add]"
                                        @isset($permission['permission']['brand']['add']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[brand][view]"
                                        @isset($permission['permission']['brand']['view']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[brand][edit]"
                                        @isset($permission['permission']['brand']['edit']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[brand][delete]"
                                        @isset($permission['permission']['brand']['delete']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[brand][list]"
                                        @isset($permission['permission']['brand']['list']) checked @endisset
                                        value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Categories</td>
                                    <td>
                                        <input type="checkbox" name="permission[cat][add]"
                                        @isset($permission['permission']['cat']['add']) checked @endisset value="1">

                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[cat][view]"
                                        @isset($permission['permission']['cat']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[cat][edit]"
                                        @isset($permission['permission']['cat']['edit']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[cat][delete]"
                                        @isset($permission['permission']['cat']['delete']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[cat][list]"
                                        @isset($permission['permission']['cat']['list']) checked @endisset value="1">
                                    </td>
                                </tr>

                                <tr>
                                    <td>SubCategories</td>
                                    <td>
                                        <input type="checkbox" name="permission[subcat][add]"
                                        @isset($permission['permission']['subcat']['add']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcat][view]"
                                        @isset($permission['permission']['subcat']['view']) checked @endisset value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcat][edit]"
                                        @isset($permission['permission']['subcat']['edit']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcat][delete]"
                                        @isset($permission['permission']['subcat']['delete']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subcat][list]"
                                        @isset($permission['permission']['subcat']['list']) checked @endisset
                                         value="1">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Sub SubCategories</td>
                                    <td>
                                        <input type="checkbox" name="permission[subsubcat][add]"
                                        @isset($permission['permission']['subsubcat']['add']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subsubcat][view]"
                                        @isset($permission['permission']['subsubcat']['view']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subsubcat][edit]"
                                        @isset($permission['permission']['subsubcat']['edit']) checked @endisset value="1">

                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subsubcat][delete]"
                                        @isset($permission['permission']['subsubcat']['delete']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[subsubcat][list]"
                                        @isset($permission['permission']['subsubcat']['list']) checked @endisset
                                         value="1">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Products</td>
                                    <td>
                                        <input type="checkbox" name="permission[product][add]"
                                        @isset($permission['permission']['product']['add']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][view]"
                                        @isset($permission['permission']['product']['view']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][edit]"
                                        @isset($permission['permission']['product']['edit']) checked @endisset
                                         value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][delete]"
                                        @isset($permission['permission']['product']['delete']) checked @endisset
                                        value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permission[product][list]"
                                        @isset($permission['permission']['product']['list']) checked @endisset
                                         value="1">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>


    </div>
@endsection

















<table class="table table-bordered">
                      <thead class="permissionTableHead">
                          <tr>
                              <th>Permission</th>
                              <th>Add</th>
                              <th>View</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              <th>List</th>
                          </tr>
                      </thead>
                      <tbody class="permissionTableBody">
                          <tr>
                              <td>User</td>
                              <td>
                                  <input type="checkbox" name="permission[user][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[user][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[user][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[user][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[user][list]" value="1">
                              </td>
                          </tr>
                          <tr>
                              <td>Role</td>
                              <td>
                                  <input type="checkbox" name="permission[role][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[role][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[role][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[role][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[role][list]" value="1">
                              </td>
                          </tr>
                          <tr>
                              <td>Role Permision</td>
                              <td>
                                  <input type="checkbox" name="permission[rolePermission][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[rolePermission][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[rolePermission][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[rolePermission][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[rolePermission][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Company Profile</td>
                              <td>
                                  <input type="checkbox" name="permission[company][add]" value="1">
                              </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[company][edit]" value="1">
                              </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[company][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Sub Company </td>
                              <td>
                                  <input type="checkbox" name="permission[subcompany][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[subcompany][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[subcompany][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[subcompany][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[subcompany][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Banner</td>
                              <td>
                                  <input type="checkbox" name="permission[banner][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[banner][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[banner][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[banner][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[banner][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Country</td>
                              <td>
                                  <input type="checkbox" name="permission[country][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[country][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[country][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[country][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[country][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Division</td>
                              <td>
                                  <input type="checkbox" name="permission[division][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Division</td>
                              <td>
                                  <input type="checkbox" name="permission[division][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[division][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>District</td>
                              <td>
                                  <input type="checkbox" name="permission[district][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[district][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[district][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[district][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[district][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Designation</td>
                              <td>
                                  <input type="checkbox" name="permission[designation][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[designation][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[designation][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[designation][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[designation][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Sponser</td>
                              <td>
                                  <input type="checkbox" name="permission[sponser][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[sponser][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[sponser][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[sponser][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[sponser][list]" value="1">
                              </td>
                          </tr>
                          {{-- end Admin Setting --}}
                          <tr>
                              <td>Project Info</td>
                              <td>
                                  <input type="checkbox" name="permission[projectInfo][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInfo][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInfo][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInfo][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInfo][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Project In Charge</td>
                              <td>
                                  <input type="checkbox" name="permission[projectInCharge][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInCharge][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInCharge][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInCharge][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectInCharge][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Project Photo</td>
                              <td>
                                  <input type="checkbox" name="permission[projectPhoto][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectPhoto][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectPhoto][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectPhoto][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[projectPhoto][list]" value="1">
                              </td>
                          </tr>
                          {{-- end Project --}}

                          <tr>
                              <td>Income Approval</td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[incomeApprove][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Expenditure Approval</td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[expendApprove][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Employee Leave Approval</td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[empLeaveApprove][list]" value="1">
                              </td>
                          </tr>
                          {{-- end Approval --}}
                          <tr>
                              <td>Employee Information</td>
                              <td>
                                  <input type="checkbox" name="permission[employeeInfo][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeInfo][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeInfo][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeInfo][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeInfo][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Salary Information</td>
                              <td>
                                  <input type="checkbox" name="permission[salaryInfo][add]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[salaryInfo][view]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[salaryInfo][edit]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[salaryInfo][delete]" value="1">
                              </td>
                              <td>
                                  <input type="checkbox" name="permission[salaryInfo][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Cpf Contribution</td>
                              <td>
                                  <input type="checkbox" name="permission[CPFContribute][add]" value="1">
                                  <td> X </td>
                                  <td> X </td>
                                  <td> X </td>
                                  <td> X </td>
                              </td>
                          </tr>

                          <tr>
                              <td>Employee Search</td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeSearch][view]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                          </tr>

                          <tr>
                              <td>Employee Leave</td>
                              <td>
                                  <input type="checkbox" name="permission[employeeLeave][add]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[employeeLeave][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Advance Adjust</td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[advanceAdjust][edit]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                          </tr>

                          <tr>
                              <td>Employee Contact Person</td>
                              <td>
                                  <input type="checkbox" name="permission[empContactPerson][add]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                          </tr>

                          <tr>
                              <td>Employee Job Experience</td>
                              <td>
                                  <input type="checkbox" name="permission[empJobExperience][add]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                          </tr>

                          <tr>
                              <td>Employee Iqama Expire</td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[empIqamaExpire][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Employee Passport Expire</td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td>
                                  <input type="checkbox" name="permission[empPassportExpire][list]" value="1">
                              </td>
                          </tr>

                          <tr>
                              <td>Employee Promosion</td>
                              <td>
                                  <input type="checkbox" name="permission[employeePromosion][add]" value="1">
                              </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                              <td> X </td>
                          </tr>
                          {{-- end Employee --}}

                      </tbody>
                  </table>




























                  <tr>
                            <td>Role</td>
                            <td>
                                <input type="checkbox" name="permission[role][add]" value="1" @isset($edit['permission']['role']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][view]" value="1" @isset($edit['permission']['role']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][edit]" value="1" @isset($edit['permission']['role']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][delete]" value="1" @isset($edit['permission']['role']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][list]" value="1" @isset($edit['permission']['role']['list']) checked @endisset>
                            </td>
                        </tr>
                        <tr>
                            <td>Role Permision</td>
                            <td>
                                <input type="checkbox" name="permission[rolePermission][add]" value="1" @isset($edit['permission']['rolePermission']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[rolePermission][view]" value="1" @isset($edit['permission']['rolePermission']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[rolePermission][edit]" value="1" @isset($edit['permission']['rolePermission']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[rolePermission][delete]" value="1" @isset($edit['permission']['rolePermission']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[rolePermission][list]" value="1" @isset($edit['permission']['rolePermission']['list']) checked @endisset>
                            </td>
                        </tr>

                        <tr>
                            <td>Company Profile</td>
                            <td>
                                <input type="checkbox" name="permission[company][add]" value="1" @isset($edit['permission']['company']['add']) checked @endisset>
                            </td>
                            <td> X </td>
                            <td>
                                <input type="checkbox" name="permission[company][edit]" value="1" @isset($edit['permission']['company']['edit']) checked @endisset>
                            </td>
                            <td> X </td>
                            <td>
                                <input type="checkbox" name="permission[company][list]" value="1" @isset($edit['permission']['company']['list']) checked @endisset>
                            </td>
                        </tr>

                        <tr>
                            <td>Sub Company </td>
                            <td>
                                <input type="checkbox" name="permission[subcompany][add]" value="1" @isset($edit['permission']['subcompany']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[subcompany][view]" value="1" @isset($edit['permission']['subcompany']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[subcompany][edit]" value="1" @isset($edit['permission']['subcompany']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[subcompany][delete]" value="1" @isset($edit['permission']['subcompany']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[subcompany][list]" value="1" @isset($edit['permission']['subcompany']['list']) checked @endisset>
                            </td>
                        </tr>

                        <tr>
                            <td>Banner</td>
                            <td>
                                <input type="checkbox" name="permission[banner][add]" value="1" @isset($edit['permission']['banner']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[banner][view]" value="1" @isset($edit['permission']['banner']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[banner][edit]" value="1" @isset($edit['permission']['banner']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[banner][delete]" value="1" @isset($edit['permission']['banner']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[banner][list]" value="1" @isset($edit['permission']['banner']['list']) checked @endisset>
                            </td>
                        </tr>

                        <tr>
                            <td>Country</td>
                            <td>
                                <input type="checkbox" name="permission[country][add]" value="1" @isset($edit['permission']['country']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[country][view]" value="1" @isset($edit['permission']['country']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[country][edit]" value="1" @isset($edit['permission']['country']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[country][delete]" value="1" @isset($edit['permission']['country']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[country][list]" value="1" @isset($edit['permission']['country']['list']) checked @endisset>
                            </td>
                        </tr>

                        <tr>
                            <td>Division</td>
                            <td>
                                <input type="checkbox" name="permission[division][add]" value="1" @isset($edit['permission']['division']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[division][view]" value="1" @isset($edit['permission']['division']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[division][edit]" value="1" @isset($edit['permission']['division']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[division][delete]" value="1" @isset($edit['permission']['division']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[division][list]" value="1" @isset($edit['permission']['division']['list']) checked @endisset>
                            </td>
                        </tr>


                        <tr>
                            <td>District</td>
                            <td>
                                <input type="checkbox" name="permission[district][add]" value="1" @isset($edit['permission']['district']['add']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[district][view]" value="1" @isset($edit['permission']['district']['view']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[district][edit]" value="1" @isset($edit['permission']['district']['edit']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[district][delete]" value="1" @isset($edit['permission']['district']['delete']) checked @endisset>
                            </td>
                            <td>
                                <input type="checkbox" name="permission[district][list]" value="1" @isset($edit['permission']['district']['list']) checked @endisset>
                            </td>
                        </tr>