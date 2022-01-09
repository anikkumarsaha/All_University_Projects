
      function search(){

        //alert('name');
        let name = document.getElementById('sName').value;
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/I_Search.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('name='+name);
        //alert(name);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            document.getElementById('tbl').innerHTML = this.responseText;
            //alert(this.responseText);
          }
        }

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
        xhttp.open('POST', '../controller/I_active.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+data);
        //alert(data);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            location.reload();
            alert(this.responseText);
            //document.getElementById('x').innerHTML = this.responseText;
          }
        }

      }

      function setStatus(clicked_id,status)
      {
        let No = clicked_id;

        let json = {
          'No' : No,
          'status' : status
        }
        let data = JSON.stringify(json);

        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/I_accept.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+data);
        //alert(data);
        xhttp.onreadystatechange = function(){

          if(this.readyState == 4 && this.status == 200){
            location.reload();
            alert(this.responseText);
            //document.getElementById('x').innerHTML = this.responseText;
            //console.log(this.responseText);
          }
        }

      }
