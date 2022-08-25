import { useEffect, useState } from "react";
import axiosConfig from '../Public Components/axiosConfig';
import AdminTopBar from "./AdminTopBar";

const AdminCustomersMoviesList=()=>{
    const [moviesUserList,setmoviesUserList]=useState([]);
    const [errs,setErrs] = useState({});
    const [id,setID] = useState();
    const [show,setShow] = useState(false);
    const [User,setUser]=useState([]);
    const [Search,setSearch]=useState('');


    useEffect(()=>{
    axiosConfig.get("Admin/CustomersMoviesList").then
    ((rsp)=>{
        setmoviesUserList(rsp.data);
        debugger;
    },(err)=>{
        console.log("Empty List");
        setErrs(err.response.data);
        debugger;
    });
    },[])

    const showInfo=(event)=>{
        event.preventDefault();
        axiosConfig.get(`Admin/CustomersMoviesList/${id}/details`).then
        ((succ)=>{
            setUser(succ.data[0]);
            setShow(true);
            debugger;
        },(error)=>{
            debugger;
        })
    }

    useEffect(()=>{
        const data = {search:Search}
        debugger
        axiosConfig.post("Admin/CustomerMovie/search",data).then
        ((rsp)=>{
            setmoviesUserList(rsp.data);
        debugger
        },(err)=>{
        debugger
        })
        },[Search])

    return(
        <div>
            <AdminTopBar/>
            <span><br/><br/>{
            errs.msg
            ?   <h3>{errs.msg}</h3>
            :   <div>

                    Search: <input value={Search} name='Search' onChange={(e)=>{setSearch(e.target.value)}} type="text"/> <br/><br/>

                    <table width="100%">
                        <tr>
                            <td>
                                <table border="1" width="100%">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Movie Name</th>
                                        <th>Show details</th>
                                    </tr>
                                    {
                                        moviesUserList.map((item)=>
                                        <tr key={item.ID}>
                                            <td>{ item.CustomerName }</td>
                                            <td>{ item.MovieName }</td>
                                            <td>
                                                {
                                                    <form onSubmit={showInfo}>
                                                        <input type="submit" onClick={(e)=>{setID(item.ID)}} value="Show Info"></input>
                                                    </form>
                                                }
                                            </td>
                                        </tr>
                                        )
                                    } 
                                </table>
                            </td>
                            <td>
                                <div>
                                {
                                    show
                                    ?   <div>
                                            <fieldset>
                                                <b>ID : {User.ID} </b><br/>
                                                <b>User name : {User.CustomerName} </b><br/>
                                                <b>Email : {User.CustomerEmail} </b><br/>
                                                <b>Movie name : {User.MovieName} </b><br/>
                                                <b>Movie description : {User.MovieDescription} </b><br/>
                                                <b>Movie rating : {User.MovieRating} </b><br/>
                                                <b>Movie upload time : {User.MovieUploadTime} </b><br/>
                                                <b>Movie genre : {User.MovieGenre} </b><br/>
                                            </fieldset>
                                        </div>
                                    : ""
                                }  
                                </div>
                            </td>
                        </tr>
                    </table>

                    <br/>
                </div>
                }
            </span><br/>
        </div>
    )
}
export default AdminCustomersMoviesList