import React,{useState,useEffect} from "react";
import axiosConfig from '../Public Components/axiosConfig';
import { Link } from "react-router-dom";

const MovieList=()=>{
    const[movies,setMovies] = useState([]);

    useEffect(()=>{
        axiosConfig.get("movie/list").then((rsp)=>{ 
            debugger     
        setMovies(rsp.data);
        },(er)=>{

        })
    },[]);


    const Delete=(id)=>{    
        var answer = window.confirm("Delete data?");

        if (answer) {
            axiosConfig.get("movie/delete/"+id).
        then((succ)=>{
            //setMsg(succ.data.msg);
            debugger;
            
            window.location.href="/moviemanage";
        },(err)=>{
            debugger;
        })
        }
        else {
            
        }
        
    }

    const loadData=()=>{
        axiosConfig.get("movie/list").then((rsp)=>{
            setMovies(rsp.data);
        },(er)=>{

        })
    }

    const [search, setSearch] = useState('');

    // const goSearch=(event)=>{
        
    //     setSearch(event)
    //     var data ={search:search}
    //     console.log(data)
    //     axiosConfig.post("SubAdmin/movie/list/search",data).
    //     then((succ)=>{
    //         setMovies(succ.data)
    //         debugger
    //         //window.location.href="/";
    //     },(err)=>{

    //         debugger
    //     })
    // }

    useEffect(()=>{
        const data = {search:search}
        debugger
        axiosConfig.post("SubAdmin/movie/list/search",data).then
        ((rsp)=>{
            setMovies(rsp.data)
        debugger
        },(err)=>{
        debugger
        })
        },[search])


    return(
        <div>
            Search: <input type="text" name="search" value={search} onChange={(e)=>{setSearch(e.target.value)}} /> <br/><br/>

            <table border='1' width='100%'>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Description</th>
                        <th>Banner</th>
                        <th>Video</th>
                        <th>Operation</th>                        
                    
                {
                    movies.map((movie)=>
                    
                    <tr>                        

                        <td key={movie.id}> {movie.name}</td>
                        <td> {movie.genre}</td>
                        <td> {movie.description}</td>
                        <td> <img src={`http://localhost:8000/banners/${movie.banner}`} width="350" height="350" alt={movie.name} /></td>
                        <td> <center><video controls src={`http://localhost:8000/movies/${movie.movie}`} width="350" height="350" type="video/mp4" ></video></center></td>
                        <td> 
                            <button><Link to={`/movie/edit/${movie.id}`} >EDIT </Link></button> 
                            <button onClick={(e)=>{Delete(movie.id)}} >DELETE</button> 

                        </td>
                    </tr> 
                    )
                }
            </table>
        </div>
    )
}

export default MovieList;