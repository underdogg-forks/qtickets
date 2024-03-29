<?php
namespace App\Http\Requests\helpdesk;

use App\Http\Requests\Request;

/**
 * CompanyRequest.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class CompanyRequest extends Request
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
            'company_name' => 'required|max:50',
            'website' => 'url',
            'phone' => 'numeric',
            'logo' => 'image',
        ];
    }
}
