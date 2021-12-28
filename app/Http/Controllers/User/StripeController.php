<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\orderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function store(Request $request){
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_fAbqMVCkCwIqxFL7nhfgpG1e00RazfME62');
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'Payment From W3 Coders',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);


        $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_id' => $request->state_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'post_code' => $request->post_code,
                'notes' => $request->notes,
                'payment_type' => 'Stripe',
                'payment_method' => 'Stripe',
                'payment_type' => $charge->payment_method,
                'transaction_id' => $charge->balance_transaction,
                'currency' => $charge->currency,
                'amount' => $total_amount,
                'order_number' => $charge->metadata->order_id,
                'invoice_no' => 'SPM'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'status' => 'Pending',
                'created_at' => Carbon::now(),
            ]);

            $invoice = Order::findOrFail($order_id);

        //start send email
            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
            ];

            Mail::to($request->email)->send(new orderMail($data));

        //end send email

        $carts = Cart::content();
        foreach ($carts as $cart ) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        //product stock decrement
        foreach($carts as $pro){
            Product::where('id',$pro->id)->decrement('product_qty',$pro->qty);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification=array(
            'message'=>'Your Order Place Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('user.dashboard')->with($notification);

    }
}





















/* ================= Search employee for promosion ================= */
        function searchEmployeePromosion(){
            let emp_id = $("#emp_id_search").val();
            alert(emp_id_search);
            $.ajax({
              type:'POST',
              url: '/admin/search-employee/for/promosion',
              data:{ emp_id:emp_id },
              dataType:'json',
              success:function(response){
                $("#showEmployeeDetails").removeClass("d-none").addClass("d-block");
                /* show employee details */
                $("span[id='show_employee_id']").text(response.findEmployee.employee_id);
                $("span[id='show_employee_name']").text(response.findEmployee.employee_name);
                $("span[id='show_employee_department']").text(response.findEmployee.dep_name);
                $("span[id='show_employee_designation']").text(response.findEmployee.desig_name);
                /* employee or info */
                $("span[id='show_employee_akama_no']").text(response.findEmployee.akama_no);
                $("span[id='show_employee_akama_expire_date']").text(response.findEmployee.akama_expire_date);
                $("span[id='show_employee_akama_expire_date']").text(response.findEmployee.akama_expire_date);
                $("span[id='show_employee_country']").text(response.findEmployee.country.country_name);
                $("span[id='show_employee_division']").text(response.findEmployee.division.division_name);
                $("span[id='show_employee_district']").text(response.findEmployee.district.district_name);
                $("span[id='show_employee_type']").text(response.findEmployee.name);
                $("span[id='show_employee_category']").text(response.findEmployee.catg_name);
                $("span[id='show_employee_address_details']").text(response.findEmployee.details);
                $("span[id='show_employee_present_address']").text(response.findEmployee.present_address);
                $("span[id='show_employee_project_name']").text(response.findEmployee.project.proj_name);
                $("span[id='show_employee_date_of_birth']").text(response.findEmployee.date_of_birth);
                $("span[id='show_employee_mobile_no']").text(response.findEmployee.mobile_no);
                $("span[id='show_employee_email']").text(response.findEmployee.email);
                $("span[id='show_employee_joining_date']").text(response.findEmployee.joining_date);
                if(response.findEmployee.maritus_status == 1){
                  $("span[id='show_employee_metarials']").text('Unmarid');
                }else{
                  $("span[id='show_employee_metarials']").text('Marid');
                }
                /* Salary Details */
                $("span[id='show_employee_basic']").text(response.findEmployee.basic_amount);
                $("span[id='show_employee_house_rent']").text(response.findEmployee.house_rent);
                $("span[id='show_employee_hourly_rent']").text(response.findEmployee.hourly_rent);
                $("span[id='show_employee_mobile_allow']").text(response.findEmployee.mobile_allowance);
                $("span[id='show_employee_medical_allow']").text(response.findEmployee.medical_allowance);
                $("span[id='show_employee_local_travel_allow']").text(response.findEmployee.local_travel_allowance);
                $("span[id='show_employee_conveyance_allow']").text(response.findEmployee.conveyance_allowance);
                $("span[id='show_employee_increment_no']").text(response.findEmployee.increment_no);
                $("span[id='show_employee_increment_amount']").text(response.findEmployee.increment_amount);
                $("span[id='show_employee_others']").text(response.findEmployee.others1 + response.findEmployee.food_allowance);
                /* ====== Employee Promosion Form ===== */
                $("#input_emp_id_in_desig").val(response.findEmployee.emp_auto_id);

                $("#show_input_emp_name_in_user").val(response.findEmployee.employee_name);
                $("#show_input_emp_desig_in_user").val(response.findEmployee.desig_name);
                $("#show_input_emp_category_in_user").val(response.findEmployee.catg_name);
                $("#show_input_emp_mobile_in_user").val(response.findEmployee.mobile_no);

                $("#hidden_input_emp_name_in_user").val(response.findEmployee.employee_name);
                $("#hidden_input_emp_mobile_in_user").val(response.findEmployee.mobile_no);
                $("#hidden_input_emp_email_in_user").val(response.findEmployee.email);

                $("#input_emp_desig_id_in_desig").val(response.findEmployee.designation_id);
                $("#input_basic_amount").val(response.findEmployee.basic_amount);
                $("#input_hourly_rate").val(response.findEmployee.hourly_rent);
                $("#input_house_rate").val(response.findEmployee.house_rent);
                $("#input_mobile_allowance").val(response.findEmployee.mobile_allowance);
                $("#input_medical_allowance").val(response.findEmployee.medical_allowance);
                $("#input_local_travel_allowance").val(response.findEmployee.local_travel_allowance);
                $("#input_conveyance_allowance").val(response.findEmployee.conveyance_allowance);
                $("#input_others1").val(response.findEmployee.others1);
                $("#input_total_amount").val(response.findEmployee.basic_amount + response.findEmployee.house_rent + response.findEmployee.mobile_allowance + response.findEmployee.medical_allowance + response.findEmployee.local_travel_allowance + response.findEmployee.conveyance_allowance + response.findEmployee.others1);
                /* employee job experience list */
                var job_experience = "";
                $.each(response.find_job_experience, function(key,value){
                  var start_date = value.starting_date;
                  var end_date = value.end_date;
                  var st_date = new Date(start_date);
                  var en_date = new Date(end_date);
                  var total = (en_date - st_date);
                  var days = total/1000/60/60/24;


                  job_experience += `
                  <tr>
                    <td>${value.company_name}</td>
                    <td>${value.ejex_title}</td>
                    <td>${days}</td>
                    <td>${value.designation}</td>
                    <td>${value.responsibity}</td>
                  </tr>

                  `
                });
                $("#show_employee_job_experience_list").html(job_experience);
                /* employee contact person list */
                var contact_person = "";
                $.each(response.find_emp_contact_person, function(key,value){

                  contact_person += `
                  <tr>
                    <td>${value.ecp_name}</td>
                    <td>${value.ecp_mobile1}</td>
                    <td>${value.ecp_relationship}</td>
                  </tr>

                  `
                });
                $("#show_employee_contact_person_list").html(contact_person);


                /* ====================================================================*/
              }

            });
        }

















