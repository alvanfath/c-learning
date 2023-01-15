@extends('_layouts.app')
@section('css')

@endsection
@section('header', 'Profil')
@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" id="uploadedAvatar" src="{{ asset('upload_images/admin/' . $admin->gambar) }}"
                        onerror=this.src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Bergabung pada</div>
                            <div class="profile-widget-item-value">{{ $admin->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </div>
                <div class="ml-3">
                    @if ($errors->has('gambar'))
                    <small class="text-danger">{{$errors->get('gambar')}}</small>
                    @endif
                </div>
                <div class="ml-3 mt-1">
                    <form action="{{route('admin.profile.update_gambar', $admin->id)}}" method="post" id="upload-image"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="image-upload" class="btn btn-sm btn-primary mb-1" tabindex="0">
                            <span class="d-sm-block"><i class="fa fa-fw fa-camera"></i>Upload</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="image-upload" name="gambar" class="account-file-input" accept="image/jpg, image/png,image/jpeg,image/webp" hidden />
                        </label>
                        <button type="button" class="btn btn-sm btn-secondary mb-1 account-image-reset">Reset</button>
                        <button type="submit" id="save" class="btn btn-sm btn-secondary mb-1" disabled>Save</button>
                        @if ($admin->gambar != null)
                            <button type="button" onclick="removeGambar()" class="btn btn-sm btn-danger mb-1" id="remove-image">Remove</button>
                        @endif
                    </form>
                    <form action="{{route('admin.profile.remove_gambar', $admin->id)}}" id="remove_gambar" class="d-none" method="post">@method('put') @csrf</form>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ $admin->nama }} <div
                            class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Admin
                        </div>
                    </div>
                    Admin bertugas untuk mengatur data master yang ada di sekolah ini
                </div>
            </div>
            <div class="card">
                <form action="{{route('admin.profile.update_password', $admin->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Password Saat ini</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" required="">
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Password Baru</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                name="new_password" required="">
                                @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form action="{{route('admin.profile.update', $admin->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ $admin->nama }}" name="nama">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $admin->email }}" name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        (function() {
            const deactivateAcc = document.querySelector('#formAccountDeactivation');
            let button = document.getElementById("save");
            // Update/reset user image of account page
            let accountUserImage = document.getElementById('uploadedAvatar');
            const fileInput = document.querySelector('.account-file-input'),
                resetFileInput = document.querySelector('.account-image-reset');

            if (accountUserImage && accountUserImage.style) {
                accountUserImage.style.height = '100px'
                accountUserImage.style.width = '100px'
                const resetImage = accountUserImage.src;
                fileInput.onchange = () => {
                    if (fileInput.files[0]) {
                        accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                        button.classList.remove("btn-secondary");
                        button.classList.add("btn-info");
                        button.disabled = false;
                    }
                };
                resetFileInput.onclick = () => {
                    fileInput.value = '';
                    accountUserImage.src = resetImage;
                    button.disabled = true;
                    button.classList.remove("btn-info")
                    button.classList.add("btn-secondary")
                };
            }
        })();
    });
</script>
<script>
    function removeGambar() {
        $('#remove_gambar').submit();
    }
</script>
@endsection
