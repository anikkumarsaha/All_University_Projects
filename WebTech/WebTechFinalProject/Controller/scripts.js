
      function nameValid() {

            let x = document.getElementById("name").value;

            let e=document.getElementById("nError");

            let text

            if(x=='')
            {
              text="Please fill the input field";
            }
            else if (!isNaN(x))
            {
              text="Username cannot be just a number";
            }
            else {
              text= '';
            }
            e.innerHTML = text;

      }

      function nameValid2() {

            let x = document.getElementById("uname").value;

            let e=document.getElementById("nE");

            let text

            if(x=='')
            {
              text="Please fill the input field";
            }
            else if (!isNaN(x))
            {
              text="Username cannot be just a number";
            }
            else {
              text= '';
            }
            e.innerHTML = text;
      }

      function passValid() {

            let x = document.getElementById("pass").value;

            let e=document.getElementById("nPass");

            let text

            if(x=='')
            {
              text="Please fill the input field";
            }
            else if (!isNaN(x))
            {
              text="Password cannot be just a number";
            }
            else {
              text= '';
            }
            e.innerHTML = text;
      }

      function emailValid() {

      let x = document.getElementById("mail").value;

      let e=document.getElementById("nMail");

      let text

      if(x=='')
      {
        text="Please fill the input field";
      }
      else if (!isNaN(x))
      {
        text="Email cannot be just a number";
      }
      else {
        text= '';
      }
      e.innerHTML = text;
      }

      function phoneValid() {

      let x = document.getElementById("phone").value;

      let e=document.getElementById("nPhone");

      let text;

      if(x=='')
      {
        text="Please fill the input field";
      }
      else if (isNaN(x))
      {
        text="Phone number must be just a number";
      }
      else {
        text= '';
      }
      e.innerHTML = text;
      }

      function ajax()
      {
        alert("ok");

        /*let username = document.getElementById('name').value;
        let password = document.getElementById('pass').value;
        let email = document.getElementById('mail').value;
        let phone = document.getElementById('phone').value;
        var roles = document.getElementsByName('roles');
        var role;
        for (var i = 0; i < roles.length; i++) {

          if(roles[i].checked)
          {
            role = roles[i].value;
          }
        }


        let json = {
          'username' : username,
          'password' : password,
          'email' : email,
          'phone' : phone,
          'role' : role
        }


        let myjson = JSON.stringify(json);
        let xhttp = new XMLHttpRequest();

        xhttp.open('POST', '../controller/abc.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+myjson);

      	xhttp.onreadystatechange = function(){

      		if(this.readyState == 4 && this.status == 200){
           //alert(this.responseText);
      			//ocument.getElementById('Notice').innerHTML = this.responseText;
      		}
      	}
*/

      }

      function ValidTitle()
      {
        let Title = document.getElementById("Title").value;

        if(Title!='')
        {
          return true;
        }
        else {
          //alert('Empty Post Title');
          return false;
        }
      }

      function ValidPost()
      {
        let Post = document.getElementById("Post").value;


        if(Post!='')
        {
          return true;
        }
        else {
          //alert('Empty Post');
          return false;
        }
      }

      function search(v){

        if(v==1)
        {
          //alert('name');
          let name = document.getElementById('sName').value;
          let xhttp = new XMLHttpRequest();
          xhttp.open('POST', '../controller/Search.php', true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send('name='+name);
          //alert(name);
          xhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
              document.getElementById('table').innerHTML = this.responseText;
            }
          }
        }
      }

      function searchUser(){

          let name = document.getElementById('sName').value;
          let xhttp = new XMLHttpRequest();
          xhttp.open('POST', '../controller/SearchUser.php', true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send('name='+name);

          //alert(name);
          xhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
              document.getElementById('table').innerHTML = this.responseText;
            }
          }
        }



      function notify(clicked_id){

        let id = clicked_id;
        //alert(id);
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/notifyUser.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('id='+id);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            alert(this.responseText);
            //document.getElementById('notify').innerHTML = this.responseText;
          }
        }
      }

      function editUser(clicked_id,x){
        let id = clicked_id;
        alert(id);
        if(x==1)
        {

          var result = confirm("Want to Edit?");
          if (result) {

            document.getElementById('dom').innerHTML = document.getElementById('edit').innerHTML;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/getUser.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('id='+id);
            xhttp.onreadystatechange = function(){

              if(this.readyState == 4 && this.status == 200){

                let obj = JSON.parse(this.responseText);
                /*	alert(obj.username);
                alert(obj.email);
                alert(obj.password);
                alert(JSON.stringify(obj));*/
                document.getElementById('uname').value = obj.username;
                document.getElementById('pass').value = obj.password;
                document.getElementById('mail').value = obj.email;
                document.getElementById('btn').value = id;

              }
            }
          }

        }
        else if (x==2)
        {

          let username =document.getElementById('uname').value;
          let password =document.getElementById('pass').value;
          let email =document.getElementById('mail').value;
          let id =document.getElementById('btn').value;

          let json = {
            'username' 	: username,
            'password'	: password,
            'email'	: email,
            'id' : id
          }

          let data = JSON.stringify(json);

          alert(data);


          let xhttp = new XMLHttpRequest();
          xhttp.open('POST', '../controller/editUser.php', true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send('data='+data);
          xhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
              document.getElementById('dom').innerHTML = document.getElementById('list').innerHTML;
              location.reload();
            }
          }
        }



      }

      function deleteUser(clicked_id){
        let id = clicked_id;
        var result = confirm("Want to delete?");
        if (result) {
          let xhttp = new XMLHttpRequest();
          xhttp.open('POST', '../controller/deleteUser.php', true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send('id='+id);
          xhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
              location.reload();
              alert(this.responseText);
              //document.getElementById('delete').innerHTML = 'noice';
            }
          }
        }
      }
      let clickCnt=0;

      function editProfile(){

        clickCnt++;

        //alert(clickCnt);

        let username = document.getElementById('name').value;
        let password = document.getElementById('pass').value;
        let email = document.getElementById('mail').value;
        let phone = document.getElementById('phone').value;
        let id = document.getElementById('id').value;

        //alert(id);

        let json = {
          'username' 	: username,
          'password'	: password,
          'email'	: email,
          'phone' :phone,
          'id' : id
        }

        let data = JSON.stringify(json);


        if (clickCnt==1) {

          //document.getElementById('photo').hidden = false;
          document.getElementById("name").readOnly = false;
          document.getElementById("pass").readOnly = false;
          document.getElementById("mail").readOnly = false;
          document.getElementById("phone").readOnly = false;

          document.getElementById("name").style.borderWidth  = "1px";
          document.getElementById("pass").style.borderWidth  = "1px";
          document.getElementById("mail").style.borderWidth  = "1px";
          document.getElementById("phone").style.borderWidth  = "1px";

          document.getElementById("editUser").innerHTML = "UPDATE";
          document.getElementById("msg").innerHTML = "You can edit now";

        }
        else {

          var result = confirm("Want to EDIT?");
          if (result) {

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/editProfile.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('data='+data);
            xhttp.onreadystatechange = function(){

              if(this.readyState == 4 && this.status == 200){
                clickCnt=0;
                alert(this.responseText);
              }
            }

          }

          document.getElementById('msg').innerHTML = 'EDITED';
          //document.getElementById('photo').hidden = true;
          document.getElementById("name").readOnly = true;
          document.getElementById("pass").readOnly = true;
          document.getElementById("mail").readOnly = true;
          document.getElementById("phone").readOnly = true;

          document.getElementById("name").style.borderWidth  = "0px";
          document.getElementById("pass").style.borderWidth  = "0px";
          document.getElementById("mail").style.borderWidth  = "0px";
          document.getElementById("phone").style.borderWidth  = "0px";

          document.getElementById("editUser").innerHTML = "MAKE EDITABLE";


        }
      }


      function uploadPhoto()
      {
        /*var v =document.getElementById("img").value;
        let result = v.substr(12, v.length);*/

        /*document.querySelector("img").addEventListener("change",function()
        {
          const reader =new FileReader();
          reader.readAsDataURL(this.files[0]);
        };
        //let p = getElementsByName('myfile').value;
        /*let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/photo.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+result);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            //document.getElementById('msg').innerHTML = 'EDITED';
            alert(this.responseText);
          }
      }*/
    }

      function PhotoValid()
      {
        var v =document.getElementById("img").value;
        let t = v.substr(12, v.length);
        t = t.split(".");

        //alert(t[1]);

        if (t[1] != "jpeg" && t[1] != "jpg" && t[1] != "png" && t[1] != "bmp" && t[1] != "gif") {
          alert('Please select a valid image file');
          document.getElementById("img").value = '';
          return false;
        }
        return true;
      }

      function active(clicked_id,status)
      {
        let id = clicked_id;

        let json = {
          'id' : id,
          'status' : status
        }
        let data = JSON.stringify(json);

        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/active.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+data);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            location.reload();
            alert(this.responseText);
            //document.getElementById('x').innerHTML = this.responseText;
          }
        }

      }

      function post()
      {
        alert("data");
        /*let post = document.getElementsByName("Post").value;
        let postTitle = document.getElementsByName("Title").value;
        let id = document.getElementsByName("id").value;
        let username = document.getElementsByName("username").value;

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;

        let json = {
          'post' : post,
          'id' : id,
          'title' : postTitle,
          'username' : username,
          'time' : dateTime
        }
        let data = JSON.stringify(json);

        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/posting.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+data);

        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            location.reload();
            alert(this.responseText);
            //document.getElementById('x').innerHTML = this.responseText;
          }
        }*/

      }

      function done() {
        if (ValidTitle()) {
          if (ValidPost()) {

            let postTitle = document.getElementById("Title").value;
            let id = document.getElementById("id").value;
            let username = document.getElementById("username").value;
            let post = document.getElementById("Post").value;

            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;

            let json = {
              'post' : post,
              'id' : id,
              'title' : postTitle,
              'username' : username,
              'time' : dateTime
            }

            let data = JSON.stringify(json);

            //alert(data);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/posting.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('data='+data);

            alert("Posted");
            
            xhttp.onreadystatechange = function(){

              if(this.readyState == 4 && this.status == 200){

              }
            }
          }else {
            alert("Can not have empty post");
          }
        }else {

        //  document.getElementById('nTitle').innerHTML = "Can not have empty Title";
          alert("Can not have empty Title");
        }

      }
