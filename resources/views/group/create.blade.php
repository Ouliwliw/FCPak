
<x-app-layout>
@php($x=0)

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un groupe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{route('group.store')}}">
                @csrf

                <!-- Users -->
                <div>

                    <x-input-label for="user_id" :value="__('Utilisateur')" />
                    @php($y=0)
                    @foreach($users as $user)
                        @php($x++)


                        <input name="users_id[]" id="user_id" type="checkbox" name="user_id" id="user_id" value="{{ $user->id }}" @selected(old('user_id', ) == $user->id)>{{ $user->name }}</input>
                        @if($x==2)
                        <br>
                        @php($x=0)
                      @endif
                    @endforeach
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="group" :value="__('Groupe')" />

                    <select name="group" id="group">
                         <option value="Non" selected>Non</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->name }}">{{ $group->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <x-input-label for="createGroup" :value="__('ou Créer un groupe')" />
                    <input type="text" name="createGroup" id="createGroup" >
                    <x-input-error :messages="$errors->get('createGroup')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Créer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
