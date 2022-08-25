import axios from "axios";
import { useEffect, useState, useSyncExternalStore } from "react";
import { Navigate } from "react-router-dom";
import axiosConfig from  './axiosConfig';

const Registration=()=>{
    const [username,setUsername] = useState("");
    const [password,setPassword] = useState("");
    const [cpassword,setCPassword] = useState("");
    const [email,setEmail] = useState("");
    const [errs,setErrs] = useState({});


    const handleReg=(event)=>{
        event.preventDefault();
        const data={email:email,username:username,password:password,confirmPassword:cpassword};
        axiosConfig.post("registration",data).
        then((succ)=>{
            
            alert(succ.data.msg)
            window.location.href="/";
            debugger
        },(erros)=>{
            setErrs(erros.response.data);
            console.log(errs);
            debugger;
        })

    }
    return(
        <div>
            <center><h1>DEKHO</h1></center><br/> <hr/>

            <form onSubmit={handleReg}>

            
            
            Username: <input onChange={(e)=>{setUsername(e.target.value)}} size={30} type="text" name="username" value={username}/> <br/>
                    <span>{errs.username? errs.username[0]:''}</span><br/>
            
            Email: <input onChange={(e)=>{setEmail(e.target.value)}} type="email" name="email" value={email}/> <br/>
                    <span>{errs.email? errs.email[0]:''}</span><br/>
                    
            Password: <input onChange={(e)=>{setPassword(e.target.value)}} type="password" name="password" value={password}/> <br/>
                    <span>{errs.password? errs.password[0]:''}</span><br/>
                    
            Confirm Password: <input onChange={(e)=>{setCPassword(e.target.value)}} type="password" name="password" value={cpassword}/> <br/>
                    <span>{errs.cpassword? errs.cpassword[0]:''}</span><br/>
                    
                    <input type="submit" value="Registration"/>
            </form>
        </div>
    )
}

export default Registration;