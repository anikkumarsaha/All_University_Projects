import axios from "axios";
import { useEffect, useState, useSyncExternalStore } from "react";
import { Navigate } from "react-router-dom";
import axiosConfig from  './axiosConfig';
import { Link } from "react-router-dom";


const Login=()=>{
    const [username,setUsername] = useState("");
    const [password,setPassword] = useState("");
    const [errs,setErrs] = useState("");

    const handleLogin=(event)=>{
        event.preventDefault();
        const data={username:username,password:password};
        // debugger;
        axiosConfig.post("login",data).
        then((succ)=>{
            
            var token=succ.data.token.token;
            var user =succ.data.user;           
            //var message=succ.data.msg; off kore rakhsi alert marbo pore
            debugger

            localStorage.setItem("_authToken",token);
            localStorage.setItem("username",username);
            
            console.log(user);
            console.log(token);
            debugger;

            alert("Hoise")
            
            if(user.role==="Admin"){                
                debugger
                window.location.href="/Admin/Home";
            }
            else if (user.role=="SubAdmin"){
                localStorage.setItem("role",'SubAdmin');
                alert(localStorage.getItem("role"));
                window.location.href="/SubAdmin/home";
            }
            else if (user.role=="Customer"){
                window.location.href="/home";
            }

        },(erros)=>{
            setErrs(erros.response.data);
            console.log(errs);
            debugger;
        })
        
    }

    return(
        <div>
            <center>
                <h1>DEKHO</h1>
            
            <br/> <hr/>
            <form onSubmit={handleLogin}>
                    Username: <input onChange={(e)=>{setUsername(e.target.value)}} size={30} type="text" name="username" value={username}/> <br/>
                    <span>{errs.username? errs.username[0]:''}</span><br/>
                    Password: <input onChange={(e)=>{setPassword(e.target.value)}} type="password" name="password" value={password}/> <br/>
                    <span>{errs.password? errs.password[0]:''}</span><br/>
                    <input type="submit" value="Login"/><br/><br/><hr/>
            </form>
            <span>{errs.msg? errs.msg:''}</span><br/>
            Don't have an account ? <button><Link to={`/registration`} >REGISTER </Link></button> <br/><br/>
            <button><Link to={`/forgetpassword`} >Forgot Password ?</Link></button> 
            </center>
        </div>
    )

}

export default Login;