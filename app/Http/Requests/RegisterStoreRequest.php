<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;


class RegisterStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'string', 'max:255'],
            'restaurant_photo' => ['nullable', 'file', 'mimes:jpeg,png,jpg'],
            'address' => ['required', 'string', 'max:255'],
            'p_iva' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'typologies' => ['required', 'array', 'max:255'],
            'user_id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome deve essere una stringa.',
            'name.max' => 'Il campo nome non deve superare i 255 caratteri.',
    
            'surname.required' => 'Il campo cognome è obbligatorio.',
            'surname.string' => 'Il campo cognome deve essere una stringa.',
            'surname.max' => 'Il campo cognome non deve superare i 255 caratteri.',
    
            'email.required' => 'Il campo email è obbligatorio.',
            'email.string' => 'Il campo email deve essere una stringa.',
            'email.email' => 'Inserisci un indirizzo email valido.',
            'email.max' => 'Il campo email non deve superare i 255 caratteri.',
            'email.unique' => 'Questo indirizzo email è già stato registrato.',
    
            'password.required' => 'Il campo password è obbligatorio.',
            'password.confirmed' => 'La conferma della password non corrisponde.',
            'password.min' => 'La password deve contenere almeno :min caratteri.',
    
            'restaurant_name.required' => 'Il campo nome del ristorante è obbligatorio.',
            'restaurant_name.string' => 'Il campo nome del ristorante deve essere una stringa.',
            'restaurant_name.max' => 'Il campo nome del ristorante non deve superare i 255 caratteri.',
    
            'restaurant_photo.file' => 'L\'immagine del ristorante deve essere un file.',
            
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'address.string' => 'Il campo indirizzo deve essere una stringa.',
            'address.max' => 'Il campo indirizzo non deve superare i 255 caratteri.',
    
            'p_iva.required' => 'Il campo Partita IVA è obbligatorio.',
            'p_iva.string' => 'Il campo Partita IVA deve essere una stringa.',
            'p_iva.max' => 'Il campo Partita IVA non deve superare i 255 caratteri.',
    
            'telephone.required' => 'Il campo telefono è obbligatorio.',
            'telephone.string' => 'Il campo telefono deve essere una stringa.',
            'telephone.max' => 'Il campo telefono non deve superare i 255 caratteri.',

            'typologies.required' => 'Seleziona almeno una specializzazione.'
        ];
    }
    
}
