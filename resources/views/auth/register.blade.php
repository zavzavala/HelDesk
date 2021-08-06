<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Adicionar usuario</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				
					<div class="cardx fat mt-4">
						<div class="card-body">
							<h4 class="card-title">Adicionar</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">

								@if ( Session::get('success'))
									 <div class="alert alert-success">
										 {{ Session::get('success') }}
									 </div>
								@endif
								@if ( Session::get('error'))
									 <div class="alert alert-danger">
										 {{ Session::get('error') }}
									 </div>
								@endif
                                @csrf
								<div class="form-group">
									<label for="name">Nome</label>
									<input id="name" type="text" class="form-control" name="name"  autofocus placeholder="seu nome" value="{{ old('name') }}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>
								<div class="form-group">
									<label for="name">Departamento</label>
									<input id="departamento" type="text" class="form-control" name="departamento"  autofocus placeholder="Departamento" value="{{ old('departamento') }}">
									<span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email"  placeholder="Seu email" value="{{ old('email') }}">
									<span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group">
									<label for="favoriteColor">Cor favorita</label>
									<input id="favoriteColor" type="text" class="form-control" name="favoriteColor"  placeholder="Sua cor favorita">
									<span class="text-danger">@error('favoriteColor'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Palavra-passe</label>
									<input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Palavra-passe">
									<span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>
                                <div class="form-group">
									<label for="password-confirm">Confirmar Palavra-passe</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Confirmar Palavra-passe">
									<span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
                                    
								</div>


								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Cadastrar
									</button>
								</div>
								<div class="mt-4 text-center">
									Se ja esta cadastrado clicque em <a href="{{route('login')}}">Login</a>
								</div>
							</form>
						</div>
					</div>
			
				</div>
			</div>
		</div>
	</section>

<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>