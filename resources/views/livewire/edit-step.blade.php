<div>
    <h3 style="text-align:center">ADD STEPS <i wire:click="increment" class="fas fa-plus cursor-pointer"></i></h3>

    @foreach($steps as $step)
    <div class="row form-group">
        <div class="col-md-11">
        <input type="hidden" wire:key="{{$loop->index}}" class="form-control" id="" name="stepId[]" value = "{{$step['id']}}"
               ></input>
            <input type="text" wire:key="{{$loop->index}}" class="form-control" id="" name="stepName[]" value = "{{$step['name']}}"
                placeholder="{{' step'.($loop->index+1)}}"></input>
        </div>
        <div class="col-md-1">
            <i wire:click="decrement({{$loop->index}})" class="fas fa-times " style="color:red"></i>
        </div>
    </div>
    @endforeach
</div>
