@extends('layouts.app')
@section('content')
    @include('components.sidebar')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4><i class="fas fa-user-plus"></i> Update User </h4>
                    </div>

                    <div class="card-body">
                       

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action={{ route('admin.users.update', $user->id) }} method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- الاسم -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user"></i> Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control "
                                        id="name" name="name" value="{{ $user->name }}"
                                        placeholder="Enter user name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- البريد الإلكتروني -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope"></i> Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control "
                                        id="email" name="email" value="{{ $user->email }}"
                                        placeholder="example@email.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- كلمة المرور -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock"></i> Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control"
                                            id="password" name="password" placeholder="••••••••" >
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted"> must be larger than 8 characters </small>
                                </div>

                                <!-- تأكيد كلمة المرور -->
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="fas fa-lock"></i> Confirm Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="••••••••" >
                                </div>

                                <!--  (Role) -->
                                <div class="col-md-6 mb-3">
                                    <label for="role" class="form-label">
                                        <i class="fas fa-user-shield"></i> Role <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select " id="role"
                                        name="role" required>
                                        {{-- لو الرول كانت ادمن هنثبتها ادمن عشان لو مختارش --}}
                                        @if($user->role=='admin')
                                            <option selected value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                <i class="fas fa-crown"></i> Admin
                                            </option>
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                                <i class="fas fa-user"></i> User
                                            </option>
                                        @else
                                            <option  value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                <i class="fas fa-crown"></i> Admin
                                            </option>
                                            <option selected value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                                <i class="fas fa-user"></i> User
                                            </option>
                                        @endif    
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الحالة (Status) -->
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">
                                        <i class="fas fa-toggle-on"></i> Status <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                         {{-- لو status كانت اكتف هنثبتها اكتف عشان لو مختارش --}}
                                        @if($user->status=='active')
                                        <option selected value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            <i class="fas fa-check-circle"></i> Active
                                        </option>
                                        <option value="blocked" {{ old('status') == 'blocked' ? 'selected' : '' }}>
                                            <i class="fas fa-ban"></i> Blocked
                                        </option>
                                        @else
                                        <option  value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            <i class="fas fa-check-circle"></i> Active
                                        </option>
                                        <option selected value="blocked" {{ old('status') == 'blocked' ? 'selected' : '' }}>
                                            <i class="fas fa-ban"></i> Blocked
                                        </option>
                                        @endif

                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            <!--Action Buttons -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.users') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <style>
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    padding: 20px;
}

.card-header h4 {
    margin: 0;
    font-weight: 600;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
}

.form-control, .form-select {
    border-radius: 8px;
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    transition: all 0.3s;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
}

.btn {
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    background: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.text-danger {
    color: #dc3545;
}

.alert {
    border-radius: 10px;
    border: none;
}
</style>


@push('scripts')
<script>
// إظهار/إخفاء كلمة المرور
document.getElementById('togglePassword').addEventListener('click', function() {
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (password.type === 'password') {
        password.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});
</script>
@endpush

@endsection
