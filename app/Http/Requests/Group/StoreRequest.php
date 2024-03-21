<?php

namespace App\Http\Requests\Group;

use App\Models\Group;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'createGroup' => 'Si pas de groupe il faut créer un nom de groupe différent des autres groupes.',
            'users_id.required' => 'Veuillez sélectionner au moins un utilisateur à ajouter au groupe.', // Added text for user_id
            'group.required' => 'Veuillez choisir un groupe existant ou sélectionner "Non" pour en créer un nouveau.', // Added text for group
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'users_id' => ['required'],
            'group' => ['required'],
            'createGroup' => $this->createGroup(),
            //
        ];
    }

    public function createGroup(): array
    {
        //        if(Group::where('name',$this->input('createGroup'))->get()->toArray()==!null){
        ////            return ['required'];
        //            dd("ok");
        //on ne peut pas le faire dans les regles car apres le click il ne peut pas verifier dans la base de données.

        //petit rappel pour tout afficher to Array (jai galéré....juste pour ca)
        if ($this->input('group') === 'Non') {
            return ['required'];
        } else {
            return ['nullable'];
        }
    }

    public function groupExists(): ?RedirectResponse
    {
        $groupName = $this->input('createGroup');

        $groupExists = Group::where('name', $groupName)->exists();

        if ($groupExists) {
            return back()->withErrors(['createGroup' => 'Le nom du groupe existe déjà.']);
        }

        return null;

    }
}
