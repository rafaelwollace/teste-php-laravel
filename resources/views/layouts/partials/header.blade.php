<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Rafael Cunha">
  <title>Sistema GAFA</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  @livewireStyles

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar:true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert',({detail:{type,message}})=>{
            Toast.fire({
                icon:type,
                title:message
            })
        })
    </script>
</head>
<body>
  
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Teste PHP</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ url('/') }}">Clientes</a>
        <a class="p-2 text-dark" href="{{ url('/produto') }}">Produtos</a>
        <a class="p-2 text-dark" href="{{ url('/compra') }}">Compras</a>
      </nav>
      <a class="btn btn-outline-primary" href="#">Entrar no Sistema</a>
    </div>
</header>