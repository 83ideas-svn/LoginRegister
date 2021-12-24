<?php
/** Publihsed by  83ideas.com  
 * 
 *  
*/
namespace Custome\Auth\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
Use Redirect;
use Session;
use Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class CustomeAuth extends Controller
{
    /** This  index function is show the Register page view */
    public function index()
    {
        return view('register::register');
    }
    /** This submit function is used to submit register form data  */
    public function submit(Request $request)
    {
        $data = $request->all();
        /** Validation check the all fields is fill or not */
        $validator = Validator::make($data, [
            'name'          => 'required|string',
            'email'         => 'required|email|unique:users',

           'password' => 'required|confirmed|min:6'
             

        ]);
        /** Validation is fails (Fill data is incorrect) then redirect register page  */
        if ($validator->fails()){
            return Redirect::to('register')->withErrors($validator); 
        }
        /** Validation is true then Save your data in database. Create a new user */
        $UserRegister =  User::insert(
            ['name' => $data['name'],
             'email' => $data['email'],
             'password' => Hash::make($data['password'])
            ]
        );
        if($UserRegister){
            Session::flash('success', 'Your registration successfully done.');
          return redirect('login');
        }
    
        
         
    }
    /** This function is show the login page view. */
    public function login()
    {
         return view('login::login');
    }
    /** This function is submit login form data. */
    public function SubmitLogin(request $request) {
        $data = $request->only( 'email', 'password');

           /** Validation check the all fields is fill or not */
          $validator = Validator::make($data, [
              'email'         => 'required',
              'password'      => 'required',
          ]);

          /** Validation is fails (Fill data is incorrect) then redirect login page  */
         if ($validator->fails()) {
              return Redirect::back()->withErrors($validator);
          }
          $email      = $request->post('email');
          $password   = $request->post('password');
          $result     = User::where(['email'=>$email])->first();
        
          if($result){
              if(Hash::check($request->post('password'),$result->password))  {
                $request->session()->put('user_data',$result);
                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_ID',$result->id);
                Session::flash('success', 'Your Login successfully done.');
                return redirect('dashboard');
              } else {
                 return Redirect::back()->withErrors('Password is incorrect');
              } 
          }   else {
              return Redirect::back()->withErrors('Invalid username password');
          }
      }
   /** Logout function */
      public function logout(Request $request)
      {
         session()->forget('USER_LOGIN');
         session()->forget('USER_ID');
          return redirect('login');
      }
   /** View the   forgot password  page  */
      public function ForgotPassword()
     { 
        
        return view('forgotpassword::forgotpassword');
     }

     /** Send reset password  link in  email  */
     public function submitForgetPasswordForm(Request $request)
      {
       
         $validate =   Validator::make($request->all(),[
              'email' => 'required|email|exists:users',
          ]);

          
        if ($validate->fails()) {
            return back()->with('message', 'Email is not valid');
        } else { 
          $token = mt_rand();
          $userId = user::where('email', $request->email)->first();
          $to_name      = $userId->name;
           $to_email   = $userId->email;
 
           $data= array('name'=>ucfirst($to_name), "token" => $token, "id" => $userId->id);
           Mail::send('forgotpswdemail::forgotpswdemail', $data  , function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
              $message->from(Config::get('constants.from-email'),Config::get('constants.from-name'));
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
    }

    /** View the   reset password  form page */
    public function showResetPasswordForm($token) { 
        return view('forgetPasswordLink::forgetPasswordLink',['token' => $token]);
     }

      /** Change the forgot password in successfully  */
     public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
        
  
          $user = user::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
        
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
         
}
