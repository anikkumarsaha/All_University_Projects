import axios from "axios";

const instance = axios.create({
    baseURL: 'http://localhost:8000/api/'
});

instance.interceptors.request.use((config)=>{
    config.headers.common["Authorization"]=localStorage.getItem("_authToken");
    //alert("authorized");
    debugger;
    return config;
},(err)=>{
    debugger;
});

instance.interceptors.response.use((rsp)=>{
    debugger
    return rsp;
},(err)=>{
    if(err.response.status==401){
        debugger;
        window.location.href="/";
    }
    debugger
    return Promise.reject(err);
});
export default instance;