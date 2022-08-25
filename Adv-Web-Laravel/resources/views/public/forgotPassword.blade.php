<html>
    <form method="post" action="" >
        
    {{@csrf_field()}}

        Email: <input type="email" name="email" placeholder="email" value="{{old('email')}}"><br>
        @error('email')
            {{$message}} <br>
        @enderror

        <input type="submit" value="Send OTP">
        
    </form>
</html>