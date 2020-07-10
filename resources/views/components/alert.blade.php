<div>
    @if(session()->has('message'))
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{session()->get("message")}}',
    })
    </script>
    <!-- <div class="alert alert-success">{{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button></div> -->

    @endif
    @if(session()->has('error'))
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{session()->get("error")}}',
    })
    </script>
    <!-- <div class="alert alert-danger">{{session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button></div> -->

    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>