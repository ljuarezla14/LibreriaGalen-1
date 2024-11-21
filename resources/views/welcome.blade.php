<x-app-layout>
    @auth
    @else
    <div class="flex items-center justify-center h-screen bg-blue-500">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-auto text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Bienvenido a Librería Galen</h1>
            <p class="text-gray-600 mb-6">Tus precios justos</p>
            <a href = {{ route('login')}} class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Iniciar Sesión
            </a>
        </div>
    </div>
    @endauth




</x-app-layout>
