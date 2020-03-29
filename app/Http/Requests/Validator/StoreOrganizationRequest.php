<?php

namespace App\Http\Requests\Validator;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'org.name' => 'required|min:3',
            'org.description' => 'required',
            'org.website' => 'nullable|min:6',
            'org.email' => 'nullable|email',
            'org.phone' => 'nullable|min:6',
            'address.address1' => 'nullable|min:3|required_with:address.address2',
            'address.address2' => 'nullable|min:3',
            'address.state' => 'nullable|max:2|in:AK,AL,AR,AS,AZ,CA,CO,CT,DC,DE,FL,GA,GU,HI,IA,ID,IL,IN,KS,KY,LA,MA,MD,ME,MI,MN,MO,MP,MS,MT,NC,ND,NE,NH,NJ,NM,NV,NY,OH,OK,OR,PA,PR,RI,SC,SD,TN,TX,UM,UT,VA,VI,VT,WA,WI,WV,WY',
            'address.zip' => 'nullable|digits:5',
            'social.Facebook' => [
                'nullable',
                "regex:/(\w{3,25})\b/",
            ],
            'social.Instagram' => [
                'nullable',
                "regex:/(\w{3,20})\b/",
            ],
            'social.Linkedin' => [
                'nullable',
                "regex:/(\w{3,30})\b/",
            ],
            'social.Twitter' => [
                'nullable',
                "regex:/(\w{3,20})\b/",
            ],
            'social.Youtube' => [
                'nullable',
                "regex:/(\w{3,30})\b/",
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'org.name' => 'Name',
            'org.description' => 'Description',
            'org.website' => 'Website',
            'org.email' => 'Email',
            'org.phone' => 'Phone',
            'address.address1' => 'Address Line 1',
            'address.address2' => 'Address Line 2',
            'address.city' => 'city',
            'address.state' => 'State',
            'address.zip' => 'Zip',
            'social.Facebook' => 'Facebook',
            'social.Instagram' => 'Instagram',
            'social.Linkedin' => 'Linkedin',
            'social.Twitter' => 'Twitter',
            'social.Youtube' => 'Youtube',
         ];
    }

    public function messages()
    {
        return [
            'social.Facebook.regex' => 'Facebook username must be between 3-25 alpha numeric characters. Do not include the @.',
            'social.Instagram.regex' => 'Instagram handle must be between 3-18 alpha numeric characters. Do not include the @.',
            'social.Linkedin.regex' => 'Linkedin username must be between 3-28 alpha numeric characters. Do not include the @.',
            'social.Twitter.regex' => 'Twitter handle must be between 3-18 alpha numeric characters. Do not include the @.',
            'social.Youtube.regex' => 'Youtube username must be between 3-28 alpha numeric characters. Do not include the @.',
        ];
    }
}
