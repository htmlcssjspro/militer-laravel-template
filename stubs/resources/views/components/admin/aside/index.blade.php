<x-layout.aside block="admin-aside">
    <x-navbar>
        <x-navbar.list>
            <x-navbar.item>
                <x-link href="{{ route('admin.pages.show', ['adminPage' => 'finance']) }}" value="Dashboard"
                    class="p-cell" />
            </x-navbar.item>
            <x-navbar.item>
                <x-link href="{{ route('admin.pages.show', ['adminPage' => 'referral']) }}" value="Page 2"
                    class="p-cell" />
            </x-navbar.item>
            <x-navbar.item>
                <x-link href="{{ route('admin.pages.show', ['adminPage' => 'battles']) }}" value="Page 3"
                    class="p-cell" />
            </x-navbar.item>
        </x-navbar.list>
    </x-navbar>
</x-layout.aside>
