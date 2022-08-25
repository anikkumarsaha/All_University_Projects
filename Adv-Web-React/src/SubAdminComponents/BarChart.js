import { Chart as ChartJS } from 'chart.js/auto'
import React, { useEffect, useState } from "react";
import { Bar,Pie} from 'react-chartjs-2'
import axiosConfig from '../Public Components/axiosConfig';
import '../CSS/pieChart.css';



const options = {
    scales: {
        
        yAxes: [
            {
                ticks: {
                    beginAtZero: true,
                },
            },
        ],
    },
};

const BarChart = () =>{

    const[bills,setBills] = useState([]);
    const[labels,setLabels] = useState([]);
    const[datas,setDatas] = useState([]);
    const[accounts,setAccounts] = useState([]);

    var data = {
        labels: labels,
        datasets: [
            {
                label: 'Billing report',
                data: datas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.4)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1,
            },
        ],
    };

    

    useEffect(()=>{

        axiosConfig.get("subadmin/bills").then((rsp)=>{            
        setAccounts(rsp.data.accounts);
        setLabels(Object.getOwnPropertyNames(rsp.data.bills));
        setDatas(Object.values(rsp.data.bills));
        debugger
        },(er)=>{
            debugger;
        })

    },[])

    return(
        
        <div id="chart-wrapper">           
            <Pie data={data} options={options}/> 
        </div>
            

    )
}

export default BarChart