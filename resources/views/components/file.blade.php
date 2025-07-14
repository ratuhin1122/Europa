@props(['id', 'name', 'label' => null, 'required' => false])

<div class="mb-4">
    @if($label)
        <label class="block text-gray-700 mb-2" for="{{ $id }}">{{ $label }}</label>
    @endif
    
    <div class="relative">
        <input 
            {{ $required ? 'required' : '' }}
            id="{{ $id }}"
            type="file"
            name="{{ $name }}"
            class="block w-full text-sm text-gray-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-md file:border-0
                  file:text-sm file:font-semibold
                  file:bg-blue-50 file:text-blue-700
                  hover:file:bg-blue-100"
        />
        @error($name)
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>