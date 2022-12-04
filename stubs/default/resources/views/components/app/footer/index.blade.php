<x-layout.footer block="footer">
    <x-layout.content class="py-1">
        <x-navbar flex row class="navbar_footer t-12">

            <x-navbar.list>
                <x-navbar.item class="mb-2">
                    <x-logo.footer />
                </x-navbar.item>
                <x-navbar.item class="mb-1">
                    <x-link value="Политика Конфидициальности" />
                </x-navbar.item>
                <x-navbar.item>
                    <x-link value="Пользовательское соглашение" />
                </x-navbar.item>
            </x-navbar.list>

            <x-navbar.list>
                <x-navbar.item title class="t-14 mb-2">
                    <x-link value="Партнерам" class="text-grey" />
                </x-navbar.item>
                <x-navbar.item class="mb-1">
                    <x-link value="Реферальная программа" />
                </x-navbar.item>
            </x-navbar.list>

            <x-navbar.list>
                <x-navbar.item title class="t-14 mb-2">
                    <x-link value="Помощь" class="text-grey" />
                </x-navbar.item>
                <x-navbar.item  class="mb-1">
                    <x-link value="Инструкции" />
                </x-navbar.item>
                <x-navbar.item>
                    <x-link value="FAQ" />
                </x-navbar.item>
            </x-navbar.list>

            <x-contacts />

            <x-share />

        </x-navbar>
    </x-layout.content>
</x-layout.footer>
