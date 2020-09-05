<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        try {
            $user = auth()->user();

            if ($user->is_admin) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {

            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
          'title' => 'required|string|max:255',
          'category_id.*' => 'required|exists:categories,id',
          'price' => 'required|numeric',
          'description' => 'required|string',
        ];

        if (isset($this->product)) {
            $rules['cover'] = 'file';
        } else {
            $rules['cover'] = 'required|file';
        }

        return $rules;
    }
}
