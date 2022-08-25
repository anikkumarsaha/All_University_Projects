import AdminTop from "./AdminTop";
import axiosConfig from  '../Public Components/axiosConfig';
import { Link } from "react-router-dom";
const AdminTopBar=()=>{

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
            <center><h1>DEKHO</h1></center>

            <Link to={`/admin/profile/`} ><p align='right'>Profile</p> </Link>

            <hr/>
            <AdminTop url="/Admin/CustomersMoviesList" value="Customers-Movies"/> |
            | <AdminTop url="/Admin/UsersList" value="All Users"/> |
            | <AdminTop url="/Admin/UsersBar" value="Users-BarChart"/> |
            | <AdminTop url="/Admin/UsersArea" value="Users-AreaChart"/> |

            | <button onClick={(e)=>{LogOut()}} >Logout</button> 
            <hr/>
        </div>
    )
}
export default AdminTopBar;