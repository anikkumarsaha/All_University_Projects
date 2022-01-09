function RegistrationValidation()
{
  let name = document.getElementById('name').value;
  let username = document.getElementById('username').value;
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let confirm = document.getElementById('confirmpassword').value;
  let number = document.getElementById('number').value;
  let roles = document.getElementsByName('Role');
        let role;
        for (var i = 0; i < roles.length; i++) {
          if(roles[i].checked)
          {
            role = roles[i].value;
          }
        }
  let gender = document.getElementsByName('Gender');
        let selectedgender;
        for (var j = 0; j < gender.length; j++) {
          if(gender[j].checked)
          {
            selectedgender = gender[j].value;
          }
        }

  if(name != "")
  {
    if(username != "")
    {
      if(email != "")
      {
        if(password != "")
        {
          if(confirm != "")
          {
            if(number != "")
            {
              if(selectedgender != "")
              {
                if(role != "")
                {
                  let json = {
                    'username' : username,
                    'password' : password,
                    'email' : email,
                    'number' : number,
                    'role' : role
                  }

                  let myjson = JSON.stringify(json);

                	let xhttp = new XMLHttpRequest();

                	xhttp.open('POST', '../Controller/J_RegistrationCheck.php', true);
                	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                	xhttp.send('data='+myjson);
                	xhttp.onreadystatechange = function(){

                		if(this.readyState == 4 && this.status == 200){
                			//alert(this.responseText);
                		}
                	}
                  return true;
                }
                else
                {
                  alert("Please select a role");
                  return false;
                }
              }
              else
              {
                alert('Please select your gender');
                return false;
              }
            }
            else
            {
              alert('Please provide your contact number');
              return false;
            }
          }
          else
          {
            alert('Please re-enter your password');
            return false;
          }
        }
        else
        {
          alert('Please provide your password');
          return false;
        }
      }
      else
      {
        alert('Please provide your email');
        return false;
      }
    }
    else
    {
      alert('Please provide your username');
      return false;
    }
  }
  else
  {
    alert('Please provide your name');
    return false;
  }
}



function ViewApplicantsValidation()
{
  let search = document.getElementById('search').value;

  if(search != "")
  {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/J_SearchApplicantsResults.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+search);
    xhttp.onreadystatechange = function(){

      if(this.readyState == 4 && this.status == 200){
        //alert(this.responseText);
      }
    }
    return true;
  }
  else
  {
    alert('Please write something');
    return false;
  }
}



function StudentSearchValidation()
{
  let search = document.getElementById('search').value;

  if(search != "")
  {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/J_SearchStudentsResults.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+search);
    xhttp.onreadystatechange = function(){

      if(this.readyState == 4 && this.status == 200){

        //alert(this.responseText);
      }
    }
    return true;
  }
  else
  {
    alert('Please write something');
    return false;
  }
}



function PostValidation()
{
  let post = document.getElementById('post').value;

  if(post != "")
  {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/J_PostCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+post);
    xhttp.onreadystatechange = function(){

      if(this.readyState == 4 && this.status == 200){
        alert('POST ADDED');
        //document.getElementById('message').innerHTML = 'POST ADDED';
      }
    }
    return true;
  }
  else
  {
    alert('Please write something');
    return false;
  }
}



function OtherCompanyValidation()
{
  let search = document.getElementById('search').value;

  if(search != "")
  {
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../Controller/J_SearchCompanyResults.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+search);
    xhttp.onreadystatechange = function(){

      if(this.readyState == 4 && this.status == 200){
        //alert(this.responseText);
      }
    }
    return true;
  }
  else
  {
    alert('Please write something');
    return false;
  }
}

function Invt(ID)
{
  let id = ID;
  //let invt = document.getElementById('Invite').value;
  let xhttp = new XMLHttpRequest();

  xhttp.open('POST', '../Controller/J_InviteStudents.php', true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('id='+id);
  xhttp.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
      alert(this.responseText);

    }


}
}

function Accept(ID)
{
  let id = ID;
  //let invt = document.getElementById('Invite').value;
  let xhttp = new XMLHttpRequest();

  xhttp.open('POST', '../Controller/J_AcceptApplicants.php', true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('id='+id);
  xhttp.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
      alert(this.responseText);

    }


}
}


function SEARCH(NAME)
{
  let name = NAME;
  //let invt = document.getElementById('Invite').value;
  let xhttp = new XMLHttpRequest();

  xhttp.open('POST', '../Controller/J_SearchCompany.php', true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('name='+name);
  xhttp.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
      //alert(this.responseText);
      document.getElementById('table').innerHTML = this.responseText;
    }


}
}



function LoginValidation()
{
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  if(username != "")
  {
    if(password != "")
    {
      let json = {
        'username' : username,
        'password' : password,
      }

      let myjson = JSON.stringify(json);

      let xhttp = new XMLHttpRequest();

      xhttp.open('POST', '../Controller/J_LoginCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send('data='+myjson);
      xhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
          //alert(this.responseText);
        }
      }
      return true;
    }
    else
    {
      alert('Please provide your password');
      return false;
    }
  }
  else
  {
    alert('Please provide your username');
    return false;
  }
}



function ForgotPasswordValidation()
{
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;
  let confirm = document.getElementById('confirm').value;


  if(username != "")
  {
    if(password != "")
    {
      if(confirm != "")
      {
        if (confirm == password) {

          let json = {
            'username' : username,
            'password' : password,
          }

          let myjson = JSON.stringify(json);

          let xhttp = new XMLHttpRequest();


          xhttp.open('POST', '../Controller/J_ForgotPasswordCheck.php', true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send('data='+myjson);
          alert("Password Changed successfully");
          xhttp.onreadystatechange = function(){

            if(this.readyState == 4 && this.status == 200){
              //alert(this.responseText);
            }
          }
          return true;
        }

        else {
          alert('Your confirmed password and password does not match');
        }
      }
      else
      {
        alert('Please re-enter your password');
        return false;
      }
    }
    else
    {
      alert('Please provide your password');
      return false;
    }
  }
  else
  {
    alert('Please provide your username');
    return false;
  }
}



function EditProfileValidation()
{
  let username = document.getElementById('username').value;
  let email = document.getElementById('email').value;
  let number = document.getElementById('number').value;

  if(username != "")
  {
    if(email != "")
    {
      if(number != "")
      {
        let json = {
          'username' : username,
          'email' : email,
          'number' : number
        }

        let myjson = JSON.stringify(json);

        let xhttp = new XMLHttpRequest();

        xhttp.open('POST', '../Controller/J_EditProfileCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+myjson);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            alert("Information updated successfully");
          }
        }
        return true;
      }
      else
      {
        alert('Please provide your contact number');
        return false;
      }
    }
    else
    {
      alert('Please provide your email');
      return false;
    }
  }
  else
  {
    alert('Please provide your username');
    return false;
  }
}



function ChangePasswordValidation()
{
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;
  let confirm = document.getElementById('confirm').value;

  if(password != "")
  {
    if(confirm != "")
    {
      let json = {
        'username' : username,
        'password' : password
      }
      if (confirm == password) {


        let myjson = JSON.stringify(json);

        let xhttp = new XMLHttpRequest();

        xhttp.open('POST', '../Controller/J_ChangePasswordCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+myjson);
        alert("Password Changed successfully");
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){

          }
        }
        return true;

      }
      else {
        alert('Both password does not match');
      }

    }
    else
    {
      alert('Please re-enter your password');

    }
  }
  else
  {
    alert('Please provide your password');
    return false;
  }
}
