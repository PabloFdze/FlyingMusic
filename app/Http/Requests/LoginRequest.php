<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|max:50',
        ];
    }

    public function getCredentials(){
        $username = $this->get('name');

        if($this->isEmail($username)){
            return [
                'email' => $username,
                'password' => $this->get('password'),
            ];
        }
        return $this->only('name', 'password');

    }

    public function isEmail($value) :bool {
        $factory = $this->container->make(ValidationFactory::class);
        return $factory->make(['name' => $value], ['name' => 'email'])->fails();
    }
}
