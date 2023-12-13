<x-layout>

    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Login
                </h2>
                <p class="mb-4">Log into your account to post gigs</p>
            </header>
    
            <form action="{{Route('authen')}}" method="post">
                @csrf                   
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Email</label
                    >
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{old('email')}}"
                    />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                
                @if (session()->has('message'))  
                    <div class="fixed top-0 left-1/2 flex items-center bg-laravel text-white">
                        <p>{{session('message')}}</p>
                    </div>
                @endif
    
                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                        
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{$message}}
                        </p>
                        @enderror
                </div>
    
                
    
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Login
                    </button>
                </div>
    
                <div class="mt-8">
                    <p>
                        Don't have an account yet?
                        <a href="{{Route('register')}}" class="text-laravel"
                            >Sign up</a
                        >
                    </p>
                    Forgot your <a href="/accounts/forgot-password" class="text-laravel">password?</a>
                </div>
            </form>
        </div>
    </div>
    </x-layout>