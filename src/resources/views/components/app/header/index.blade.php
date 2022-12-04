<x-layout.header block="header">

    <x-layout.wrapper wrapperContent top>
        <x-navbar class="navbar_top">
            <x-navbar.list row flex>

                <x-navbar.item>
                    <x-logo.header />
                </x-navbar.item>

                <x-navbar.item dropdown>
                    <x-dropdown.toggle value="dropdown" />
                    <x-navbar.list dropdown-list>
                        <x-navbar.item dropdown-item>
                            <x-link value="dropdown-item" />
                        </x-navbar.item>
                        <x-navbar.item dropdown-item>
                            <x-link value="dropdown-item" />
                        </x-navbar.item>
                    </x-navbar.list>
                </x-navbar.item>

                <x-navbar.item dropdown>
                    <x-dropdown.toggle value="Помощь" />
                    <x-navbar.list dropdown-list>
                        <x-navbar.item dropdown-item>
                            {{-- <x-link href="{{ route('pages.show', ['page' => 'instructions']) }}" value="Инструкции для игроков" /> --}}
                            <x-link value="Инструкции" />
                        </x-navbar.item>
                        <x-navbar.item dropdown-item>
                            {{-- <x-link href="{{ route('pages.show', ['page' => 'faq']) }}" value="Частозадаваемые вопросы" /> --}}
                            <x-link value="Частозадаваемые вопросы" />
                        </x-navbar.item>
                    </x-navbar.list>
                </x-navbar.item>

                @guest
                    <x-navbar.item>
                        <x-link href="{{ route('login') }}" value="Login" class="btn btn_main" />
                    </x-navbar.item>
                    <x-navbar.item>
                        <x-link href="{{ route('register') }}" value="Register" class="btn btn_main" />
                    </x-navbar.item>
                @endguest

                @auth
                    <x-navbar.item>
                        <x-navbar.list class="user-nav" flex>

                            <x-navbar.item class="name" flex>
                                {{-- <span class="name">{{ auth()->user()->nickname }}</span> --}}
                                <span class="name">Name</span>
                            </x-navbar.item>

                            <x-navbar.item class="balance" flex>
                                <x-svg.symbol href="igold" />
                                {{-- <span>{{ auth()->user()->balance->total }}</span> --}}
                                <span>Balance</span>
                            </x-navbar.item>

                            <x-navbar.item class="profile" flex>
                                <x-svg.symbol href="user" />
                                {{-- <x-link href="{{ route('user.show', ['userPage' => 'profile']) }}" value="Профиль" /> --}}
                                <x-link value="Профиль" />
                            </x-navbar.item>

                        </x-navbar.list>
                    </x-navbar.item>
                @endauth

            </x-navbar.list>
        </x-navbar>
    </x-layout.wrapper>

    <x-layout.wrapper wrapperContent center>
        <x-app.header.banner />
    </x-layout.wrapper>

    <x-layout.wrapper wrapperContent bottom>
        <x-navbar class="navbar_bottom">
            <x-navbar.list row flex>

                <x-navbar.item>
                    <x-link href="{{ route('home') }}" class="link_main-menu" value="Главная" />
                </x-navbar.item>

                <x-navbar.item>
                    {{-- <x-link href="{{ route('news.index') }}" value="Новости" /> --}}
                    <x-link class="link_main-menu" value="Новости" />
                </x-navbar.item>

                <x-navbar.item>
                    {{-- <x-link href="{{ route('posts.index') }}" value="Блог" /> --}}
                    <x-link class="link_main-menu" value="Блог" />
                </x-navbar.item>

                <x-navbar.item>
                    {{-- <x-link href="{{ route('pages.show', ['page' => 'faq']) }}" value="FAQ" /> --}}
                    <x-link class="link_main-menu" value="FAQ" />
                </x-navbar.item>

            </x-navbar.list>
        </x-navbar>
    </x-layout.wrapper>

</x-layout.header>
