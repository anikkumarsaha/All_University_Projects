import React,{useState,useEffect} from "react";
import axiosConfig from '../Public Components/axiosConfig';
import '../Css_for_chat/msgBox.css';

const ChatSys=()=>{

    const [chat,setChat] = useState([]);
    const [geseMessage,setGeseMessage] = useState(false);
    const [ashcheMessage,setAshcheMessage] = useState(false);

    useEffect(()=>{
        axiosConfig.get("subadmin/chat").then((rsp)=>{ 
        debugger     
        setChat(rsp.data);
        },(er)=>{

        })
    },[geseMessage,ashcheMessage]);

    const [message,setMessage] = useState("");
   
    
    const send=()=>{
        //pathabe
        const data={text:message,id:2};

        axiosConfig.post("subadmin/sendtext",data).
        then((succ)=>{
            setGeseMessage(true)
            console.log(succ.data) //ashche
            debugger
        },(erros)=>{
            debugger
        })

    }
    
    const sendByCustomer=()=>{
        //pathabe
        const data={text:message,id:2};

        axiosConfig.post("subadmin/sendtext",data).
        then((succ)=>{
            setGeseMessage(true)
            console.log(succ.data) //ashche
            debugger
        },(erros)=>{
            debugger
        })

    }

    return(
        
        <div className="Chat">
            
            <div class="message-box">
                <div class='bck'>
                <p>Another side</p>
                </div>    
            </div>
            
            <div class="sender-box">
                <div class='sender-bck'>
                <p>My Side</p>
                </div>    
            </div>
            
            <div class="textbox">           
            <textarea onChange={(e)=>{setMessage(e.target.value)}} resize='none' ></textarea>
            <button onClick={(e) => { send(e.target.value) }}>Send</button>
            <button onClick={(e) => { sendByCustomer(e.target.value) }}>Send By Customer</button>
            </div>
             

             
                
                <span>

                
                {
                    chat.map((ct)=>
                    <div>
                        
                        {
                        ct.a_id==0 ? //jodi a_id 0 hoy taile amar message
                            <div class="sender-box">
                                <div class='sender-bck'>
                                <p key={ct.id}> {ct.text}  </p>
                                </div>
                            </div> 
                        : 
                        <div class="message-box">
                            <div class='bck'>
                            <p key={ct.id}> {ct.text}  </p>
                            </div>    
                         </div>
                      }
                        
                    </div>

                    
                    )
                }

                </span>
                    
            

        </div>

    )
}

export default ChatSys;