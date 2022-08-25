import { useEffect, useState } from "react";
import axiosConfig from '../Public Components/axiosConfig';
import AdminTopBar from "./AdminTopBar";
import AppPagination from "./AppPagination";

const AdminUsersList = () => {
    const [UserList, setUserList] = useState([]);
    const [errs, setErrs] = useState({});
    const [id, setID] = useState();
    const [show, setShow] = useState(false);
    const [User, setUser] = useState([]);
    const [search, setSearch] = useState('');

    useEffect(() => {
        axiosConfig.get("Admin/UsersList").then
            ((rsp) => {
                setUserList(rsp.data);
                debugger;
            }, (err) => {
                console.log("Empty List");
                setErrs(err.response.data);
                debugger;
            });
    }, [])

    const changeRole = (event) => {
        event.preventDefault();
        debugger;
        axiosConfig.get(`Admin/UsersList/${id}/details`).then(
            (succ) => {
                debugger;
                window.location.href = "/Admin/UsersList";
            }, (err) => {
                debugger;
            }
        )
    }

    const showInfo = (event) => {
        event.preventDefault();
        axiosConfig.get(`Admin/UserInfo/${id}/details`).then
            ((succ) => {
                setUser(succ.data);
                setShow(true);
                debugger;
            }, (error) => {
                debugger;
            })
    }

    const searched = (anything) => {
        // event.preventDefault();
        console.log(anything);
        setSearch(anything);
        axiosConfig.post("Admin/UsersList/search", { search: anything })
            .then((rsp) => {
                setUserList(rsp.data);
                debugger
            })
            .catch((err) => {
                debugger
            });
    }

    return (
        <div>
            <AdminTopBar />
            <AppPagination/>
            <span><br /><br />{

                errs.msg
                    ? <h3>{errs.msg}</h3>
                    : <div>





                        {/* Search: <input value={search} name="search" onChange={(e) => {setSearch(e.target.value.trim()); console.log(search)}} type="text" /> */}
                        Search: <input type="text" name="search" onChange={(e) => { searched(e.target.value.trim()) }} value={search} /> <br/><br/>

                        <table width="100%">
                            <tr>
                                <td>
                                    <table border="1" width="100%">
                                        <tr>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Operation</th>
                                            <th>Show details</th>
                                            
                                        </tr>
                                        {
                                            UserList.map((item) =>
                                                <tr key={item.id}>
                                                    <td>{item.username}</td>
                                                    <td>{item.role}</td>
                                                    <td>
                                                        {
                                                            <form onSubmit={changeRole}>
                                                                <input type="submit" onClick={(e) => { setID(item.id) }} value="Change Role"></input>
                                                            </form>
                                                        }
                                                    </td>
                                                    <td>
                                                        {
                                                            <form onSubmit={showInfo}>
                                                                <input type="submit" onClick={(e) => { setID(item.id) }} value="Show Info"></input>
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
                                                ? <div>
                                                    <fieldset>
                                                        <b>ID : {User.id} </b><br />
                                                        <b>Username : {User.username} </b><br />
                                                        <b>Email : {User.email} </b><br />
                                                        <b>Role : {User.role} </b><br />
                                                        <b>Payment : {User.Payment} </b><br />
                                                        <b>Payment Date : {User.PaymentDate} </b><br />
                                                        <b>Status : {User.status} </b><br />
                                                    </fieldset>
                                                </div>
                                                : ""
                                        }
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <br />
                    </div>
            }
            </span><br />
        </div>
    )
}
export default AdminUsersList