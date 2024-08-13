@extends('layout.admin')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                User</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user)
                        @foreach ($user as $use)
                            <tr>
                                <td>{{ $use->id }} 11</td>
                                <td><img src="{{ asset('storage/' . $use->profile_photo_path) }}"
                                        style="width:40px;height:60px;" class="avatar" alt="Avatar">
                                    {{ $use->name }}</td>
                                <td>{{ $use->created_at }}</td>
                                <td>{{ $use->role }}</td>
                                @if ($use->Status == 'active')
                                    <td><span class="status text-success">&bull;</span> Active</td>
                                    <td>
                                    <td>
                                        <a href="#" class="settings" title="View" data-toggle="tooltip"
                                            data-username="{{ $use->name }}" data-email="{{ $use->email }}"
                                            data-role="{{ $use->role }}" data-created-at="{{ $use->created_at }}"
                                            data-two-factor="{{ $use->two_factor_secret ? 'active' : 'inactive' }}"
                                            data-email-verified="{{ $use->email_verified_at ? 'active' : 'inactive' }}">
                                            <i class="material-icons">&#xE8B8;</i>
                                        </a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"
                                            onclick="openReasonModal('{{ route('Admin.delete', $use->id) }}')"><i
                                                class="material-icons">&#xE5C9;</i></a>

                                    </td>
                                @else
                                    <td><span class="status text-success2">&bull;</span> Banned</td>
                                    <td>
                                    <td>
                                        <a href="#" class="settings" title="View" data-toggle="tooltip"
                                            data-username="{{ $use->name }}" data-email="{{ $use->email }}"
                                            data-role="{{ $use->role }}" data-created-at="{{ $use->created_at }}"
                                            data-two-factor="{{ $use->two_factor_secret ? 'active' : 'inactive' }}"
                                            data-email-verified="{{ $use->email_verified_at ? 'active' : 'inactive' }}">
                                            <i class="material-icons">&#xE8B8;</i>
                                        </a>
                                        <a href="{{ route('Admin.delete', $use->id) }}" class="delete"
                                            title="Unban Account" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <p>Danh sách danh mục trống.</p>
                    @endif
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Thêm Modal HTML -->
<div id="reasonModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter Reason for Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="reasonInput" class="form-control" placeholder="Enter reason here...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- User Details Modal HTML -->
<div id="userDetailsModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Username: <span id="username"></span></p>
                <p>Gmail: <span id="gmail"></span></p>
                <p>Role: <span id="role"></span></p>
                <p>Create_at: <span id="createAt"></span></p>
                <p>Two-factor: <span id="twoFactor"></span></p>
                <p>Email: <span id="email"></span></p>
            </div>
        </div>
    </div>
</div>
<!-- Add New User Modal HTML -->
<div id="addUserModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitUserForm()">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Your custom JavaScript code -->
<script>
    function openReasonModal(deleteUrl) {
        $('#reasonModal').modal('show');
        $('.btn-danger').attr('data-delete-url', deleteUrl);
    }

    function confirmDelete() {
        var reason = $('#reasonInput').val();
        var deleteUrl = $('.btn-danger').attr('data-delete-url');

        if (reason.trim() !== "") {
            window.location.href = deleteUrl + '?reason=' + encodeURIComponent(reason);
        }

        $('#reasonModal').modal('hide');
    }
</script>
<!-- Your custom JavaScript code -->
<script>
    function openUserDetailsModal(name, email, role, created_at, two_factor, email_verified) {
        $('#userDetailsModal').modal('show');
        $('#username').text(name);
        $('#gmail').text(email);
        $('#role').text(role);

        $('#createAt').text(created_at);
        $('#twoFactor').text(two_factor ? 'inactive' : 'active');
        $('#email').text(email_verified ? 'inactive' : 'active');
    }

    // ... (your existing code)

    // Update the "Settings" icon in your table
    // Up    date the "Settings" icon in your table
    @if ($user)
        $('.settings').click(function() {
            var username = $(this).data('username');
            var email = $(this).data('email');
            var role = $(this).data('role');
            var createdAt = $(this).data('created-at');
            var twoFactor = $(this).data('two-factor');
            var emailVerified = $(this).data('email-verified');

            openUserDetailsModal(username, email, role, createdAt, twoFactor, emailVerified);
        });
    @endif
</script>
<script>
    // Open Add New User Modal
    $('.btn-secondary').click(function() {
        $('#addUserModal').modal('show');
    });

    // Submit Add User Form
    function submitUserForm() {

        var formData = $('#addUserForm').serialize();

        // Send data to AdminController
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/admin/create', // Update the URL here
            data: formData,
            success: function(response) {
                // Handle success, e.g., close modal and refresh user list
                $('#addUserModal').modal('hide');
                location.reload();
            },
            error: function(error) {
                // Handle error, e.g., display an error message
                console.error('Error:', error);
            }
        });
    }
</script>
