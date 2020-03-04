<?php
//
//namespace App\Rules;
//use App\Owner;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Contracts\Validation\Rule;
//use DB;
//use Session;
//
//class MatchOldPassword implements Rule
//{
//    /**
//     * Create a new rule instance.
//     *
//     * @return void
//     */
////    public function __construct()
////    {
////        //
////    }
//
//    /**
//     * Determine if the validation rule passes.
//     *
//     * @param  string  $attribute
//     * @param  mixed  $value
//     * @return bool
//     */
//    public function passes($attribute, $value)
//    {
//        $val = Session::get('ownerId');
//        $owners = DB::table('owners')
//            ->where('id',$val)
//            ->get('owner_password');
//        return Hash::check($value,$owners);
//    }
//
//    /**
//     * Get the validation error message.
//     *
//     * @return string
//     */
//    public function message()
//    {
//        return 'The :attribute is match with old password.';
//    }
//}
