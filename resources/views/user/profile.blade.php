<x-layout-app page-title="Perfil de Utilizador">

    <div class="w-100 p-4">

        <h1>Perfil de Utilizador</h1>

        <hr>

        <div class="d-flex gap-5">

            <div>
                <i class="fa-solid fa-user me-3"></i>{{ auth()->user()->name }}
            </div>

            <div>
                <i class="fa-solid fa-user me-3"></i>{{ auth()->user()->role }}
            </div>

            <div>
                <i class="fa-solid fa-at me-3"></i>{{ auth()->user()->email }}
            </div>

            <div>
                <i class="fa-regular fa-calendar-days me-3"></i>{{ auth()->user()->created_at->format('d/m/Y') }}
            </div>
        </div>
        
        <hr>
    </div>
</x-layout-app>
