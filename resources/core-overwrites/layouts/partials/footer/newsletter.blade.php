<div class="component container">
    <div class="bg-tut-primary flex flex-wrap items-center justify-between gap-5 rounded-lg p-10 text-white">
        <div class="flex flex-col">
            <x-rapidez-tut::title.3xl class="text-base font-bold">@lang('Want product news and updates?')</x-rapidez-tut::title.3xl>
            <p class="mt-4 text-base font-normal">@lang('Sign up for our newsletter to stay up to date.')</p>
        </div>
        <div class="sm:w-full sm:max-w-md xl:mt-0" dusk="newsletter">
            <lazy>
                <graphql-mutation query="mutation visitor ($email: String!) { subscribeEmailToNewsletter(email: $email) { status } }" :alert="false" :clear="true">
                    <div slot-scope="{ mutate, variables, mutated, error }">
                        <p v-if="mutated" v-cloak class="text-xl font-bold text-neutral">
                            @lang('Thank you for subscribing!')
                        </p>
                        <div v-else>
                            <form v-on:submit.prevent="mutate" class="mt-4 flex items-center gap-3 sm:max-w-md">
                                <x-rapidez::input v-model="variables.email" :label="false" name="email" type="email" class="border-text-inactive placeholder-text-neutral w-full min-w-[300px] appearance-none rounded-md border bg-white px-4 py-3 text-base text-gray-900 shadow-sm focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-indigo-500" wrappertClass="flex-grow" dusk="newsletter-email" autocomplete="email" placeholder="Enter your email" required />
                                <x-rapidez-tut::button.secondary type="submit" dusk="newsletter-submit" class="flex-1">
                                    @lang('Subscribe')
                                </x-rapidez-tut::button.secondary>
                            </form>
                            <p v-if="error" v-cloak class="mt-3 text-sm text-red-700">
                                @{{ error }}
                            </p>
                            <p class="mt-3 text-sm">
                                @lang('We care about the protection of your data. Read our')
                                <a href="{{ url('/privacy-policy-cookie-restriction-mode') }}" class="underline">
                                    @lang('Privacy Policy')
                                </a>
                            </p>
                        </div>
                    </div>
                </graphql-mutation>
            </lazy>
        </div>
    </div>
</div>
