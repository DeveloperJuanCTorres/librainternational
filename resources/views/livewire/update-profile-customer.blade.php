
<x-jet-form-section submit="update" class="mb-6">
    <x-slot name="title">
        Actulizar información basica
    </x-slot>

    <x-slot name="description">
        Puedes actualizar tu información basica como cliente (Con esta información generamos tu comprobante).
    </x-slot>

    <x-slot name="form">
        <!-- Elimine la sección para agregar un foto -->
        <div class="col-span-6 ">
            <x-jet-label for="name" value="Nombre y email de la cuenta" />
            <div class="grid grid-cols-2">
                <div><b>Nombre:</b> {{Auth::user()->name}}</div>
                <div><b>Email:</b> {{Auth::user()->email}}</div>
            </div>
        </div>

        @if(is_null($customer['name']))
             <!-- Name busisne-->
             <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="Nombre comersial de la empresa" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="customer.supplier_business_name"  />
                <x-jet-input-error for="customer.supplier_business_name" class="mt-2" />
            </div>
            <!-- Documento de identidad -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="RUC" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="customer.contact_id"  />
                <x-jet-input-error for="customer.contact_id" class="mt-2" />
            </div>
        @else
            <!-- Name -->
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="first_name" value="Nombre" />
                <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="customer.first_name"  />
                <x-jet-input-error for="customer.first_name" class="mt-2" />
            </div> 
            <div class="col-span-3 sm:col-span-2">
                <x-jet-label for="last_name" value="Apellidos" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="customer.last_name"  />
                <x-jet-input-error for="customer.last_name" class="mt-2" />
            </div> 
            <!-- Documento de identidad -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="DNI" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="customer.contact_id" />
                <x-jet-input-error for="customer.contact_id" class="mt-2" />
            </div>
        @endif


        <!-- Teléfono --> 
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mobile" value="Teléfono del cliente" />
            <x-jet-input id="mobile" type="text" class="mt-1 block w-full" wire:model.defer="customer.mobile" autocomplete="mobile" />
            <x-jet-input-error for="customer.mobile" class="mt-2" />
        </div> 

    </x-slot>

    <x-slot name="actions" >
        <!-- <x-jet-action-message class="mr-3" on="saved">
            Guardado
        </x-jet-action-message> -->
        @if($is_active)
          <span class="mr-2">Guardado</span>

        @endif
        <x-jet-button wire:loading.attr="disabled">
            Guardar
        </x-jet-button>
    </x-slot>
 
</x-jet-form-section>