import React, { useEffect, useState } from "react";
import axiosConfig from '../Public Components/axiosConfig';
import{Chart as ChartJS, BarElement, CategoryScale, LinearScale} from 'chart.js'
import {Bar} from 'react-chartjs-2'
import Chart from 'react-apexcharts';
import AdminTopBar from "./AdminTopBar";

const AdmUserAreaChart = () => {


    const[data1,setData1] = useState();
    const[data2,setData2] = useState();
    const[data,setData] = useState();

    useEffect(()=>{

        axiosConfig.get("/Admin/UsersListCount").then((rsp)=>{           
            setData1(rsp.data[0]);
            setData2(rsp.data[1]);
            setData(rsp.data[0]+rsp.data[1]);
        debugger
        },(er)=>{
            debugger;
        })

    },[])

    return (
            <div>
                <AdminTopBar/>
                <center>Total users: {data}</center>

                <Chart
                type="area"
                width={1500}
                height={700}

                series={[
                    {
                        name:"Number of users ",
                        data:[data1,data2]
                    }
                ]}

                options={{
                    title:{
                        text:"Customers VS SubAdmins",
                        style:{fontSize:30},
                        align:'center'

                    },

                    colors:['#2A0944'],

                    theme:{mode:'light'},

                    xaxis:{
                        categories:["Customers", "SubAdmins"],
                        title:{
                            text:"User types",
                            style:{fontSize:25, color:"#2A0944"}
                        },
                        labels:{
                            style:{fontSize:20, color:"#2A0944"}
                        }
                    },

                    yaxis:{
                        title:{
                            text:"Total number of users",
                            style:{fontSize:25, color:"#2A0944"}
                        },
                        labels:{
                            style:{fontSize:20, color:"#2A0944"}
                        }
                    }
                }}
                >

                </Chart>
                
            </div>
    )
}
export default AdmUserAreaChart