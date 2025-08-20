<!doctype html>
<html lang="en">
  <head>
  	<title>{{ $usaha_nama }} | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/'.$usaha_logo) }}" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('') }}assets/login-form-14/css/style.css">

    <style>
        body {
            background-color: #b4b4b4; /* Warna biru elegan */
            color: #ffffff; /* Warna teks putih agar kontras */
            font-family: 'Lato', sans-serif; /* Menggunakan font Lato yang sudah diimpor */
        }
    </style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">{{ $usaha_nama }}</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{ asset('') }}images/bg-login.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									{{-- <p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p> --}}
								</div>
			      	</div>
							<form action="{{ url('login') }}" class="signin-form" id="form" method="POST">
                                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="username">Username</label>
			      			<input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									{{-- <div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div> --}}
		            </div>
		          </form>
		          {{-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> --}}
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('') }}assets/login-form-14/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/login-form-14/js/popper.js"></script>
    <script src="{{ asset('') }}assets/login-form-14/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/login-form-14/js/main.js"></script>


    <!-- sweet Alert -->
    <script src="{{ asset('') }}assets/sweetalert/sweetalert.min.js"></script>


	<script>
        $(document).ready(function () {
            $('#form').on('submit', function (e) {
                e.preventDefault(); // Cegah reload halaman

                // Tampilkan loading atau disable button
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();
                submitBtn.html('<i class="fa fa-spinner fa-spin mr-2"></i> Loading...').prop('disabled', true);

                $.ajax({
                    url: "{{ url('login') }}",
                    method: "POST",
                    data: $(this).serialize(), // Ambil semua data form
                    dataType: "json",
                    success: function (response) {

                        if (response.success) {
                            submitBtn.html('<i class="fa fa-spinner fa-spin mr-2"></i> Loading menu pengguna...');

                            $.ajax({
                                url: "{{ url('login/loadMenus') }}",
                                type: 'GET',
                                dataType: 'json',
                            })
                            .done(function(response) {
                                console.log(response);
                                window.location.href = "{{ url('/') }}";

                                // swal({
                                //     icon: 'success',
                                //     title: 'Berhasil!',
                                //     text: "Login berhasil, redirecting...",
                                //     timer: 2000,
                                //     showConfirmButton: false
                                // }).then(() => {
                                //     window.location.href = "{{ url('/') }}";
                                // });
                            })
                            .fail(function() {
                                console.log('error loadMenus');
                            });

                            

                        } else {
                            submitBtn.html(originalText).prop('disabled', false);

                            swal("Gagal!", response.message || "Username atau password salah.", "error")
                                .then(() => {
                                    $('#username').focus();
                                });
                        }
                    },
                    error: function (xhr) {
                        submitBtn.html(originalText).prop('disabled', false);
                        let message = "Terjadi kesalahan.";

                        if (xhr.status === 422) {
                            // Validasi error
                            const errors = xhr.responseJSON.errors;
                            message = Object.values(errors).flat().join("<br>");
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }

                        swal("Error!", message, "error")
                            .then(() => {
                                $('#username').focus();
                            });
                    }
                });
            });
        });
    </script>

    @if (session('message'))
    <script>
        swal("Informasi", "{{ session('message') }}", "info")
            .then(function() {
                $('#username').focus();
            });
    </script>
    @endif

	</body>
</html>

