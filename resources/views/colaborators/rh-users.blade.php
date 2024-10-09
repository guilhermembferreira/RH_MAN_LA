<x-layout-app page-title="Colaboradores">

    <div class="w-100 p-4">

        <h3>Colaboradores</h3>

        <hr>

        @if ($colaborators->count() === 0)
            <div class="text-center my-5">
                <p>Não foram encontrados colaboradores.</p>
                <a href="{{route('colaborators.new-colaborator')}}" class="btn btn-primary">Cria um novo colaborador</a>
            </div>
        @else
            <div class="mb-3">
                <a href="{{route('colaborators.new-colaborator')}}" class="btn btn-primary">Cria um novo colaborador</a>
            </div>

            <table class="table w-50" id="table">
                <thead class="table-dark">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Permissões</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($colaborators as $colaborator)
                        <tr>
                            <td>{{ $colaborator->name }}</td>
                            <td>{{ $colaborator->email }}</td>

                            @php
                                $permissions = json_decode($colaborator->permissions);
                            @endphp

                            <td>{{implode(',', $permissions)}}</td>
                            <td>

                                <div class="d-flex gap-3 justify-content-end">
                                    @if ($colaborator->id === 1)
                                        <i class="fa-solid fa-lock"></i>
                                    @else
                                        <a href="#"
                                            class="btn btn-sm btn-outline-dark">
                                            <i class="fa-regular fa-pen-to-square me-2"></i>Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-dark"><i
                                                class="fa-regular fa-trash-can me-2"></i>Delete</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</x-layout-app>
