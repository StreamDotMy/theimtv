<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
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

                'categories'            => ['required'],
                'title'                 => ['required', 'string', 'max:255'],
                'synopsis'              => ['required', 'string', 'max:255'],
                'description'           => ['required', 'string'],
                
                //'ordering'              => ['required'], 
                'title'                 => ['required','string', 'max:255'], 
                'synopsis'              => ['required'], 
                'description'           => ['required'], 

                'genres'                 => ['required'],
                'casts'                 => ['required','string', 'max:255'],
                'director'              => ['required','string', 'max:255'],
                'duration'              => ['required'],
                'classification'        => ['required'],
                'year_of_release'       => ['required'],
                'start_date'            => ['required','date_format:Y-m-d','before_or_equal:date_end'],
                'end_date'              => ['required','date_format:Y-m-d','after_or_equal:date_end'],
      
        ];
    }
}
