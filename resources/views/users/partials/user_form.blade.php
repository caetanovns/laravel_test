<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <section class="bg-white dark:bg-gray-900">
                    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Adicionar Usuário</h2>
                        @include('utils.errors')
                        <form method="POST">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                                        Completo</label>
                                    <input type="text" name="name" id="name" placeholder="Entre com o Nome"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           value="{{old('name')}}">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="email"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" placeholder="Entre com o E-mail"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           value="{{old('email')}}">
                                </div>

                                <div class="w-full">
                                    <label for="password"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
                                    <input type="password" name="password" id="password" pattern=".{6,}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           value="" placeholder="Entre com a senha" autocomplete="off">
                                </div>
                                <div class="w-full">
                                    <label for="password"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmação
                                        de Senha</label>
                                    <input type="password" name="password_confirmation" id="password_2" pattern=".{6,}"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           value="" placeholder="Entre com a senha" autocomplete="off">
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Adicionar
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
