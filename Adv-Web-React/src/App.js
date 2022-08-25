//import './App.css';
import TopBar from './SubAdminComponents/TopBar';
import Home from './SubAdminComponents/Home';
import {BrowserRouter as Router,Route,Routes} from 'react-router-dom';
import AddMovies from './SubAdminComponents/AddMovies';
import MovieMange from './SubAdminComponents/MovieManage';
import MovieEdit from './SubAdminComponents/MovieEdit';
import MovieDelete from './SubAdminComponents/MovieDelete';
import Reports from './SubAdminComponents/Reports';
import Login from './Public Components/login';
import NotFound from './Public Components/NotFound';
import AdminCustomersMoviesList from "./AdminComponents/AdminCustomersMoviesList";
import AdminHome from "./AdminComponents/AdminHome";
import AdminUsersList from "./AdminComponents/AdminUsersList";
import Registration from './Public Components/Registration';
import ForgetPassword from './Public Components/ForgetPassword';
import Profile from './AdminComponents/Profile';
import ChangePass from './AdminComponents/ChangePass';
import LogOut from './Public Components/Logout';
import BarChart from './SubAdminComponents/BarChart';
import SubProfile from './SubAdminComponents/SubProfile';
import SubChangePass from './SubAdminComponents/SubChangePass';
import ChatSys from './SubAdminComponents/ChatSys';
import AdmUserBarChart from './AdminComponents/ADMUserBarChart';
import AdmUserAreaChart from './AdminComponents/ADMUserAreaChart';


function App() {

  
  return (
    <div className="App">


      
      <Router>

      {localStorage.getItem("role")=='SubAdmin' && <TopBar/>}

        <Routes>

              
              
              <Route path="/forgetpassword" element={<ForgetPassword />}></Route>
              
              
              {/* Nafiz */}
              <Route path="/SubAdmin/home" element={<Home />}></Route>
              <Route path="/addmovies" element={<AddMovies />}></Route>
              <Route path="/moviemanage" element={<MovieMange/>}></Route>
              <Route path="/movie/edit/:id" element={<MovieEdit/>} />
              <Route path="/movie/delete/:id" element={<MovieDelete/>} />
              <Route path="/report" element={<Reports/>} />
              <Route path="/notfound" element={<NotFound/>} />
              <Route path="/reportChart" element={<BarChart />}></Route>
              <Route path="/SubAdmin/Profile" element={<SubProfile/>}/>
              <Route path="/SubAdmin/Profile/ChangePassword" element={<SubChangePass/>}/>
              <Route path="/SubAdmin/Chatsystem" element={<ChatSys/>}/>

              {/* ANIK START */}
              <Route path="/" element={<Login />}></Route>
              <Route path="/logout" element={<LogOut />}></Route>
              <Route path="/registration" element={<Registration />}></Route>
              <Route path="/Admin/CustomersMoviesList" element={<AdminCustomersMoviesList/>}/>
              <Route path="/Admin/UsersList" element={<AdminUsersList/>}/>
              <Route path="/Admin/Home" element={<AdminHome/>}/>
              <Route path="/Admin/Profile" element={<Profile/>}/>
              <Route path="/Admin/Profile/ChangePassword" element={<ChangePass/>}/>
              <Route path="/Admin/UsersBar" element={<AdmUserBarChart/>}/>
              <Route path="/Admin/UsersArea" element={<AdmUserAreaChart/>}/>
              {/* ANIK END */}


        </Routes>

      </Router>

    </div>
  );
}

export default App;


