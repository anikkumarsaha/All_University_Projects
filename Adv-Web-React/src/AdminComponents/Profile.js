import { useEffect, useState } from "react";
import axiosConfig from  '../Public Components/axiosConfig.js';
import '../CSS/table.css';
import AdminTopBar from "./AdminTopBar.js";
const Profile=()=>{


    const [user,setUser] = useState({});
    const [profilepic,setProfilepic] = useState(null);
    const [conf_pass,setConf_pass] = useState("");
    const [curr_pass,setCurr_pass] = useState("");
    const [new_pass,setNew_pass] = useState("");
    const [errs,setErrs] = useState({});
    const [flag,setFlag] = useState(false);
    const [ppFlag,setppFlag] = useState(false);
    
    
    useEffect(()=>{

    var data = {username:localStorage.getItem("username")}
    axiosConfig.post("userinfo",data).then
    ((rsp)=>{
        setUser(rsp.data)
        debugger;
    },(err)=>{
        debugger;
    });
    },[ppFlag])

    const ChangePassCLK=()=>{
        setFlag(true)

    }
    const handleSubmit=(event)=>{
        event.preventDefault();
        
        var data = new FormData();

        data.append("username",user.username);
        data.append("profilepic",profilepic,localStorage.getItem("username"));
        
        console.log(data);
        debugger
        axiosConfig.post("profilepic/upload",data).
        then((succ)=>{
            //setMsg(succ.data.msg);
            setppFlag(true)
            debugger
            //window.location.href="/";
        },(err)=>{
            setErrs(err.response.data);
            console.log(err);
            debugger
        })
    }
    
    const handleChangePass=(event)=>{
        event.preventDefault();
        var data= {username:localStorage.getItem("username"),curr_pass:curr_pass,new_pass:new_pass,conf_pass:conf_pass}
        debugger
        axiosConfig.post("profilepic/changepass",data).
        then((succ)=>{
            //setMsg(succ.data.msg);
            setFlag(false)
            setppFlag('change')
            debugger
            //window.location.href="/";
        },(err)=>{
            setErrs(err.response.data);
            console.log(err);
            debugger
        })
    }

    
    return(
        <div>
            <AdminTopBar/>
            <br/>
            <b>
                <table width='100%' height='500px'>

                    <tr>
                        <td>Username:</td>
                        <td>{localStorage.getItem("username")}</td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td>{user.email}</td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td>{user.password}</td>
                    </tr>

                    <tr>
                        <td>Role:</td>
                        <td>{user.role}</td>
                    </tr>
                    
                    <tr>
                        <td>Profile Pic:</td>
                        <td>
                            <img height='250px' width='25%'src={`http://localhost:8000/profilepics/${user.profilepic}`} ></img>
                            <br/>
                            <form onSubmit={handleSubmit}>
                                <input type="file" onChange={(e)=>{setProfilepic(e.target.files[0])}} name="profilepic"></input> 
                                <span>{errs.profilepic? errs.profilepic[0]:''} </span><br/>
                                <input type="submit" value="Upload"/> 
                            </form>
                        </td>
                    </tr>
                </table>
                <div>
                {
                    !flag
                        ? <div>
                                <button onClick={ChangePassCLK}>Change Password</button>
                            </div>
                        : ''
                }
                </div>

                    <div>
                    {
                        flag
                            ? <div>

                                <form onSubmit={handleChangePass}>
                                <hr/>
                                
                                Old Password: <input onChange={(e)=>{setCurr_pass(e.target.value)}} type="conf_pass" name="conf_pass" value={curr_pass}/> <br/>
                                <span>{errs.curr_pass? errs.curr_pass[0]:''}</span><br/>
                                
                                    New Password: <input onChange={(e)=>{setNew_pass(e.target.value)}} type="conf_pass" name="conf_pass" value={new_pass}/> <br/>
                                <span>{errs.new_pass? errs.new_pass[0]:''}</span><br/>

                                    Confirm Password: <input onChange={(e)=>{setConf_pass(e.target.value)}} type="conf_pass" name="conf_pass" value={conf_pass}/> <br/>
                                <span>{errs.conf_pass? errs.conf_pass[0]:''}</span><br/>
                                <input type="submit" value="Change"/>
                                </form>
                                </div>
                            : ""
                    }
                    </div>
            </b>
        </div>
    )
}
export default Profile