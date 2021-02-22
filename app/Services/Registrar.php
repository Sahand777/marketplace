<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;
use DB;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data) {
		return Validator::make($data, [
			'iAmA' => 'required',
			'first_name' => 'required|max:100',
			'last_name' => 'required|max:100',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'business_name' => 'required|max:200',
// 			'approvalPower' => 'required_if:iAmA,1,3',
// 			'approval_email' => 'required_if:approvalPower,2',
// 			'describe_product' => 'required',
// //			'industries_you_buy' => 'required|max:300',
// //			'industries_you_sell' => 'required|max:300',
// 			'street_address' => 'required|max:300',
// 			'city' => 'required|max:50',
// 			'state' => 'required|max:50',
// 			'postal_code' => 'required|max:20',
// 			'country' => 'required|max:50',
// 			'main_categories' => 'required_if:iAmA,2,3',
// 			'sub_categories' => 'required_if:iAmA,2,3',
// 			'service_states' => 'required_if:iAmA,2,3',
// 			'service_cities' => 'required_if:iAmA,2,3',
// //			'service_kilometers' => 'required_if:iAmA,2,3|max:3',
// //			'lati' => 'required',
		], [
                    'iAmA.required' => 'The my company is a field is required.',
                    'approvalPower.required_if' => 'The i have approval authority field is required.',
                ]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data) {
//             if (!isset($data['approval_email'])) {
//                 $data['approval_email'] = "";
//             }
//             if (!isset($data['service_kilometers'])) {
//                 $data['service_kilometers'] = "";
//             }
//             if (!isset($data['industries_you_buy'])) {
//                 $data['industries_you_buy'] = [];
//             }
//             if (!isset($data['industries_you_sell'])) {
//                 $data['industries_you_sell'] = [];
//             }
            
            $data['company_slug'] = makeSlug($data['business_name']);
            
            $userid = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
//                     'job_position' => $data['job_position'],
//                     'phone_number' => $data['phone_number'],
//                     'mobile_number' => $data['mobile_number'],
                    'email' => $data['email'],
                    
                    'password' => bcrypt($data['password']),
//                     'approval_email' => $data['approval_email'],
                    'user_type' => $data['iAmA'],
                    'business_name' => $data['business_name'],
//                     'main_categories' => (isset($data['main_categories'])) ? implode(",", $data['main_categories']) : "",
//                     'sub_categories' => (isset($data['sub_categories'])) ? implode(",", $data['sub_categories']) : "",
//                     'tax_id' => $data['tax_id'],
//                     'describe_product' => $data['describe_product'],
//                     'industries_you_buy' => implode(",", $data['industries_you_buy']),
//                     'industries_you_sell' => implode(",", $data['industries_you_sell']),
//                     'street_address' => $data['street_address'],
//                     'city' => $data['city'],
//                     'state' => $data['state'],
//                     'postal_code' => $data['postal_code'],
//                     'country' => $data['country'],
//                     'website' => $data['website'],
//                     'service_kilometers' => $data['service_kilometers'],
//                     'service_states' => (isset($data['service_states'])) ? implode(",", $data['service_states']) : "",
//                     'service_cities' => (isset($data['service_cities'])) ? implode(",", $data['service_cities']) : "",
//                     'lati' => $data['lati'],
//                     'longi' => $data['longi'],
                    'company_slug' => $data['company_slug'],
            ]);
            
            $emails_subscription_checker = DB::table('emails_subscription')->where('userid', $userid->id )->first();
            if ($emails_subscription_checker == '' && $emails_subscription_checker == NULL )
                DB::table('emails_subscription')->insert(['userid' => $userid->id]);
            
            $registerNotification = DB::table('notification')
                        ->where('notificationName', 'register')
                        ->first();
                $buyer = strtr($registerNotification->content, ["@username" => $userid->first_name." ".$userid->last_name , 
                                                                "@useremail"=>$data['email'],"@urlconfirmemail" => url("auth/confirm/$userid->token"),
                                                                "@siteurl"=>url("auth/login")
                    ]);

                $result = ['emailbody' => $buyer];
            
            
//                 printr($data['email']);exit;
           $flag = Mail::send('emails.user_confirm', $result, function($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Successfully Registered');
                $message->from('info@firmogram.com', 'Firmogram');
            });
//             printr($flag);exit;
            
            
          
            $registerNotification = DB::table('notification')
                        ->where('notificationName', 'user_create')
                        ->first();
                $buyer = strtr($registerNotification->content, ["@firstname" => $data['first_name']." ".$data['last_name'] , 
                                                                "@email"=>$data['email'],"@buinessname" => $data['business_name'],
                                                              
                    ]);

                $result = ['emailbody' => $buyer];
                
                $registered_emailNotification = DB::table('notification')
                                        ->where('notificationName','user_create')
                                        ->first();    
            $buyer  = strtr($registered_emailNotification->content, ["@firstname" => $userid->first_name,'@lastname'=>$userid->last_name , 
                                                                "@email"=>$data['email'],"@password" => bcrypt($data['password']),'@buinessname'=>$data['business_name'],
                                                                "@loginurl"=>url("auth/login")
                    ]);
            
//            print_r($buyer);exit();
            $result1 = ['emailbody' => $buyer];
                
                
            
            Mail::send('emails.registered_email_admin', $result1, function($message) {
                $message->to(getSettings('notification_email'))
                    ->subject('New Registration');
                $message->from('info@firmogram.com', 'Firmogram');
            });
//            echo "message1 = $message1 <br/> message2 = $message2";
//            exit;
            return $userid;
	}

}
