<toggler v-if="$root.loggedIn" v-cloak>
    <div v-on-click-away="close" slot-scope="{ toggle, close, isOpen }">
        <button v-on:click="toggle" dusk="account_menu" class="my-1 flex">
            <x-heroicon-o-user class="h-6 w-6" />
            @{{ $root.user.firstname }}
        </button>
        <div v-if="isOpen" class="{{ config('rapidez.frontend.z-indexes.header-dropdowns') }} {{ Route::currentRouteName() == 'checkout' ? 'right-0' : '' }} absolute mr-1 rounded border bg-white shadow">
            @if (App::providerIsLoaded('Rapidez\Account\AccountServiceProvider'))
                <a class="block px-3 py-2 hover:bg-inactive" href="{{ route('account.overview') }}">@lang('Account')</a>
                <a class="block px-3 py-2 hover:bg-inactive" href="{{ route('account.orders') }}">@lang('Orders')</a>
                @if (App::providerIsLoaded('Rapidez\Wishlist\WishlistServiceProvider'))
                    <a class="block px-3 py-2 hover:bg-inactive" href="{{ route('account.wishlist') }}">@lang('Wishlist')</a>
                @endif
            @endif
            <user>
                <button class="block cursor-pointer px-3 py-2 hover:bg-inactive" dusk="logout" slot-scope="{ logout }" @click="logout('/')">
                    @lang('Logout')
                </button>
            </user>
        </div>
    </div>
</toggler>
@if (App::providerIsLoaded('Rapidez\Account\AccountServiceProvider'))
    <div v-else class="my-1">
        <a href="{{ route('account.login') }}" aria-label="@lang('Login')">
            <x-heroicon-o-user class="h-6 w-6" />
        </a>
    </div>
@endif
