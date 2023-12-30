<div class="p-6">
    @if ($showToast)
        @if (session()->has('success'))
            <div class="toast toast-center ">
                <div class="alert alert-success">
                    <span>{{ session()->get('success') }}</span>
                    <span class="cursor-pointer hover:opacity-85" wire:click="closeToast()">X</span>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="toast toast-center">
                <div class="alert alert-error">
                    <span>{{ session()->get('error') }}</span>
                </div>
            </div>
        @endif
    @endif
    <h1 class="text-3xl font-medium">Users</h1>

    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <th> {{ $i }} </th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if (!$user->is_admin)
                                <p>User</p>
                            @else
                                <p>Admin</p>
                            @endif
                        </td>
                        <td>
                            @if (!$user->is_admin)
                                <button wire:click="changeRole({{ $user }})"
                                    class="btn btn-secondary btn-sm">Promote to Admin</button>
                            @else
                                <button wire:click="changeRole({{ $user }})"
                                    class="btn btn-secondary btn-sm">Demote to User</button>
                            @endif
                            <button wire:click="destroy({{ $user->id }})"
                                class="btn btn-sm btn-error">Delete</button>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <div class="mt-10">
            {{ $users->links() }}
        </div>
    </div>
</div>
