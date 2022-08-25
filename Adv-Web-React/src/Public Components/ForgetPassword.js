import axios from "axios";
import { useEffect, useState, useSyncExternalStore } from "react";
import { Navigate } from "react-router-dom";
import axiosConfig from  './axiosConfig';
import { Link } from "react-router-dom";


const ForgetPassword=()=>{

    const [email,setEmail] = useState("");
    const [otp,setOTP] = useState("");
    const [errs,setErrs] = useState({});
    const [flag,setFlag] = useState(false);
    const [pasChng,setPasChng] = useState(false);

    const handleForgetPass=(event)=>{
        event.preventDefault();
        debugger;
        var data ={email:email}
        axiosConfig.post("forgetpass",data).
        then((succ)=>{

            localStorage.setItem("OTP",succ.data.otp)
            alert("Mail sent to: "+succ.data.email)
            alert("Mail sent to: "+localStorage.getItem("OTP"))

            setFlag(true);

            debugger
        },(erros)=>{
            setErrs(erros.response.data);
            console.log(errs);
            debugger;
        })

    }

    const handleOTP=(event)=>{
        event.preventDefault();
        debugger;        
        if(otp==localStorage.getItem("OTP"))
        {
            setPasChng(true)
        }
        else
        {
            alert("OTP not matched try again")
        }

    }


    const [conf_pass,setConf_pass] = useState("");
    const [curr_pass,setCurr_pass] = useState("");
    const [new_pass,setNew_pass] = useState("");
    const handleChangePass=(event)=>{
        event.preventDefault();
        var data= {email:email,curr_pass:curr_pass,new_pass:new_pass,conf_pass:conf_pass}
        debugger
        axiosConfig.post("forget/changepass",data).
        then((succ)=>{
            //setMsg(succ.data.msg);
            setPasChng('change')
            setFlag(false)
            debugger
            localStorage.removeItem("OTP")
            window.location.href="/";
        },(err)=>{
            setErrs(err.response.data);
            console.log(err);
            debugger
        })
    }

    if (flag) {
        return(
            <div>
                

                {!pasChng &&
                    <div>
                        <form onSubmit={handleOTP}>
                        OTP: <input onChange={(e)=>{setOTP(e.target.value)}} type="text" name="OTP" value={otp}/> <br/>
                                <span>{errs.otp? errs.otp[0]:''}</span><br/>
                                <input type="submit" value="Check OTP"/>          
                        </form>
                    </div>
                }

                {pasChng &&
                    <div>

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
                }
            </div>
        )
    } else {
        return(
            <div>
    
    
                <form onSubmit={handleForgetPass}>
    
                 Email: <input onChange={(e)=>{setEmail(e.target.value)}} type="email" name="email" value={email}/> <br/>
                        <span>{errs.email? errs.email[0]:''}</span><br/>
                        <input type="submit" value="Send Verification"/>
    
                </form>
    
                
    
            </div>
        )
    }
    
}

export default ForgetPassword;