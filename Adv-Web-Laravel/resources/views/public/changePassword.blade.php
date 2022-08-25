<html>
    
    <form method="post" action="" >
        
    {{@csrf_field()}}
    
        Password: <input type="password" name="password" placeholder="Password" ><br>
        @error('password')
            {{$message}} <br>
        @enderror

        Confirm Password: <input type="password" name="conf_password" placeholder="Confirm Password"><br>
        @error('conf_password')
            {{$message}} <br>
        @enderror


        <input type="submit" value="Submit">
        
    </form>
</html>