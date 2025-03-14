<x-kit.dashboard>

    <x-slot name="title">Estate {{ $estate->name }}</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing Elements</li>
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.estates.manage') }}">Manage Estates</a></li>
        <li class="breadcrumb-item active">{{ $estate->name }}</li>
    </x-slot>



</x-kit.dashboard>
