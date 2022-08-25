<form method="post" action="" >
        
    {{@csrf_field()}}
        Customer ID: <input type="text" name="id" placeholder="id"  readonly value="{{$customer->id}}"><br>

        Username: <input type="text" name="name" placeholder="Name" value="{{$customer->username}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror

        Status: 

        <select name="status" id="status" >
            <option value="Active" {{ $customer->status == "Active" ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $customer->status == "Inactive" ? 'selected' : '' }}>Inactive</option>
            <option value="Banned"{{ $customer->status == "Banned" ? 'selected' : '' }}>Banned</option>
        </select>
        
        @error('status')
            {{$message}} <br>
        @enderror
        <br>
        <br>
        <input type="submit" value="  Update  ">
        
    </form>