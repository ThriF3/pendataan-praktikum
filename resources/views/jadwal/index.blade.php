<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Jadwal') }}
            </h2>

            <!-- Add New Ruang Button -->
            <a href="{{ route('jadwal.create') }}">

                <x-primary-button>
                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-plus"></i>
                        {{ __('Tambah') }}
                    </div>
                </x-primary-button>

            </a>

        </div>

    </x-slot>

    <div class="py-12">

        <!-- Ruang Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm p-4 sm:rounded-lg">
                <table class="w-full overflow-hidden rounded-lg">
                    <thead class="bg-slate-100">
                        <tr class="text-slate-600">
                            <th class="py-4 bg-sky-400 text-white">Id Jadwal</th>
                            <th class="py-4">Kode Mata Kuliah</th>
                            <th class="py-4">Kode Ruang</th>
                            <th class="py-4">Hari</th>
                            <th class="py-4">Waktu</th>
                            <!-- Add other columns as needed -->
                            <th class="py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($jadwal as $data)
                        <tr class="border-b-2 border-slate-100 text-slate-800">
                            <td class="py-4 bg-sky-100">{{ $data['id_jadwal'] }}</td>
                            <td class="py-4">{{ $data->has_praktikum['id_matkul'] }}</td>
                            <td class="py-4">{{ $data->has_ruang['id_ruang'] }}</td>
                            <td class="py-4">{{ $data['hari'] }}</td>
                            <td class="py-4">{{ $data['waktu'] }}</td>
                            <!-- Add other columns as needed -->
                            <td>
                                <div class="flex flex-row justify-center gap-4">

                                    <a href="{{ route('jadwal.edit', $data['id_jadwal']) }}">
                                        <x-secondary-button>
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                    </a>

                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-data-deletion-{{ $data['id_jadwal'] }}')">{{ __('Delete Data') }}</x-danger-button>
                                    <x-modal name="confirm-data-deletion-{{ $data['id_jadwal'] }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                        <form action="{{ route('jadwal.destroy', $data['id_jadwal']) }}" method="POST" class="p-6">
                                            @csrf
                                            @method('DELETE')

                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __('Are you sure you want to delete this data?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600">
                                                {{ __('Once your data is deleted, it will be permanently deleted.') }}
                                            </p>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    {{ __('Delete Ruang') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($errors->has('error'))
            <x-modal name="error-modal" :show="$errors->has('error')" focusable>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Error</h2>
                    <p class="mt-4 text-sm text-gray-600">{{ $errors->first('error') }}</p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>
            @endif
        </div>
    </div>
</x-app-layout>