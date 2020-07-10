            @if(session()->has('message'))
            <div class="alert alert-success">{{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button></div>
           
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert">&times;</button></div>
           
            @endif