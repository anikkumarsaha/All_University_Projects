import React,{useState,useEffect} from "react";
import axiosConfig from '../Public Components/axiosConfig';
import {Bar} from 'react-chartjs-2'
import BarChart from './BarChart';


const Reports=()=>{

    const[bills,setBills] = useState([]);
    const[accounts,setAccounts] = useState([]);
    const [datachange, setDatachange] = useState('');

    useEffect(()=>{

        axiosConfig.get("subadmin/bills").then((rsp)=>{            
        setAccounts(rsp.data.accounts);
        setBills(rsp.data.bills);
        debugger
        },(er)=>{
            debugger;
        })

    },[])
    

    const handleChange=(id,vl)=>{
        var data={id:id,status:vl}
        debugger
        axiosConfig.post("subadmin/bills/changestatus",data).
        then((rsp)=>{
            window.location.reload(false);
            debugger
            },(er)=>{

                debugger;
            })
    }

    return(
        <div>
            


                <table width='100%'>
                    <tr>
                        <td>
                    Total Account:{bills.actives+bills.inactives+bills.bans} <br/><br/>
                    Paid: {bills.actives} <br></br>
                    inacative: {bills.inactives} <br></br>
                    banned: {bills.bans} <br></br>
                        </td>
                        <td >
                        <BarChart />
                        </td>
                    </tr>
                </table>


            <table width='100%  ' border='1'>
                <th>Username</th>
                <th>Status</th>
                <th>OP</th>

                {
                    accounts.map((ac)=>
                    <tr>
                        <td key={ac.id}>{ac.username}</td>
                        
                        <td>
                            {ac.status}
                        </td>

                        <td>
                            <center>
                            <button onClick={(e)=>{handleChange(ac.id,e.target.value)}} value="Active">Active</button>
                            <button onClick={(e)=>{handleChange(ac.id,e.target.value)}} value="Banned">Banned</button>
                            <button onClick={(e)=>{handleChange(ac.id,e.target.value)}} value="Inactive">Inactive</button>
                            </center>
                            
                        </td>
                    </tr>
                    )
                }
            </table>
        </div>
    )
}

export default Reports;