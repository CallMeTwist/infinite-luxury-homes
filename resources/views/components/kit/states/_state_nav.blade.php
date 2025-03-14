<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5>Menu Actions</h5>
        <a data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
    </div>
    <div class="card-body collapse show p-0" id="collapseExample">
        <div class="list-group list-group-flush">
            <x-kit.states._state_nav_link :title="'Manage State'" :icon="'fa-wrench'">
                <x-slot name="active">{{ request()->is('panel/dashboard/marketing/locations/state/view/*') ? 'active' : '' }}</x-slot>
                <x-slot name="link">#</x-slot>
                <x-slot name="count">
                    <span class="badge bg-white col-black">{{ $state->cities->count() }}</span>
                </x-slot>
            </x-kit.states._state_nav_link>

            <x-kit.states._state_nav_link :title="'Realtors'" :icon="'fa-users'">
                <x-slot name="active">{{ request()->is('panel/dashboard/marketing/locations/state/realtors/*') ? 'active' : '' }}</x-slot>
                <x-slot name="link">#</x-slot>
                <x-slot name="count">
                    <span class="badge bg-white col-black">{{ $state->realtors->count() }}</span>
                </x-slot>
            </x-kit.states._state_nav_link>

            <x-kit.states._state_nav_link :title="'Estates'" :icon="'fa-building'">
                <x-slot name="active">{{ request()->is('panel/dashboard/marketing/locations/state/estates/*') ? 'active' : '' }}</x-slot>
                <x-slot name="link">#</x-slot>
                <x-slot name="count">
                    <span class="badge bg-white col-black">{{ $state->estates->count() }}</span>
                </x-slot>
            </x-kit.states._state_nav_link>

            <x-kit.states._state_nav_link :title="'Sales'" :icon="'fa-receipt'">
                <x-slot name="active">{{ request()->is('panel/dashboard/marketing/locations/state/sales/*') ? 'active' : '' }}</x-slot>
                <x-slot name="link">#</x-slot>
                <x-slot name="count">
                    <span class="badge bg-white col-black">{{ $state->sales->count() }}</span>
                </x-slot>
            </x-kit.states._state_nav_link>

        </div>
    </div>
</div>
