import React from "react";
import { Link } from "react-router-dom";
import axiosConfig from '../Public Components/axiosConfig';
const TopBar=()=>{

    const LogOut=()=>{

        var data = {username:localStorage.getItem("username")}
        axiosConfig.post("logout",data).
        then((succ)=>{  
            
            alert(succ.data.msg)
            localStorage.clear();
            window.location.href="/";
            debugger
        },(erros)=>{
            debugger
        })
        
    }

    return(
        <div>
            <Link to="/SubAdmin/home">Home</Link> &nbsp;&nbsp;
            <Link to="/addmovies">Add Movies</Link> &nbsp;&nbsp;
            <Link to="/moviemanage">Manage Movies</Link> &nbsp;&nbsp;
            <Link to="/report">Report</Link> &nbsp;&nbsp;
            <Link to="/reportChart">Chart</Link> &nbsp;&nbsp;
            <Link to="/subadmin/profile">My profile</Link> &nbsp;&nbsp;
            <Link to="/subadmin/Chatsystem">Inbox</Link> &nbsp;&nbsp;
            <button onClick={(e)=>{LogOut()}} >Logout</button> 
        </div>
    )
}

export default TopBar;